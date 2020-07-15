<?php


namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use EasyWeChat\Factory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;


class loginControllers extends Controller
{
    protected $app = null;

    public function __construct()
    {
        $wechat_config = [
            'app_id'    => 'wxf0a5d63bf8da2ab6',
            'secret'    => 'c71efc31dc371530f6cde15d9dc74d89'
        ];

        $this->app = Factory::miniProgram($wechat_config);
    }
    public function index(){
        $input = request()->all();

        $validator = Validator::make($input, [
            'iv'            => 'required',
            'encryptedData' => 'required',
        ]);

        if($validator->fails()) {
            return returnJson(1, $validator->errors()->first());     //显示第一条错误
        }

        $Appuser = Auth::guard('api')->user();
        $session_key =    $Appuser->session_key;


        if(!$session_key) {
            return returnJson(1, 'session_key 不存在');     //显示第一条错误
        }

        try {
            $data = $this->app->encryptor->decryptData(
                $session_key,
                $input['iv'],
                $input['encryptedData']
            );
        } catch (\Exception $e) {

            return returnJson(1, 'session_key 无效');     //显示第一条错误
        }

        if(!isset($data['openId'])) {
            return returnJson(1, '获取 openid 错误');
        }

        $uesr =    User::where('openid', $data['openId'])
            ->first();
        $uesr->wxJson = json_encode($data);
        $uesr->nickname    = $data['nickName'];
        $uesr->avatar      = $data['avatarUrl'];

        $uesr->update();
        return returnJson(0, 'ok',
            [
            'nickname'  => $uesr->nickname,
            'avatar'    => $uesr->avatar,
            ]
        );



    }

    /**
     * code
     * code 兑换 session_key 和 openid ，如果 openid 用户不存在创建一个新的
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function code(Request $request)
    {
        $input = $request->only('code');

        $validator = Validator::make($input, [
            'code'  => 'required',
        ]);

        if($validator->fails()) {
            return returnJson(1, $validator->errors()->first());     //显示第一条错误
        }

        try {
            $data = $this->app->auth->session($input['code']);
        } catch (\Exception $e) {
            return returnJson(1, '程序错误');     //显示第一条错误
        }

        if(isset($data['errcode'])) {
            switch ($data['errcode']) {
                case 40029:
                    // 这里需要注意的是 code 只能换取一次
                    // 如果一直报 40029 需要前后端检查 appid 是否一致
                    return returnJson(1, 'code 无效');
                    break;

                default:
                    return returnJson(1, '请求频繁');
                    break;
            }
        }

        $user = User::where('openid', $data['openid'])
            ->first();



        if(!$user) {
            $user           = new User;
            $user->openid   = $data['openid'];
            $user->session_key = $data['session_key'];
            $user->save();
        }else{
            $user->session_key = $data['session_key'];
            $user->update();
        }



        if(!$user) {
            return returnJson(1, '添加失败');
        }
        $token= Auth::guard('api')->login($user,true);

        return  returnJson(0,'ok',[
            'token' =>$token,
        ]);
    }

}
