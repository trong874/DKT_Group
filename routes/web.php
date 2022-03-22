<?php

use App\Http\Controllers\GroupController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;


Route::group(['middleware'=>'language'],function (){

    Route::get('/', [PagesController::class, 'index']);

    Route::get('/clear-cache',function(){

        Cache::flush();
        return json_encode([
            'status'=>1,
            'message'=>"Clear cache success"
        ]);

    });

    Route::get('/quick-search', [PagesController::class, 'quickSearch'])->name('quick-search');

    Route::middleware(['auth'])->group(function (){

        Route::resource('article', ItemController::class);

        Route::resource('advertisement', ItemController::class);

        Route::resource('article-list', GroupController::class);

        Route::resource('advertisement-list', GroupController::class);

        Route::resource('setting', SettingController::class);

        Route::get('/user-manage', [UserController::class, 'index'])->name('user.index');

        Route::get('advertisement/filter/data',[ItemController::class,'searchItem'])->name('advertisement.search');

        Route::get('article/filter/data',[ItemController::class,'searchItem'])->name('article.search');

        Route::get('test-filter-ajax',[ItemController::class,'filter'])->name('items.filter');

        Route::post('/change_avatar',[UserController::class,'changeAvatar'])->name('user.change_avatar');

        Route::get('/admin',[PagesController::class,'dashboardBackend'])->name('backend.dashboard');

    });

    Route::put('increase-views/{id}',[ItemController::class,'addView'])->name('items.add-view');

    Route::post('/delete-multi-item',[ItemController::class,'destroyMultiple'])->name('items.destroy_multiple');

    Route::post('/update-list',[GroupController::class,'saveList'])->name('group.update_list');

    Route::post('delete-multi-group',[GroupController::class,'destroyMultiple'])->name('groups.destroy_multi');

    Route::get('/tin-tuc/{slug}',[PagesController::class,'showNewsBySlug'])->name('news.slug ');

    Route::get('/tin-tuc',[PagesController::class,'showNews'])->name('news.index');

    Route::get('/{position}/{slug}',[PagesController::class,'showDetailNews'])->name('news.detail');

    Route::get('/tuyen-dung',[PagesController::class,'showRecruitment'])->name('recruitment.index');

    Route::get('search/news',[PagesController::class,'filterNews'])->name('news.search');

    Route::get('language/{locale}', [LanguageController::class,'index'])->name('language');

});

require __DIR__ . '/auth.php';
