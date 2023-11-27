<?php

namespace App\Admin\Controllers;

use App\Unit;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class UnitController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Unit';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Unit());

        $grid->column('id', __('Id'));
        $grid->column('unit_title', __('Unit title'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        $grid->filter(function ($filter) {

            // Remove the default id filter
            $filter->disableIdFilter();

            // Add a column filter
            $filter->like('unit_title', 'title');

        });

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
        $show = new Show(Unit::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('unit_title', __('Unit title'));
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
        $form = new Form(new Unit());

        $form->text('unit_title', __('Unit title'));

        $form->hasMany("questions", "Questions", function ($form) {
            $form->switch('isBlank', __('IsBlank'));
            $form->textarea('question', __('Question'));

            $form->list('options');

            $form->text('answer', __('Correct Answer'));
        });

        return $form;
    }
}
