<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Classification;
use App\Admin\Repositories\Holder;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\IFrameGrid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;

class ClassificationController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Classification(), function (Grid $grid) {
            $grid->id->sortable();
            $grid->name;
            $grid->img->image('/uploads',100,100);
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
        return Show::make($id, new Classification(), function (Show $show) {
            $show->id;
            $show->name;
            $show->img;
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new Classification(), function (Form $form) {
            $form->display('id');
            $form->text('name');
            $form->image('img')->uniqueName()->accept('jpg,png,gif,jpeg', 'image/*');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }

    protected function iFrameGrid()
    {
        $grid = new IFrameGrid(new Classification());
        // 如果表格数据中带有 “name”、“title”或“username”字段，则可以不用设置
        $grid->rowSelector()->titleColumn('name');
        $grid->id;
        $grid->name();
        $grid->img->image('/uploads',100,100);
        $grid->filter(function (Grid\Filter $filter) {
            $filter->equal('id');
            $filter->like('name');
        });
        return $grid;
    }
}
