<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Order;
use Dcat\Admin\Admin;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;

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
            $grid->column('user.nickname','用户');
            $grid->order_no;

            $grid->payment_type->using([1 => '微信小程序']);
            $grid->payment;

            $grid->status->using([1 => '待支付', 2 => '已支付', 3 => '关闭订单'])
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
                $filter->equal('id');

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
        return Show::make($id, new Order(['user','order_sons','address']), function (Show $show) {
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
            $show->panel()
                ->tools(function ($tools) {
                    $tools->disableEdit();
                    $tools->disableList();
                    $tools->disableDelete();
                    // 显示快捷编辑按钮
                    //$tools->showQuickEdit();
                });
            $show->row(function (Show\Row $show){
                $show->width(4)->payment;
                $show->width(4)->payment_type->using([1 => '微信小程序']);
                $show->status->using([1 => '待支付', 2 => '已支付', 3 => '关闭订单'])
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
