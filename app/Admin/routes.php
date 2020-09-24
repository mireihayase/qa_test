<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {
    $router->get('/', 'HomeController@index');
    $router->get('article_editor/{id}', 'ArticleController@main_editor');
    $router->post('article_editor/{id}', 'ArticleController@save_content');
    $router->resource('articles', ArticleController::class);
    $router->resource('categories', CategoryController::class);
    $router->resource('tags', TagController::class);
});
