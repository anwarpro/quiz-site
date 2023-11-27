<?php

namespace App\Admin\Controllers;

use App\Marks;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class MarksController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Marks';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Marks());

        $grid->column('id', __('Id'));
        $grid->column('user_id', __('User id'));
        $grid->column('marks', __('Marks'));
        $grid->column('correct', __('Correct'));
        $grid->column('wrong', __('Wrong'));
        $grid->column('unit_id', __('Unit id'));
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
        $show = new Show(Marks::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('user_id', __('User id'));
        $show->field('marks', __('Marks'));
        $show->field('correct', __('Correct'));
        $show->field('wrong', __('Wrong'));
        $show->field('unit_id', __('Unit id'));
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
        $form = new Form(new Marks());

        $form->number('user_id', __('User id'));
        $form->number('marks', __('Marks'));
        $form->number('correct', __('Correct'));
        $form->number('wrong', __('Wrong'));
        $form->number('unit_id', __('Unit id'));

        return $form;
    }
}
