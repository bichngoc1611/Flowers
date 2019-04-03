<?php

namespace App\Http\Controllers;

use App\ProductType;
use Illuminate\Http\Request;
use App\Http\Requests\ProducttypeRequest;

class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $type = ProductType::all();
        return view('admin.productType.index',['type'=>$type]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
        return view('admin.productType.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProducttypeRequest $request)
    {        
        $type = new ProductType;
        $type->name = $request->name;
        $type->description = $request->description;
        $type->save();

        return redirect()->back()->with('thongbao','Thêm thành công');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type = ProductType::find($id);
        return view('admin.productType.edit',['type'=>$type]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function update(ProducttypeRequest $request, $id)
    {
        $type = ProductType::find($id);        
        $type->name = $request->name;
        $type->description = $request->description;
        $type->save();

        return redirect()->back()->with('thongbao','Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProductType::destroy($id);
         return redirect()->back()->with('thongbao','Xóa thành công');
    }
}
