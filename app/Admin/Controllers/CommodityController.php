<?php

namespace App\Admin\Controllers;

use App\Admin\Actions\Recommended;
use App\Admin\Forms\RecommendedFrom;
use App\Admin\Repositories\Commodity;
use App\Models\Holder;
use App\Models\Classification;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Show;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Widgets\Tab;
use Dcat\Admin\Layout\Column;

use Dcat\Admin\Controllers\AdminController;

class CommodityController extends AdminController
{

    public function index(Content $content)
    {
        return $content->header('商品管理')
            ->breadcrumb(
                ['text'=>'商品管理']
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

        $Grid =  Grid::make(new Commodity(['Holder','Classification']), function (Grid $grid) {
            $grid->model()->orderByRaw('sort is null')->orderBy('sort');
            $grid->id->sortable();
            $grid->quickSearch('orderName')->placeholder('名称');
            $grid->orderName;
            $grid->recommend->switch();
            $grid->recommendimg->image('/uploads/',200,100);
            $grid->sort->editable(true);
            $grid->column('Holder.name','持有人');
            $grid->column('Classification.name','分类');
          /*  $grid->classifications;*/
            $grid->filter(function (Grid\Filter $filter) {
                $filter->like('Holder.name','持有人');
                $filter->equal('recommend','首页商品')->select([1=>'查看']);
            });

        });
        $Grid->tools(new Recommended());
        return $Grid;
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
        return Show::make($id, new Commodity(), function (Show $show) {
            $show->id;
            $show->orderName;
            $show->brief;
            $show->holdersid;
            $show->orderdetails;
            $show->Slideshow;
            $show->classifications;
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



        return Form::make(new Commodity(), function (Form $form) {
           /* $form->display('id');*/
            $form->text('orderName')->required();
            $form->text('brief')->required();
            $form->text('sort')->type('number');
            $form->number('money')->rules('required|numeric');
            $form->switch('recommend')
                ->customFormat(function ($v) {
                    return $v == '打开' ? 1 : 0;
                })
                ->saving(function ($v) {
                    return $v ? '1' : '0';
                });
            //持有人
            $form->selectResource('holdersid')
                ->path('holders')
                ->options(function ($v) { // 显示已选中的数据
                    if (!$v) return $v;
                    return Holder::find($v)->pluck('name', 'id');
                })->required();
            //分类
            $form->selectResource('classifications')
                ->path('classification')
                ->options(function ($v) { // 显示已选中的数据
                    if (!$v) return $v;
                    return Classification::find($v)->pluck('name', 'id');
                })->required();
            $form->editor('orderdetails')->required();
            $form->image('recommendimg','列表图片')->uniqueName()->accept('jpg,png,gif,jpeg', 'image/*')->required();
            $form->multipleImage('Slideshow')->saving(function ($paths) {
                 return implode(',', $paths);
            })->uniqueName()->accept('jpg,png,gif,jpeg', 'image/*')->required();
            //$form->editor('classifications');


        });

    }

    public function RecommendedFrom(Content $content){
        return $content
            ->header('推荐管理')
            ->body(function (Row $row){
                $row->column(12, function (Column $column) {
                    $tab = new Tab();
                    $tab->addLink('首页推荐','/admin/recommend?preview=1',$this->tabactive(1));
                    $column->row( $tab->withCard());

                    $this->tabactive(1) && $column->row( new RecommendedFrom());
                });
            });
    }
    /**
     * @param string $type
     * @return bool
     */
    public function tabactive($type){
        return request()->input('preview',1) == $type;
    }

}
