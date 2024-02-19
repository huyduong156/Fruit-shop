@extends('master.admin')

@section('title','Create new product')
@push('css')
{{--<link rel="stylesheet" href="admin_assets/vendor/libs/summernote/summernote.min.css"> --}}

@endpush

@section('main')
<form action="{{route('post.store')}}" method="POST" role="form" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-9">
            <div class="form-group">
                <label for="sr-only">Post name</label>
                <input type="text" name="name" id="" class="form-control" placeholder="Input Field">
            </div>
            @error('name')
            <div class="help-block">{{$message}}</div>
            @enderror
            <div class="form-group">
                <label for="sr-only">Short_Description</label>
                <textarea name="short_description" class="form-control short-description"></textarea>
            </div>
            <div class="form-group">
                <label for="sr-only">Description</label>
                <textarea name="description"  class="form-control description"></textarea>
            </div>


        </div>
        <div class="col-3">
            <div class="form-group">
                <label for="sr-only">Post category</label><br>
                @foreach ($cats as $item)
                    <input type="checkbox" name="cats[]" value="{{$item->id}}"> {{$item->name}}
                    <br>
                @endforeach
            </div>
            <hr>
            <div class="form-group">
                <label for="sr-only">Post tags</label><br>
                @foreach ($tags as $item)
                    <input type="checkbox" name="tags[]" value="{{$item->id}}"> {{$item->name}}
                    <br>
                @endforeach

            </div>
            <hr>

            <div class="form-group">
                <label for="sr-only">Post status</label>
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
            </div>
            <hr>
            <div class="form-group">
                <label for="sr-only">Post image</label>
                <input type="file" name="img" id="" class="form-control" placeholder="Input Field"
                    onchange="showImage(this)">
                    <br>
                <img src="" id="show_image" width="100%" alt="">

            </div>

        </div>
    </div>





    <button type="submit" class="btn btn-primary"><i class="fa fa-save"> Save</i></button>
</form>


@endsection
@push('js')
<script>
    $(document).ready(function() {
        $('.description').summernote();
    });
    function showImage(input) {
        // console.log(input);
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
            $('#show_image').attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    };
</script>
@endpush