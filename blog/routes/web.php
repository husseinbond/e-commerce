<?php
use app\http\middleware\isadmin;
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


Auth::routes(['verify' => true]);

Route::get('/', function () {
    return view('welcome');
     

  
 
});
Route::get('/results','searchController@search')->name('search');



Route::group(['prefix'=>'admin', 'middleware'=>['auth'=>'admin']],function(){

  //  Auth::routes(['verify'=>true]);



    Route::get('/', function () {
        return view('admins');
         
    });

    Route::get('/setting', function () {
        return view('index2');
         
    });
//category edit and delete
Route::post('/setting/category/update/{id}','categoryController@update')->name('category.update');
    Route::get('/setting/category/delete/{id}','categoryController@destroy')->name('category.delete');
    Route::get('/setting/category/edit/{id}','categoryController@edit')->name('category.edit');
    Route::get('/setting/category','categoryController@index')->name('category');
    //category add
    Route::get('/setting/category/add','categoryController@create')->name('category.add');
    Route::post('/setting/category/store', 'categoryController@store')->name('category.store');
  //post add
  Route::get('/setting/post','postController@index')->name('indexpost');
    Route::get('/setting/post/add','postController@create')->name('add.post');
    Route::post('/setting/post/store', 'postController@store')->name('post.store');
    Route::get('/setting/post/edit/{id}','postController@edit')->name('post.edit');
    Route::post('/setting/post/update/{id}','postController@update')->name('post.update');
    Route::get('/setting/post/delete/{id}','postController@destroy')->name('post.delete');
    Route::get('/setting/post/hdelete/{id}','postController@hdelete')->name('post.hdelete');
    Route::get('/setting/post/restore/{id}','postController@restore')->name('post.restore');
    Route::get('/setting/post/trashed/','postController@trashed')->name('post.trashed');

    
    Route::post('/setting/tag/update/{id}','tagController@update')->name('tag.update');
    Route::get('/setting/tag','tagController@index')->name('indextag');
    Route::get('/setting/tag/edit/{id}','tagController@edit')->name('tag.edit');
    Route::get('/setting/tag/add','tagController@create')->name('add.tag');
    Route::post('/setting/tag/store', 'tagController@store')->name('tag.store');




    Route::get('/users/add','usersController@create')->name('add.users');
    Route::get('/users','usersController@index')->name('users');
    Route::post('/users/store', 'usersController@store')->name('user.store');
    Route::get('/user/delete/{id}','usersController@destroy')->name('user.delete');
    Route::get('/user/edit/{id}','userController@edit')->name('user.edit');
    Route::get('/counter','searchController@counter')->name('counter');
    
    
    
    Route::get('/branch','categoryController@Branche')->name('branch');

    Route::get('/branch/create','categoryController@branchcreate')->name('branch.create');

    Route::post('/branch/store','categoryController@Branchestore')->name('Branchs.store');
    

    Route::get('/branch/edit/{id}','categoryController@branchedit')->name('branch.edit');
    Route::post('/branch/update/{id}','categoryController@branchupdate')->name('branch.update');
    Route::post('/branch/delete/{id}','categoryController@dele')->name('dele');
});

Route::get('/home','ulController@index')->name('index');

Route::get('/c/{name}','ulController@shop')->name('shop');

Route::get('/c/{name}/{id}/{slug}','ulController@showPost')->name('post.show');
Route::post('/profile/update', 'profileController@update')->name('users.profile.update');
Route::get('/profile','ProfileController@index')->name('index.profile');

Route::get('/user/notadmin/{id}','usersController@notadmin')->name('users.not.admin');
Route::get('/user/uadmin/{id}','usersController@makeadmin')->name('users.admin');


Route::post('/daa/{id}', 'cartController@store')->name('cer');
Route::get('/cart','postController@cart')->name('cart');

Route::get('/c/{name}/{id}','ulController@Branch')->name('categoryy');


Route::post('/update/{id}', 'cartController@update')->name('updateqty');

Route::delete('/remove/{id}', 'cartController@destroy')->name('remove');

Route::post('/coupon1', 'cartController@couponsstore')->name('coupon');
 
Route::post('/getouzt', 'checkout2@store')->name('getout');
Route::get('/checkout', 'checkout2@index')->name('checkout');
Route::delete('/coupon/destroy', 'cartController@destroyy')->name('ddd');



Route::get('/admin/add-attributes/{id}','postController@addAttributes');
Route::get('/ddd', 'postcontroller@indexdet')->name('ddd');
Route::post('/admin/add-attributess/{id}', 'postController@ATTupdate')->name('ATT');