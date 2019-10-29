<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';
    protected $fillable = [
    'Fname','Lname','address','city','zipCode','phoneNumber','cart_id','subTotal'
    ];

    public function cart(){
        return $this->belongsTo(Cart::class);
    }

    public function User(){
        return $this->belongsTo(User::class);
    }
}
