@extends('admin.layout.master')
@section('content')


<div class="col-sm-9">
  <h4><small>Danh sách sản phẩm</small></h4>
  <hr>
  @if(count($errors) > 0)
  <div class="alert alert-danger">
    @foreach($errors->all() as $err)
    {{$err}}<br/>
    @endforeach
  </div>
  @endif
  @if(Session('thongbao'))
  <div class="alert alert-success">
    {{Session('thongbao')}}
  </div>
  @endif
  <table class="table table-hover table-bordered text-center">
    <thead>
      <tr align="center" >
        <th> ID </th>
        <th> Name </th>
        <th> Description </th>           
        <th>Delete</th>  
        <th>Edit</th>         
      </tr>
    </thead>
    <tbody>
      @foreach($type as $tp)
      <tr>
        <td>{{$tp->id}} </td>
        <td>{{$tp->name}}</td>
        <td>{!!$tp->description!!}</td>       
        <td class="center"><a href="admin/productType/delete/{{$tp->id}} "><i class="fa fa-trash-o"></i> Delete </a></td>
        <td class="center"><a href="admin/productType/edit/{{$tp->id}} "><i class="fa fa-pencil"></i> Edit </a></td>
      </tr>
      @endforeach
    </tbody>

  </table>

</div>
</div>



@endsection