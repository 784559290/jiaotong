<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Shuffling;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;

class ShufflingController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Shuffling(), function (Grid $grid) {
            $grid->id->sortable();
            $grid->image;
            $grid->shuffling;
            $grid->shuffling_id;
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
        return Show::make($id, new Shuffling(), function (Show $show) {
            $show->id;
            $show->image;
            $show->shuffling;
            $show->shuffling_id;
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
        return Form::make(new Shuffling(), function (Form $form) {
            $form->display('id');
            $form->text('image');
            $form->text('shuffling');
            $form->text('shuffling_id');
        
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
