<?php

namespace App\Admin\Controllers;

use App\SubPlanet;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class SubPlanetController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\SubPlanet';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new SubPlanet());

        $grid->column('id', __('Id'));
        $grid->column('sid', __('Sid'));
        $grid->column('mtitle', __('Mtitle'));
        $grid->column('fmodule', __('Fmodule'));
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
        $show = new Show(SubPlanet::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('sid', __('Sid'));
        $show->field('mtitle', __('Mtitle'));
        $show->field('fmodule', __('Fmodule'));
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
        $form = new Form(new SubPlanet());

        $form->number('sid', __('Sid'));
        $form->text('mtitle', __('Title'));
//        $form->text('fmodule', __('Fmodule'))->default('false');
//        $form->number('total', __('Total'));
//        $form->text('status', __('Status'))->default('lock');

        $form->hasMany('sub_planet_contents', 'Slide Content', function ($form) {
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

        return $form;
    }
}
