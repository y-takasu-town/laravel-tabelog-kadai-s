<?php

namespace App\Admin\Controllers;

use App\Models\Store;
use App\Models\Category;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class StoreController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Store';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Store());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('description', __('Description'));
        $grid->column('price', __('Price'));
        $grid->column('image', __('Image'))->image();
        $grid->column('open_time', __('Open time'));
        $grid->column('close_time', __('Close time'));
        $grid->column('postal_code', __('Postal code'));
        $grid->column('address', __('Address'));
        $grid->column('phone_number', __('Phone number'));
        $grid->column('holiday', __('Holiday'));
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
        $show = new Show(Store::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('description', __('Description'));
        $show->field('price', __('Price'));
        $show->field('image', __('Image'))->image();
        $show->field('open_time', __('Open time'));
        $show->field('close_time', __('Close time'));
        $show->field('postal_code', __('Postal code'));
        $show->field('address', __('Address'));
        $show->field('phone_number', __('Phone number'));
        $show->field('holiday', __('Holiday'));
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
        $form = new Form(new Store());

        $form->text('name', __('Name'));
        $form->textarea('description', __('Description'));
        $form->number('price', __('Price'));
        $form->time('open_time', __('Open time'))->default(date('H:i:s'));
        $form->time('close_time', __('Close time'))->default(date('H:i:s'));
        $form->text('postal_code', __('Postal code'));
        $form->text('address', __('Address'));
        $form->text('phone_number', __('Phone number'));
        $form->checkbox('holiday', __('Holiday'))->options(Store::DAY_OF_WEEK);
        $form->image('image', __('Image'));

        return $form;
    }
}
