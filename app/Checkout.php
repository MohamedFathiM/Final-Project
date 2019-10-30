<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    protected $fillable =[
        'image','name','price','user_id' ,'product_id', 'qauntity'
    ];
}
