<?php
/**
 * 公用的方法  返回json数据，进行信息的提示
 * @param $status 状态
 * @param string $message 提示信息
 * @param array $data 返回数据
 */
function returnJson($status, $message = 'success', $data = array()){
    $result = array(
        'status' => $status,
        'mesg' =>$message,
    );
    $result['data'] = $data;
    $log['result'] = $result;
    $log['request'] = request()->input();
    \Illuminate\Support\Facades\Log::alert(json_encode($log,320));
    return response()->json($result);
}
