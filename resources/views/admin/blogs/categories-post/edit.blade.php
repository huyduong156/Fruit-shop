@extends('master.admin')

@section('title','Create new category')
    

@section('main')
<form  action="{{route('category-post.update',$categoryPost->id)}}" method="POST" role="form">
    @csrf @method('PUT')
    <div class="form-group">
        <label for="sr-only">Category Post name</label>
        <input type="text" name="name" value="{{$categoryPost->name}}" id="" class="form-control" placeholder="Input Field">
        @error('name')
            <small class="help-block">{{$message}}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="sr-only">Category Post status</label>
        <div class="radio">
            <label class="form-check-label">
                <input type="radio" {{$categoryPost->status == 1 ? 'checked':''}} class="form-check-input" name="status" id="inputstatus" value="1">
                Publish
          </label>
        </div>
        <div class="radio">
            <label class="form-check-label">
                <input type="radio" {{$categoryPost->status == 0 ? 'checked':''}}  class="form-check-input" name="status" id="inputstatus" value="0">
                Hidden
          </label>
        </div>
        @error('status')
            <small class="help-block">{{$message}}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="sr-only">Description</label>
        <textarea name="description"  class="form-control description">{{readFileText($categoryPost->description)['content']}}</textarea>
    </div>




    <button type="submit" class="btn btn-primary"><i class="fa fa-save">Save</i></button>
</form>


@endsection
@push('js')
<script>
    $(document).ready(function() {
        $('.description').summernote();
    });
</script>
@endpush
