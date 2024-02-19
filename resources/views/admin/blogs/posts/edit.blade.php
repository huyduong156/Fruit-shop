@extends('master.admin')

@section('title','Edit post')
@section('css')
    <link rel="stylesheet" href="admin_assets/vendor/libs/summernote/summernote.min.css">
@endsection

@section('main')
<form  action="{{route('post.update',$post->id)}}" method="POST" role="form" enctype="multipart/form-data">
    @csrf @method('PUT')
    <div class="row">
        <div class="col-9">
            <div class="form-group">
                <label for="sr-only">Post name</label>
                <input type="text"  value="{{$post->name}}" name="name" id="" class="form-control" placeholder="Input Field">
            </div>
            @error('name')
                <div class="help-block">{{$message}}</div>
            @enderror
            <div class="form-group">
                <label for="sr-only">Short Description</label>
                <textarea style="min-height: 100px" name="short_description" class="form-control short-description">{{$post->short_description}}</textarea>
            </div>
            <div class="form-group">
                <label for="sr-only">Description</label>
                {{-- <textarea  name="description"  value="{{$product->description}}" class="form-control description"></textarea> --}}
                <textarea name="description" class="form-control description">{{readFileText($post->description)['content']}}</textarea>
            </div>

        </div>
        <div class="col-3">
                <div class="form-group">
                    <label for="sr-only">Post category</label><br>
                    
                    @foreach ($cats as $item_cats)
                        <input type="checkbox" name="cats[]" value="{{$item_cats->id}}" {{ $post->categories->contains($item_cats) ? 'checked' : '' }}>
                        {{$item_cats->name}}
                        <br>
                    @endforeach
                </div>
                <hr>
                <div class="form-group">
                    <label for="sr-only">Post tags</label><br>
                    @foreach ($tags as $item_tags)
                        <input type="checkbox" name="tags[]" value="{{$item_tags->id}}" {{ $post->tags->contains($item_tags) ? 'checked' : '' }}>
                        {{$item_tags->name}}
                        <br>
                    @endforeach

                </div>
                <div class="form-group">
                    <label for="sr-only">Post status</label>
                    <div class="radio">
                        <label class="form-check-label">
                            <input {{$post->status == 1 ? 'checked':''}}  type="radio" class="form-check-input" name="status" id="inputstatus" value="1">
                            Publish
                      </label>
                    </div>
                    <div class="radio">
                        <label class="form-check-label">
                            <input {{$post->status == 0 ? 'checked':''}}  type="radio" class="form-check-input" name="status" id="inputstatus" value="0">
                            Hidden
                      </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="sr-only">Post image</label>
                    <input type="file" name="img" id="" class="form-control" placeholder="Input Field" onchange="showImage(this)">
                    <img src="{{'uploads/blog/'.$post->image}}" alt="" width="100%" id="show_image">
                </div>

        </div>
    </div>





    <button type="submit" class="btn btn-primary"><i class="fa fa-save">Save</i></button>
</form>


@endsection

@push('js')
    <script src="admin_assets/vendor/libs/summernote/summernote.min.js"></script>
    <script>
        
        $(document).ready(function() {
            $('.description').summernote();
        });
        function showImage(input) {
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



























