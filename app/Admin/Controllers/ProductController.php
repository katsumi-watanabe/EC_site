<?php

namespace App\Admin\Controllers;

use App\Models\Product;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ProductController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Product';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Product());

        // $grid->disableCreateButton(); // 作成無効
        // $grid->disableFilter(); // 検索無効
        $grid->disableExport(); // ダウンロード無効
        $grid->disableRowSelector(); // 行セレクタ無効
        $grid->disableColumnSelector(); // 列セレクタ無効
        // $grid->disableActions(); // アクションカラムごと無効
        $grid->actions(function ($actions) {
            // $actions->disableDelete(); // 削除無効
            // $actions->disableEdit(); // 編集無効
            $actions->disableView(); // 詳細表示無効
            // $actions->append('<a href="'.route('admin.products.index', ['sale_id'=>$actions->getKey()]).'" class="grid-row-view btn btn-sm btn-default"><i class="fa fa-list-alt"></i> 管理</a>'); // 追加のボタン例
        });

        $grid->column('id', __('Id'));
        $grid->column('genre_id', __('Genre id'));
        $grid->column('name', __('Name'));
        $grid->column('description', __('Description'));
        $grid->column('price', __('Price'));
        $grid->column('image_1', __('Image 1'));
        $grid->column('image_2', __('Image 2'));
        $grid->column('image_3', __('Image 3'));
        $grid->column('image_4', __('Image 4'));
        $grid->column('sales_status', __('Sales status'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Product::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('genre_id', __('Genre id'));
        $show->field('name', __('Name'));
        $show->field('description', __('Description'));
        $show->field('price', __('Price'));
        $show->field('image_1', __('Image 1'));
        $show->field('image_2', __('Image 2'));
        $show->field('image_3', __('Image 3'));
        $show->field('image_4', __('Image 4'));
        $show->field('sales_status', __('Sales status'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Product());

        $id = request(strtolower('Product'));
        $model = Product::find($id);

        $form->tools(function (Form\Tools $tools){
            // $tools->disableList(); // リストに戻る無効
            $tools->disableView(); // 詳細表示無効
            // $tools->disableDelete(); //削除無効
        });
        $form->footer(function ($footer) {
            $footer->disableViewCheck(); // 詳細表示無効
            $footer->disableCreatingCheck(); // 続けて作成
            $footer->disableEditingCheck(); // 編集を続ける無効
            $footer->disableReset(); // リセット無効
            // $footer->disableSubmit(); // 送信無効
        });

        $form->number('genre_id', __('Genre id'));
        $form->text('name', __('Name'));
        $form->textarea('description', __('Description'));
        $form->number('price', __('Price'));
        $form->image('image_1', __('Image 1'))->resize(2000, null, function ($constraint) {
            $constraint->upsize();
            return $constraint->aspectRatio();
        })->uniqueName()->removable()->rules('image|max:16284')->help('画像ファイル（jpg/png/gif）を選択してください。ファイルの上限は16MBです。最適: W360xH360px以上');
        $form->image('image_2', __('Image 2'))->resize(2000, null, function ($constraint) {
            $constraint->upsize();
            return $constraint->aspectRatio();
        })->uniqueName()->removable()->rules('image|max:16284')->help('画像ファイル（jpg/png/gif）を選択してください。ファイルの上限は16MBです。最適: W360xH360px以上');
        $form->image('image_3', __('Image 3'))->resize(2000, null, function ($constraint) {
            $constraint->upsize();
            return $constraint->aspectRatio();
        })->uniqueName()->removable()->rules('image|max:16284')->help('画像ファイル（jpg/png/gif）を選択してください。ファイルの上限は16MBです。最適: W360xH360px以上');
        $form->image('image_4', __('Image 4'))->resize(2000, null, function ($constraint) {
            $constraint->upsize();
            return $constraint->aspectRatio();
        })->uniqueName()->removable()->rules('image|max:16284')->help('画像ファイル（jpg/png/gif）を選択してください。ファイルの上限は16MBです。最適: W360xH360px以上');
        $form->switch('sales_status', __('Sales status'));

        return $form;
    }
}
