@extends('master.admin')

@section('title','Create new tag')
    

@section('main')
<div class="container">
    <div class="row">
        <div class="col-4">
            <form  action="{{route('tag-product.store')}}" method="POST" role="form">
                @csrf
                <div class="form-group">
                    <label for="sr-only">Tag name</label>
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
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"> Save</i></button>
            </form>
        </div>
        <div class="col-8">
            <table class="table" style="border: 1px solid #cccccc">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tag Name</th>
                        <th>Tag Status</th>
                        <th>Product</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $tag)
                        <tr>
                            <th>{{$loop->index+1}}</th>
                            <td>{{$tag->name}}</td>
                            <td>{{$tag->status == 1 ? 'publish':'hidden'}}</td>
                            <td>{{$tag->products->count()}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection
@push('js')
<script>
    $(document).ready(function() {
        $('.description').summernote();
    });
</script>
@endpush




























