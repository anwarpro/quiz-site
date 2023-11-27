<?php

namespace App\Admin\Controllers;

use App\Question;
use App\Unit;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class QuestionController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Question';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Question());

        $grid->column('id', __('Id'));
        $grid->column('isBlank', __('IsBlank'));
        $grid->column('question', __('Question'));
        $grid->column('options', __('Options'));
        $grid->column('answer', __('Answer'));
        $grid->column('unit_id', __('Unit id'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        $grid->filter(function ($filter) {

            // Remove the default id filter
            $filter->disableIdFilter();

            // Add a column filter
            $filter->equal('unit_id')->select(Unit::all()->pluck('unit_title', 'id'));

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
        $show = new Show(Question::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('isBlank', __('IsBlank'));
        $show->field('question', __('Question'));
        $show->field('options', __('Options'));
        $show->field('answer', __('Answer'));
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
        $form = new Form(new Question());

        $form->switch('isBlank', __('IsBlank'));
        $form->textarea('question', __('Question'));
//        $form->textarea('options', __('Options'));

        /*        $form->embeds('options', function ($form) {
                    $form->text('0')->rules('required');
                    $form->text('1')->rules('required');
                    $form->text('2')->rules('required');
                });*/

        $form->list('options');

        $form->text('answer', __('Answer'));
//        $form->number('unit_id', __('Unit id'));
        $form->select('unit_id')->options(Unit::all()->pluck('unit_title', 'id'));

        return $form;
    }
}
