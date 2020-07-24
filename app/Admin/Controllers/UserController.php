<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\User;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;

class UserController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new User(), function (Grid $grid) {
            $grid->id->sortable();
            $grid->nickname->link(function ($a)use ($grid){
                return '/admin/order?name='.$a ;
            });
            $grid->phone;
            $grid->openid;
            $grid->avatar->image('',100,100);
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
        return Show::make($id, new User(), function (Show $show) {
            $show->id;
            $show->nickname;
            $show->email;
            $show->email_verified_at;
            $show->openid;
            $show->wxJson;
            $show->avatar;
            $show->session_key;
            $show->password;
            $show->remember_token;
            $show->created_at;
            $show->updated_at;
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new User(), function (Form $form) {
            $form->display('id');
            $form->text('nickname');
            $form->text('email');
            $form->text('email_verified_at');
            $form->text('openid');
            $form->text('wxJson');
            $form->text('avatar');
            $form->text('session_key');
            $form->text('password');
            $form->text('remember_token');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
