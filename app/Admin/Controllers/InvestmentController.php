<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Investment;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;

class InvestmentController extends AdminController
{
    public function index(Content $content)
    {
        return $content->header('投资')
            ->breadcrumb(
                ['text'=>'投资管理']
            )
            ->body($this->grid());
    }
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Investment(), function (Grid $grid) {
            $grid->id->sortable();
            $grid->name;
            $grid->field;
            $grid->content;
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
        return Show::make($id, new Investment(), function (Show $show) {
            $show->id;
            $show->name;
            $show->field;
            $show->content;
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

        return Form::make(new Investment(), function (Form $form) {
            $form->text('name');
            $form->text('field');
            $form->text('content');
            $form->image('logimg');
        });
    }
}
