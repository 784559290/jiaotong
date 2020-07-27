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
            $grid->sort->editable();
            $grid->contentimg->image('/uploads/',100,100);
            $grid->logimg->image('/uploads/',100,100);
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
            $form->text('address');
            $form->text('sort')->rules('numeric');
            $form->text('skillname');
            $form->text('skiicontent');
            $form->text('skiimoney');

            $form->text('technicalfields');
            $form->text('cooperation');
         /*   $form->image('contentimg')->uniqueName()->accept('jpg,png,gif,jpeg', 'image/*');;*/
            $form->image('logimg')->uniqueName()->accept('jpg,png,gif,jpeg', 'image/*');
            $form->editor('entcontent');

        });
    }
}
