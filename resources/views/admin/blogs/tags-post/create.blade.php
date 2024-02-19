@extends('master.admin')

@section('title','Create new category')
    

@section('main')
<div class="container">
    <div class="row">
        <div class="col-4">
            <form  action="{{route('tag-post.store')}}" method="POST" role="form">
                @csrf
                <div class="form-group">
                    <label for="sr-only">Category name</label>
                    <input type="text" name="name" id="" class="form-control" placeholder="Input Field">
                    @error('name')
                        <small class="help-block">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="sr-only">Category status</label>
                    <div class="radio">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="status" id="inputstatus" value="1">
                            Publish
                      </label>
                    </div>
                    <div class="radio">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="status" id="inputstatus" value="0">
                            Hidden
                      </label>
                    </div>
                    @error('status')
                        <small class="help-block">{{$message}}</small>
                    @enderror
                </div>
                <a class="btn btn-success" href="{{route('tag-post.index')}}"><i class="fas fa-arrow-alt-circle-left">Back</i></a>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"> Save</i></button>
            </form>
        </div>
        <div class="col-8">
            <table class="table" style="border: 1px solid #cccccc">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tags Name</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tags as $tag)
                        <tr>
                            <th>{{$loop->index+1}}</th>
                            <td>{{$tag->name}}</td>
                            <td>{{$tag->status == 1 ? 'publish':'hidden'}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection




























