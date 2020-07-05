<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Enterprise;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;

class EnterpriseController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Enterprise(), function (Grid $grid) {
            $grid->id->sortable();
            $grid->name;
            $grid->contentimg;
            $grid->logimg;
            $grid->created_at;
            $grid->updated_at->sortable();

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
        return Show::make($id, new Enterprise(), function (Show $show) {
            $show->id;
            $show->name;
            $show->contentimg;
            $show->logimg;
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
        return Form::make(new Enterprise(), function (Form $form) {
            $form->display('id');
            $form->text('name');
            $form->image('contentimg')->uniqueName()->accept('jpg,png,gif,jpeg', 'image/*');;
            $form->image('logimg')->uniqueName()->accept('jpg,png,gif,jpeg', 'image/*');;

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
