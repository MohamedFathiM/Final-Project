<?php
Route::prefix('dashboard')->group(function(){
    
    Route::get('/index' ,'dashboardrouts@index')->name('index');

    /*Users table routes  */
    Route::get('/users' , 'Usersctcontroller@index')->name('users');
    Route::post('/users' , 'Usersctcontroller@store')->name('Addusers');
    Route::get('/EditeUsers/{id}' , 'Usersctcontroller@edit')->name('EditeUsers');
    Route::put('/UpdateUsers/{id}' , 'Usersctcontroller@Update')->name('UpdateUsers');
    Route::delete('/users/{id}', 'Usersctcontroller@destroy')->name('users.destroy');


    Route::get('/Admins' , 'Adminsctcontroller@index')->name('Admins');




    /*Categories table routes  */

    Route::get('/Categories' ,'Categorycontroller@index')->name('Categories');
    Route::post('/Categories' , 'Categorycontroller@store')->name('AddCategory');
    Route::get('/EditeCategory/{id}' , 'Categorycontroller@edit')->name('EditeCategory');
    Route::put('/UpdateCategory/{id}' , 'Categorycontroller@update')->name('UpdateCategory');
    Route::delete('/Categories/{id}', 'Categorycontroller@destroy')->name('category.destroy');


    /*Products table routes  */
    Route::get('/Products' , 'Productcontroller@index')->name('Products');
    Route::post('/AddProducts' , 'addproductscontroller@store')->name('AddProducts');
    Route::get('/EditeProducts/{id}' , 'Productcontroller@edit')->name('EditeProducts');
    Route::put('/UpdateProducts/{id}' , 'Productcontroller@update')->name('UpdateProducts');
    Route::delete('/Products/{id}', 'Productcontroller@destroy')->name('product.destroy');
    
    Route::resource('/comments' ,'commentController');
    Route::resource('/orders' ,'orderController');
   
    

   

    Route::get('/contacts' , 'dashboardrouts@contacts')->name('contact');
    
    Route::get('/login' , 'dashboardrouts@login')->name('login');
    Route::get('/register' , 'dashboardrouts@register')->name('register');

    
});
    