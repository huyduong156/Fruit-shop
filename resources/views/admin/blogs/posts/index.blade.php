@extends('master.admin')

@section('title','Product')
    

@section('main')
<form  class="form-inline">
    <div class="form-group">
        {{-- <label for="sr-only">label</label> --}}
        <input type="text" name="" id="" class="form-control" placeholder="search post">
    </div>
    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
    <a href="{{route('post.create')}}" type="submit" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add new Post</a>



</form>
<br>
<table class="table">
    <thead>
        <tr>
            <th>STT</th>
            <th style="max-width: 300px">Post Name</th>
            <th>Category</th>
            <th>Status</th>
            <th>Put Day</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
                <th>{{$loop->index+1}}</th>
                <th style="max-width: 300px">{{$item->name}}</th>
                <th>
                    {{-- @if (isset($item->cat->name))
                        {{$item->cat->name}}
                    @endif  --}}
                </th> 
                <td>{{$item->status == 0 ? 'Hidden' : 'Publish'}}</td>     
                <td>{{$item->created_at}}</td>     
                <td>
                    <form action="{{route('post.destroy',$item->id)}}" method="post" >
                        @csrf @method('DELETE')
                        <a href="{{route('post.edit',$item->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                        <button href="{{route('post.destroy',$item->id)}}" class="btn btn-sm btn-danger" onclick="return confirm('are u sure want to delete it ?')"><i class="fa fa-trash"></i></button>
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





























