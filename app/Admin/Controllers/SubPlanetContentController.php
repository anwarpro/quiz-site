<?php

namespace App\Admin\Controllers;

use App\SubPlanetContent;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class SubPlanetContentController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\SubPlanetContent';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new SubPlanetContent());

        $grid->column('id', __('Id'));
        $grid->column('mid', __('Mid'));
        $grid->column('bookmark', __('Bookmark'));
        $grid->column('name', __('Name'));
        $grid->column('des_01', __('Des 01'));
        $grid->column('link01', __('Link01'));
        $grid->column('des_02', __('Des 02'));
        $grid->column('link02', __('Link02'));
        $grid->column('code', __('Code'));
        $grid->column('output', __('Output'));
        $grid->column('des_03', __('Des 03'));
        $grid->column('qtype', __('Qtype'));
        $grid->column('finish', __('Finish'));
        $grid->column('mark', __('Mark'));
        $grid->column('status', __('Status'));
        $grid->column('blankstype', __('Blankstype'));
        $grid->column('sub_planet_id', __('Sub planet id'));
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
        $show = new Show(SubPlanetContent::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('mid', __('Mid'));
        $show->field('bookmark', __('Bookmark'));
        $show->field('name', __('Name'));
        $show->field('des_01', __('Des 01'));
        $show->field('link01', __('Link01'));
        $show->field('des_02', __('Des 02'));
        $show->field('link02', __('Link02'));
        $show->field('code', __('Code'));
        $show->field('output', __('Output'));
        $show->field('des_03', __('Des 03'));
        $show->field('qtype', __('Qtype'));
        $show->field('finish', __('Finish'));
        $show->field('mark', __('Mark'));
        $show->field('status', __('Status'));
        $show->field('blankstype', __('Blankstype'));
        $show->field('sub_planet_id', __('Sub planet id'));
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
        $form = new Form(new SubPlanetContent());

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

        return $form;
    }
}
