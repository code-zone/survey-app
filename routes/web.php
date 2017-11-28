<?php


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */
// Frontend Routes
Route::get('/', 'SiteController@home');
Route::get('contact', 'SiteController@contactUs');
Route::post('send-feedback', 'SiteController@sendFeedback');
Auth::routes();
// Backend Routes
Route::resource('metrics', 'MetricsController');
Route::resource('projects', 'ProjectsController');
Route::resource('users', 'UsersController');
Route::resource('settings', 'SettingsController');
Route::get(
    'analytics',
    ['uses' => 'AnalyticsController@index',
    ]
);
Route::get(
    'users/block/{user}',
    [
        'as' => 'users.block',
        'uses' => 'UsersController@block',
    ]
);
Route::post(
    'users/about/{user}',
    [
         'as' => 'user.about',
         'uses' => 'UsersController@updateAbout',
    ]
);
Route::get(
    'users/unblock/{user}',
    [
        'as' => 'users.unblock',
        'uses' => 'UsersController@unblock',
    ]
);
Route::post(
    'constraints/create/{metric}',
    [
        'as' => 'constraints.create',
        'uses' => 'MetricsController@addConstraint',
    ]
);
Route::post(
    'score/create/{metric}',
    [
        'as' => 'score.create',
        'uses' => 'MetricsController@addMetricScore',
    ]
);
Route::get(
    'metrics/{metric}/constraints/{project}',
    [
        'as' => 'metric.constraints',
        'uses' => 'MetricsController@showConstraints',
    ]
);
Route::get(
    'metrics/{metric}/edit-constraints',
    [
        'as' => 'edit.constraints',
        'uses' => 'MetricsController@editConstraints',
    ]
);

Route::post(
    'metrics/constraints/{constraint}',
    [
        'as' => 'update.constraints',
        'uses' => 'MetricsController@updateConstraint',
    ]
);
Route::get(
    'metrics/{metric}/edit',
    [
        'as' => 'metric.edit',
        'uses' => 'MetricsController@edit',
    ]
);
Route::post(
    'metrics/{metric}',
    [
        'as' => 'metric.update',
        'uses' => 'MetricsController@update',
    ]
);
Route::post(
    'metrics/{metric}/constraints',
    [
        'as' => 'metric.constraints.save',
        'uses' => 'MetricsController@saveRatings',
    ]
);
Route::get(
    'projects/{project}/edit',
    [
        'as' => 'project.edit',
        'uses' => 'ProjectsController@edit',
    ]
);
Route::post(
    'projects/{project}',
    [
        'as' => 'project.update',
        'uses' => 'ProjectsController@update',
    ]
);
Route::get(
    'projects/{project}/metrics/create',
    [
        'as' => 'project.metrics.add',
        'uses' => 'ProjectsController@addMetrics',
    ]
);
Route::get(
    'projects/{project}/metrics',
    [
        'as' => 'project.metrics.show',
        'uses' => 'ProjectsController@showMetrics',
    ]
);
Route::post(
    'project/start-survey',
    [
        'as' => 'project.start_survey',
        'uses' => 'ProjectsController@startSurvey',
    ]
);
Route::post(
    'projects/{project}/metrics',
    [
        'as' => 'project.metrics.save',
        'uses' => 'ProjectsController@saveMetrics',
    ]
);
Route::get('/home', 'HomeController@index');
