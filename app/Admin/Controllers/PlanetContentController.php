<?php

namespace App\Admin\Controllers;

use App\PlanetContent;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class PlanetContentController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\PlanetContent';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new PlanetContent());

        $grid->column('id', __('Id'));
        $grid->column('mid', __('Mid'));
        $grid->column('bookmark', __('Bookmark'));
        $grid->column('name', __('Name'));
        $grid->column('des_01', __('Des 01'));
        $grid->column('des_02', __('Des 02'));
        $grid->column('code', __('Code'));
        $grid->column('output', __('Output'));
        $grid->column('des_03', __('Des 03'));
        $grid->column('qtype', __('Qtype'));
        $grid->column('finish', __('Finish'));
        $grid->column('mark', __('Mark'));
        $grid->column('status', __('Status'));
        $grid->column('blankstype', __('Blankstype'));
        $grid->column('planet_id', __('Planet id'));

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
        $show = new Show(PlanetContent::findOrFail($id));

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
        $show->field('planet_id', __('Planet id'));
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
        $form = new Form(new PlanetContent());

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
//        $form->text('qtype', __('Qtype'))->default('normal');
//        $form->select('finish', __('Finish'))
//            ->options(['false' => 'False', 'true' => 'True'])->default('false');
//        $form->number('mark', __('Mark'))->default(0);
//        $form->text('status', __('Status'))->default('false');
//        $form->text('blankstype', __('Blankstype'))->default('null');
//        $form->number('planet_id', __('Planet id'));

        return $form;
    }
}
