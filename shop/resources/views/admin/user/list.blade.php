@extends('admin.layout.index')
@section('content')
    
<div class="container-fluid Admin_Size_content">
    
<h4 class="text-center"> Products </h4>
<div class="row mb-3">
        <div class="col-md-12 d-flex flex-row">
            <div class="d-flex align-items-center mr-3"> Tìm kiếm: </div> 
            <form action="admin/products/search-product" method="GET" class="d-flex flex-row mr-3">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search" name="search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-outline-dark"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
        
    </div>
<div class="row">
            <div class="col-md-6 offset-md-3">
                <p class="mb-3 mt-3 text-success"> 
                
                </p>
            </div>
</div>
    <table class="table table-hover table-bordered text-center">
        <thead>
            <tr>
                <th> # </th>
                <th> Name </th>
                <th> Producttype </th>
                <th> Price </th>
                <th> Promotion_price </th>
                <th> Status </th>
                <th> Action </th>
            </tr>
        </thead>
        <tbody>
                @foreach($products as $product)
                    <tr>
                        <td> {{$product->id}} </td>
                        <td> {{$product->name}} </td>
                        <td> {{$product->producttype->name}} </td>
                        <td> {{$product->price}} </td>
                        <td> {{$product->promotion_price}} </td>
                        <td> {{$product->status}} </td>
                        
                        
                        <td >
                            <div class="d-flex flex-row justify-content-center">
                            <form action="admin/products/show/{{$product->id}}" method="GET">
                                <button class='btn btn-danger ml-2'> <i class="far fa-eye"></i> </button>
                            </form>
                            
                            <form action="admin/products/edit/{{$product->id}}" method="GET">
                                <button class='btn btn-success ml-2'> <i class="far fa-edit"></i> </button> 
                            </form>
                        
                            </div> 
                        </td> 
                    </tr>
                @endforeach
          
        </tbody>
    </table>
    <div class="row mt-4">
                    <div class="col-md-12 d-flex justify-content-center ">
                        {{$products->links("pagination::bootstrap-4")}}
                    </div>
                </div>
</div>


@endsection