<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix' => config('admin.route.prefix'),
    'namespace' => config('admin.route.namespace'),
    'middleware' => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('admin.home');
    $router->resource('courses', CourseController::class);
    $router->resource('planets', PlanetController::class);
    $router->resource('sub-planets', SubPlanetController::class);

    $router->resource('planet-contents', PlanetContentController::class);
    $router->resource('sub-planet-contents', SubPlanetContentController::class);

    //quiz sections
    $router->resource('units', UnitController::class);
    $router->resource('questions', QuestionController::class);
    $router->resource('marks', MarksController::class);
});
