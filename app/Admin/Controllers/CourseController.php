<?php

namespace App\Admin\Controllers;

use App\Course;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CourseController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Course';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Course());

        $grid->column("course_name", "Course Name");
        $grid->column("course_id", "Course ID");
        $grid->column("content_name", "Course Type");

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
        $show = new Show(Course::findOrFail($id));


        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Course());

        $form->text('course_name')->placeholder("Course name");
        $form->text('content_name')->placeholder("Course Type");
        $form->number('course_id')->default(105);

        $form->hasMany("planets", "Planets", function ($form) {
            $form->text('title', 'Title')->placeholder('Planet Title');
            $form->select('type', 'Type')->options(['Single' => "Single", "double" => "Double"])->default('Single');
        });

        return $form;
    }
}
