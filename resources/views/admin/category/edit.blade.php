@extends('master.admin')

@section('title','Create new category')
    

@section('main')
<form  action="{{route('category.update',$category->id)}}" method="POST" role="form">
    @csrf @method('PUT')
    <div class="form-group">
        <label for="sr-only">Category name</label>
        <input type="text" name="name" value="{{$category->name}}" id="" class="form-control" placeholder="Input Field">
        @error('name')
            <small class="help-block">{{$message}}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="sr-only">Category status</label>
        <div class="radio">
            <label class="form-check-label">
                <input type="radio" {{$category->status == 1 ? 'checked':''}} class="form-check-input" name="status" id="inputstatus" value="1">
                Publish
          </label>
        </div>
        <div class="radio">
            <label class="form-check-label">
                <input type="radio" {{$category->status == 0 ? 'checked':''}}  class="form-check-input" name="status" id="inputstatus" value="0">
                Hidden
          </label>
        </div>
        @error('status')
            <small class="help-block">{{$message}}</small>
        @enderror
        <div class="form-group">
            <label for="sr-only">Description</label>
            <textarea name="description"  class="form-control description">{{readFileText($category->description)['content']}}</textarea>
        </div>
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