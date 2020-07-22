<?php

namespace App\Admin\Forms;

use App\Models\Express;
use App\Models\Order;
use Dcat\Admin\Widgets\Form;
use Symfony\Component\HttpFoundation\Response;

class DeliveryFrom extends Form
{
    private $id;
    private $order;
    public function __construct($data = [], $key = null)
    {
        parent::__construct($data, $key);
    }


    /**
     * Handle the form request.
     *
     * @param array $input
     *
     * @return Response
     */
    public function handle(array $input)
    {


        $Express = Express::where('order_id', $input['order'])->first();

        if ($Express){
            $Express->name = $input['name'];
            $Express->phone = $input['phone'];
            $Express->address = $input['address'];
            $Express->courier = $input['courier'];
            $Express->order_id = $input['order'];
            $Express->update();
        }else{
            $Express = new  Express();
            $Express->name = $input['name'];
            $Express->phone = $input['phone'];
            $Express->address = $input['address'];
            $Express->courier = $input['courier'];
            $Express->order_id = $input['order'];
            $Express->save();
        }

        return $this->success('保存成功', 'order/'.$input['order']);
    }

    /**
     * Build a form here.
     */
    public function form()
    {




        $this->text('courier','快递号码')->required();
        $this->text('address','地址')->required();
        $this->text('name','姓名')->required();
        $this->text('phone','手机')->required();
        $this->hidden('order');
    }

    /**
     * The data of the form.
     *
     * @return array
     */
    public function default()
    {
        return [
            'courier'  => 'asdfasdf',
            'order'  => $this->id,
        ];
    }
}
