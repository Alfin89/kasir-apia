<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderDetail;


class OrderDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orderDetails = OrderDetail::all();
        return response()->json($orderDetails);
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
        $orderDetail = new OrderDetail();
        $orderDetail->order_id = $request->input('order_id');
        $orderDetail->product_id = $request->input('product_id');
        $orderDetail->qty = $request->input('qty');
        $orderDetail->price = $request->input('price');
        $orderDetail->save();
        return response()->json($orderDetail, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orderDetail = OrderDetail::find($id);
        if (!$orderDetail) {
            return response()->json(['error' => 'Order detail not found'], 404);
        }
        return response()->json($orderDetail);
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
        $orderDetail = OrderDetail::find($id);
        if (!$orderDetail) {
            return response()->json(['error' => 'Order detail not found'], 404);
        }
        $orderDetail->order_id = $request->input('order_id');
        $orderDetail->product_id = $request->input('product_id');
        $orderDetail->qty = $request->input('qty');
        $orderDetail->price = $request->input('price');
        $orderDetail->save();
        return response()->json($orderDetail);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $orderDetail = OrderDetail::find($id);
        if (!$orderDetail) {
            return response()->json(['error' => 'Order detail not found'], 404);
        }
        $orderDetail->delete();
        return response()->json(['message' => 'Order detail deleted']);
    }
}
