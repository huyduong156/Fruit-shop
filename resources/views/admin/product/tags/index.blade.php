@extends('master.admin')

@section('title','Category')
    

@section('main')
<form  class="form-inline">
    <div class="form-group">
        <label for="sr-only">label</label>
        <input type="email" name="" id="" class="form-control" placeholder="Input Field">
    </div>
    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
    <a href="{{route('tag-product.create')}}" type="submit" class="btn btn-success pull-right"><i class="fa fa-plus">Add new</i></a>



</form>
<br>
<table class="table">
    <thead>
        <tr>
            <th>STT</th>
            <th>Tag Name</th>
            <th>Tag slug</th>
            <th>Tag Status</th>
            <th>Product</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $tag)
            <tr>
                <th>{{$loop->index+1}}</th>
                <td>{{$tag->name}}</td>
                <td>{{$tag->slug}}</td>
                <td>{{$tag->status == 1 ? 'publish':'hidden'}}</td>
                <td>{{$tag->products->count()}}</td>
                <td class="text-right">
                    <form action="{{route('tag-product.destroy',$tag->id)}}" method="post" >
                        @csrf @method('DELETE')
                        <a href="{{route('tag-product.edit',$tag->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                        <button href="{{route('tag-product.destroy',$tag->id)}}" class="btn btn-sm btn-danger" onclick="return confirm('are u sure want to delete it ?')"><i class="fa fa-trash"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>



@endsection





























