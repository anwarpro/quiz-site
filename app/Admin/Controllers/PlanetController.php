<?php

namespace App\Admin\Controllers;

use App\Planet;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class PlanetController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Planet';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Planet());

        $grid->column('id', __('Id'));
        $grid->column('pid', __('Pid'));
        $grid->column('index', __('Index'));
        $grid->column('content', __('Content'));
        $grid->column('title', __('Title'));
        $grid->column('is_double', __('Is double'));
        $grid->column('total', __('Total'));
        $grid->column('status', __('Status'));
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
        $show = new Show(Planet::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('pid', __('Pid'));
        $show->field('index', __('Index'));
        $show->field('content', __('Content'));
        $show->field('title', __('Title'));
        $show->field('is_double', __('Is double'));
        $show->field('total', __('Total'));
        $show->field('status', __('Status'));
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
        $form = new Form(new Planet());

//        $form->number('pid', __('Pid'));
//        $form->number('index', __('Index'));
        $form->text('content', __('Content'));
        $form->text('title', __('Title'));
        $form->number('total', __('Total'));
        $form->text('status', __('Status'))->default('lock');

        $form->hasMany("planet_contents", "Slides&emsp;     &emsp;", function ($form) {
            $form->text('mid', __('Mid'))->default('105');
            $form->text('name', __('Name'))->placeholder("Slide Title")->required();
            $form->textarea('des_01', __('Des 01'))
                ->placeholder("Paragraph 1");
            $form->text('link01', __('Image Link 1'))
                ->placeholder("Img link1");
            $form->textarea('des_02', __('Des 02'))
                ->placeholder("Paragraph 2");
            $form->text('link02', __('Link02'))
                ->placeholder("Image Link 2");
            $form->textarea('code', __('Code'));
            $form->select('output', __('Try it'))
                ->options(['null' => "False", 'true' => 'True'])->default('null');
            $form->textarea('des_03', __('Des 03'))
                ->placeholder("Paragraph 3");
        });

        $form->hasMany("sub_planets", 'Sub Planets', function ($form) {
            $form->number('sid', __('ID'))->default(105);
            $form->hidden('total', __('Total'))->default(0);
            $form->text('mtitle', __('Sub Planet Title'))->placeholder('Sub Planet Title');
        });

        return $form;
    }
}
