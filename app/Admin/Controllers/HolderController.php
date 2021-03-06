<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Commodity;
use App\Admin\Repositories\Holder;
use App\Models\Classification;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;
use Dcat\Admin\IFrameGrid;

class HolderController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     *
     */
    protected function grid()
    {
        return Grid::make(new Holder(), function (Grid $grid) {
            $grid->id->sortable();
            $grid->name;
            $grid->portraitimg->image('/uploads',100,100);
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
        return Show::make($id, new Holder(), function (Show $show) {
            $show->id;
            $show->name;

            $show->portraitimg;
            $show->details;
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
        return Form::make(new Holder(), function (Form $form) {
            $form->text('name');
            //分类
            $form->selectResource('classification')
                ->path('classification')
                ->options(function ($v) { // 显示已选中的数据
                    if (!$v) return $v;
                    return Classification::find($v)->pluck('name', 'id');
                })->required();
            $form->text('research');
            $form->text('education');
            $form->text('title');
            $form->image('portraitimg');
            $form->editor('details');
        });
    }

    protected function iFrameGrid()
    {
        $grid = new IFrameGrid(new Holder());
        // 如果表格数据中带有 “name”、“title”或“username”字段，则可以不用设置
        $grid->rowSelector()->titleColumn('name');
        $grid->id;
        $grid->name();
        $grid->portraitimg->image('/uploads',100,100);
        $grid->filter(function (Grid\Filter $filter) {
            $filter->equal('id');
            $filter->like('name');
        });
        return $grid;
    }
    public function getTitleColumn()
    {
        return 'name';
    }
}
