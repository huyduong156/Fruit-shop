@extends('master.admin')

@section('title','Product')
    

@section('main')
<form  class="form-inline">
    <div class="form-group">
        <label for="sr-only">label</label>
        <input type="email" name="" id="" class="form-control" placeholder="Input Field">
    </div>
    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
    <a href="{{route('product.create')}}" type="submit" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add New Product</a>



</form>
<br>
<table class="table">
    <thead>
        <tr>
            <th><a>STT</a></th>
            <th><a href="{{route('product.index')}}?sort-by=name&sort-type={{$sortType}}">Product Name</a></th>
            <th><a >Category</a></th>
            <th><a href="{{route('product.index')}}?sort-by=price&sort-type={{$sortType}}">Price</a></th>
            <th><a href="{{route('product.index')}}?sort-by=status&sort-type={{$sortType}}">Status</a></th>
            <th>Image</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
                <th>{{$loop->index+1}}</th>
                <th>{{$item->name}}</th>
                <th>
                    @if (isset($item->cat->name))
                        {{$item->cat->name}}
                    @endif 
                </th>
                <td>{{$item->price}} 
                    @if (isset($item->sale_price))
                        <span class="label label-success">{{$item->sale_price}} </span> 
                    @endif 
                </td>   
                <td>{{$item->status == 0 ? 'Hidden' : 'Publish'}}</td>   
                <td><img src="uploads/product/{{$item->image}}" width="60" alt=""></td>   
                <td>
                    <form action="{{route('product.destroy',$item->id)}}" method="post" >
                        @csrf @method('DELETE')
                        <a href="{{route('product.edit',$item->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                        <button href="{{route('product.destroy',$item->id)}}" class="btn btn-sm btn-danger" onclick="return confirm('are u sure want to delete it ?')"><i class="fa fa-trash"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@if(isset($data) && count($data) > 0 )
    {{$data->links('home.blocks.pagination_template')}}
@endif


@endsection




























