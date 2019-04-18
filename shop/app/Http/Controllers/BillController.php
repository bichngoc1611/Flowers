<?php

namespace App\Http\Controllers;

use App\Bill;
use App\User;
use App\BillDetail;
use App\Product;
use Illuminate\Http\Request;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bill = Bill::all();
        $user = User::all();
        return view('admin.bill.index',['bill'=>$bill, 'user' => $user]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ctbill = BillDetail::where('id_bill',$id)->get();
        $product = Product::all();        
        $bill = Bill::find($id);
        return view('admin.bill.chitietbill',['ctbill'=>$ctbill,'product'=>$product,'bill'=>$bill]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function edit(Bill $bill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $bill = Bill::find($id);
        // $bill->id_users = $request->id_users;
        // $bill->order = $request->order;
        // $bill->total = $request->total;
        // $bill->payment = $request->payment;
        // $bill->note = $request->note;
        $bill->status = $request->status;
        
        $bill->save();
        return redirect()->back()->with('thongbao','Lưu trạng thái hóa đơn thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bill $bill)
    {
        //
    }
}
