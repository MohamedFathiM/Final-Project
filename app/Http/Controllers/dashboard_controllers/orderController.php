<?php

namespace App\Http\Controllers\dashboard_controllers;
use App\Order;
use App\Product;
use App\Cart;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class orderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders=Order::All();
        return view('dash_pages.pages.Comments&Orders.order' , compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request -> all();
        $validatedData = $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'address' => 'required',
            'city' => 'required|max:2048',
            'zipCode' => 'required|max:2048',
            'phoneNumber' => 'required|max:2048',
            'comment'=> 'required|max:2048' ,
            'email'=> 'required|max:2048' ,
            'totalprice'=> 'required|max:2048' ,
        ]);
       
       $orders = new Order();
       $orders['first_name'] = $input['fname'];
       $orders['second_name'] = $input['lname'];
       $orders['address'] = $input['address'];
       $orders['country'] = $input['city'];
       $orders['zipCode'] = $input['zipCode'];
       $orders['phoneNumber'] =$input['phoneNumber'];
       $orders['comment'] =$input['comment'];
       $orders['email'] =$input['email'];
       $orders['totalprice'] =$input['totalprice'];

       $orders -> save();
       return back()
       ->with('message',' Successfully added');
    
    }
   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $orders=Order::find($id);
        $orders->delete();
        return back();
    }
    }

