<?php
Route::prefix('dashboard')->group(function(){
    
    Route::get('/index' ,'dashboardrouts@index')->name('index');
    Route::get('/widgets' , 'dashboardrouts@widgets')->name('widgits');


    Route::get('/users' , 'Usersctcontroller@index')->name('users');
    Route::post('/users' , 'Usersctcontroller@store')->name('Addusers');
    Route::get('/EditeUsers/{id}' , 'Usersctcontroller@edit')->name('EditeUsers');
    Route::put('/UpdateUsers/{id}' , 'Usersctcontroller@Update')->name('UpdateUsers');
    Route::delete('/users/{id}', 'Usersctcontroller@destroy')->name('users.destroy');


    Route::get('/Admins' , 'Adminsctcontroller@index')->name('Admins');
    Route::get('/inline' , 'dashboardrouts@Inline')->name('Inline');



    Route::get('/Categories' ,'Categorycontroller@index')->name('Categories');
    Route::post('/Categories' , 'Categorycontroller@store')->name('AddCategory');
    Route::get('/EditeCategory/{id}' , 'Categorycontroller@edit')->name('EditeCategory');
    Route::put('/UpdateCategory/{id}' , 'Categorycontroller@update')->name('UpdateCategory');
    Route::delete('/Categories/{id}', 'Categorycontroller@destroy')->name('category.destroy');

    Route::resource('/comments' ,'commentController');
    Route::resource('/orders' ,'orderController');
   
    Route::get('/Products' , 'Productcontroller@index')->name('Products');
    Route::post('/AddProducts' , 'addproductscontroller@store')->name('AddProducts');
    Route::get('/EditeProducts/{id}' , 'Productcontroller@edit')->name('EditeProducts');
    Route::put('/UpdateProducts/{id}' , 'Productcontroller@update')->name('UpdateProducts');
    Route::delete('/Products/{id}', 'Productcontroller@destroy')->name('product.destroy');

    Route::get('/modals' , 'dashboardrouts@modals')->name('modals');
    Route::get('/navbar' , 'dashboardrouts@navbar')->name('navbar');
    Route::get('/sliders' , 'dashboardrouts@sliders')->name('sliders');
    Route::get('/data' , 'dashboardrouts@data')->name('datatables');
    Route::get('/jsgrid' , 'dashboardrouts@jsgrid')->name('jsgrid');
    Route::get('/simple' , 'dashboardrouts@simple')->name('simple');
    Route::get('/calendar' , 'dashboardrouts@calendar')->name('calendar');
    Route::get('/gallery' , 'dashboardrouts@gallery')->name('gallery');
    Route::get('/compose' , 'dashboardrouts@compose')->name('compose');
    Route::get('/mailbox','dashboardrouts@mailbox')->name('inbox');
    Route::get('/read' , 'dashboardrouts@read')->name('read');
    Route::get('/page404' , 'dashboardrouts@page404')->name('404');
    Route::get('/page500' , 'dashboardrouts@page500')->name('500');
    Route::get('/contacts' , 'dashboardrouts@contacts')->name('contact');
    Route::get('/e_commerce' , 'dashboardrouts@e_commerce')->name('e-commerce');
    Route::get('/language_menu' , 'dashboardrouts@language_menu')->name('langs');
    Route::get('/login' , 'dashboardrouts@login')->name('login');
    Route::get('/register' , 'dashboardrouts@register')->name('register');

    
});
    // Route::get('/check' , function(){
    //     return "this dashboard";
    // });