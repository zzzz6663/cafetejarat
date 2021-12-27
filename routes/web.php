<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function() {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});

Route::get('/admin_login','SignController@admin_login')->name('admin.login');
Route::post('/check','SignController@check_login')->name('admin.check.login');
Route::post('/register_sms','SignController@register_sms') ->name('register.sms');
Route::get('/test','SignController@test') ->name('register.test');
Route::get('/','SignController@index') ->name('index');
Route::post('/resend_sms','SignController@resend_sms') ->name('resend.sms');
Route::post('/login_sms','SignController@login_sms') ->name('login.sms');
Route::post('/check_sms','SignController@check_sms') ->name('check.sms');
Route::any('/remember_sms','SignController@remember_sms') ->name('remember.sms');
Route::get('/login','SignController@login') ->name('login');
Route::get('/logout','SignController@logout') ->name('logout');


Route::prefix('admin')->namespace('admin')->middleware([ 'checkadmin','auth'])->group(function(){
// Route::prefix('admin')->namespace('admin')->group(function(){
    Route::get('/agents_all','AdminController@agents_all')->name('admin.agents.all');
    Route::get('/agents_show/{user}','AdminController@agents_show')->name('admin.agents.show');
    Route::get('/bills','BillController@bills')->name('admin.bill.all');
    Route::resource('plan', 'PlanController');
    Route::resource('payam', 'PayamController');
    Route::resource('vcat', 'VcatController');
    Route::get('video/cat/{vcat}', 'VideoController@cat')->name('video.cat');;
    Route::resource('video', 'VideoController');
    Route::resource('question', 'QuestionController');
});



// پنل نماینده
Route::middleware([ 'auth'])->group(function(){
    Route::get('/panel','AgentController@panel')->name('agent.panel');
    Route::post('/get_shahr/{ostan}/{shahr?}','AgentController@get_shahr')->name('agent.get.shahr');
    Route::any('/info1','AgentController@info1')->name('agent.info1');
    Route::any('/info2','AgentController@info2')->name('agent.info2');
    Route::any('/info3','AgentController@info3')->name('agent.info3');
    Route::get('/info4','AgentController@info4')->name('agent.info4');
    Route::get('/contact','AgentController@contact')->name('agent.contact');

    Route::post('/save_avatar','AgentController@save_avatar')->name('agent.save.avatar');
    Route::get('/plans','AgentController@plans')->name('agent.plans');
    Route::get('/cats','AgentController@cats')->name('agent.cats');
    Route::get('/single_vcat/{vcat}','AgentController@single_vcat')->name('agent.single.vcat');
    Route::get('/check_video_status/{video}','AgentController@check_video_status')->name('agent.check.video.status');
    Route::get('/video_questions/{video}','AgentController@video_questions')->name('agent.video.questions');
    Route::post('/submit_questions','AgentController@submit_questions')->name('agent.submit.questions');
    Route::get('/single_video/{video}','AgentController@single_video')->name('agent.single.video');
    Route::get('/single_plans/{plan}','AgentController@single_plans')->name('agent.single.plans');
    Route::post('/join_plans/{plan}','AgentController@join_plans')->name('agent.join.plans');

    Route::get('/send_pay','BillController@send_pay')->name('agent.send.pay');
    Route::get('/verify_pay','BillController@verify_pay')->name('agent.verify.pay');

    Route::get('/payams','AgentController@payams')->name('agent.payams');
    Route::get('/single_payams/{payam}','AgentController@single_payams')->name('agent.single.payams');
});



