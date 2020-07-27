<?php

namespace App\Admin\Controllers;

use App\Admin\Forms\Delivery;
use App\Admin\Forms\DeliveryFrom;
use App\Admin\Repositories\Order;
use App\Models\Order as Moderls;
use App\Models\Express;
use Dcat\Admin\Admin;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Layout\Column;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;
use Dcat\Admin\Widgets\Tab;

class OrderController extends AdminController
{

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {

        return Grid::make(new Order(['user']), function (Grid $grid) {
            $grid->id->sortable();
            if (request()->input('id')){
                $grid->model()->where('user_id', request()->input('id'));
            }
            if (request()->input('type')){
                $grid->model()->where('status', request()->input('type'));
            }

            $grid->quickSearch('order_no')->placeholder('订单号');

            $grid->column('user.nickname','用户');
            $grid->order_no;

            $grid->payment_type->using([1 => '微信小程序']);
            $grid->payment;

            $grid->status->using([1 => '待支付', 2 => '已支付', 3 => '关闭订单',4=>'订单删除',5=>'已发货',6=>'订单完成'])
                ->dot(
                    [
                        1 => 'primary',
                        2 => 'success',
                        3 => 'danger',
                        4 => Admin::color()->info(),
                    ],
                    'primary' // 第二个参数为默认值
                );
            $grid->end_time;



            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('order_no');

            });
        });
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     *
     * @return Show
     */
    protected function detail($id)
    {

        return  function (Row $row)use ($id){
        $row->column(12, function (Column $column)use ($id) {
            $tab = new Tab();
            $delivery = $this->delivery($id);
            $tab->add('详情', $this->d1($id));
            $tab->add('科技',$this->d2($id) );
            $tab->add('发货',new DeliveryFrom($delivery) );
            $column->row( $tab->withCard());
              /*  $this->tabactive(1) && $column->row( $this->d1($id));
                $this->tabactive(2) && $column->row( $this->d2($id));*/
            });
        };

    }

    public function d1($id){
        return Show::make($id, new Order(['user','order_sons','address','commodity']), function (Show $show) {
            $show->row(function (Show\Row $show){
                $show->width(4)->field('user.nickname','用户');
                $show->width(4)->order_no->label();
            });
            $show->newline();
            $show->row(function (Show\Row $show){
                $show->width(2)->field('address.province','省');
                $show->width(2)->field('address.city','市');
                $show->width(2)->field('address.areas','区');
                $show->width(2)->field('address.name','姓名');
                $show->width(2)->field('address.phone','手机');
                $show->width(12)->field('address.address','详细地址');
            });
            $show->row(function (Show\Row $show){
                $show->width(4)->field('order_sons.quantity','数量');
                $show->width(4)->field('order_sons.total_price','单价');
                $show->width(4)->field('order_sons.single_price','总价');
            });
            $show->panel()->tools(function ($tools) {
                $tools->disableEdit();
                $tools->disableList();
                $tools->disableDelete();

                // 显示快捷编辑按钮
                //$tools->showQuickEdit();
            });
            $show->row(function (Show\Row $show){
                $show->width(4)->payment;
                $show->width(4)->payment_type->using([1 => '微信小程序']);
                $show->status->using([1 => '待支付', 2 => '已支付', 3 => '关闭订单',4=>'订单删除',5=>'已发货',6=>'订单完成'])
                    ->dot(
                        [
                            1 => 'primary',
                            2 => 'success',
                            3 => 'danger',
                            4 => Admin::color()->info(),
                        ],
                        'primary' // 第二个参数为默认值
                    );

            });
            $show->row(function (Show\Row $show){
                $show->width(6)->end_time;
                $show->close_time;
                $show->created_at;
            });

        });
    }

    public function d2($id){
        return Show::make($id, new Order(['commodity']), function (Show $show) {

            $show->field('commodity.orderName','科技名称');
            $show->field('commodity.brief','科技简介');
            $show->field('commodity.recommendimg','图片')->image('/uploads/');

            $show->panel()->tools(function ($tools) {
                $tools->disableEdit();
                $tools->disableList();
                $tools->disableDelete();
                // 显示快捷编辑按钮
                //$tools->showQuickEdit();
            });
        });
    }
    //发货
    public function delivery($id){


        $Express = Express::where('order_id',$id)->first();
        $arr['courier'] = '';
        $arr['order'] = $id;
        if ($Express) {
            $arr['address'] = $Express->address;
            $arr['phone'] =$Express->phone;
            $arr['name'] =  $Express->name;
            $arr['courier'] =  $Express->courier;
        }else{
            $order  =Moderls::with('address')->find($id)->toArray();

            $arr['address'] = $order['address']['province'].' '.$order['address']['city'].' '.$order['address']['areas'].' '.$order['address']['address'];
            $arr['phone'] = $order['address']['phone'];
            $arr['name'] =  $order['address']['name'];
        }
        return $arr;


    }
    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new Order(), function (Form $form) {
            $form->display('id');
            $form->text('user_id');
            $form->text('order_no');
            $form->text('address');
            $form->text('payment');
            $form->text('payment_type');
            $form->text('status');
            $form->text('end_time');
            $form->text('close_time');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
