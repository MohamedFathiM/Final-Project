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
        return view('dash_pages.pages.Comments&Orders.order');
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
            'Fname' => 'required',
            'Lname' => 'required',
            'address' => 'required',
            'city' => 'required|max:2048',
            'zipCode' => 'required|max:2048',
            'phoneNumber' => 'required|max:2048',
        ]);
       
       $orders = new Order();
       $orders['Fname'] = $input['fname'];
       $orders['Lname'] = $input['lname'];
       $orders['address'] = $input['address'];
       $orders['city'] = $input['city'];
       $orders['zipCode'] = $input['zipCode'];
       $orders['phoneNumber'] =$input['phoneNumber'];
       $orders['card_id'] = '1';
       $orders['subTotal'] =$input['subTotal'];;

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
        //
    }

}