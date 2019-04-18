<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductType;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        return view('admin.product.index',['product'=>$product]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
        $producttype = ProductType::all();
        return view('admin.product.add',['producttype'=>$producttype]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $product = new Product;
        $product->name = $request->name;      
        $product->id_type = $request->producttype_id;
        $product->description = $request->description;
        $product->unit_price = $request->price;
        $product->promotion_price = $request->promotion_price;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg'){
                return redirect('admin/product/add')->with('thongbao','Chỉ được chọn file có đuôi jpg, png, jpeg');
            }
            $name = $file->getClientOriginalName();
            $image = time().'_'.$name;
            $file->move('public/source/images/product/', $image);
            $product->image = $image;
        }
        $product->unit = $request->unit;
        $product->new = $request->new;
        $product->status = $request->status;
      
        $product->save();

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
        $product = Product::find($id);
        $producttype = ProductType::all();
       
        return view('admin.product.edit',['product'=>$product,'producttype'=>$producttype]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {

        $product = Product::find($id);

        $product->name = $request->name;
        $product->id_type = $request->producttype_id;
        $product->description = $request->description;
        $product->unit_price = $request->price;
        $product->promotion_price = $request->promotion_price;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg'){
                return redirect('admin/product/edit/{{$id}} ')->with('thongbao','Chỉ được chọn file có đuôi jpg, png, jpeg');
            }
            $name = $file->getClientOriginalName();
            $image = str_random(4)."_". $name;
            while (file_exists('public/source/images/product/'.$image)) {
                $image = str_random(4)."_". $name;
            }
       
            $file->move('public/source/images/product/', $image);
            unlink('public/source/images/product/'.$product->image);
            $product->image = $image;
        }       
         $product->unit = $request->unit;
        $product->new = $request->new;
        $product->status = $request->status;
        $product->save();

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
        Product::destroy($id);
         return redirect()->back()->with('thongbao','Xóa thành công');
    }
}
