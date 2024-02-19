@extends('master.admin')

@section('title','Create new product')
@push('css')
{{--<link rel="stylesheet" href="admin_assets/vendor/libs/summernote/summernote.min.css"> --}}

@endpush

@section('main')
<form action="{{route('product.store')}}" method="POST" role="form" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-9">
            <div class="form-group">
                <label for="sr-only">Product name</label>
                <input type="text" name="name" id="" class="form-control" placeholder="Input Field">
            </div>
            @error('name')
            <div class="help-block">{{$message}}</div>
            @enderror
            <div class="form-group">
                <label for="sr-only">Description</label>
                <textarea name="description"  class="form-control description"></textarea>
            </div>
            <div class="form-group">
                <label for="sr-only">Product orther image</label>
                <input type="file" name="other_img[]" id="" class="form-control" multiple placeholder="Input Field"
                    onchange="showOtherImage(this)">
                <div class="row" id="show_other_img">
                    {{-- <div class="col-md-3 thumbnail">
                        <img src="" alt="" width="100%">
                    </div> --}}
                </div>
            </div>
            <hr>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label for="sr-only">Product category</label>
                <select name="category_id" id="">
                    <option value="">-------Choice-------</option>
                    @foreach ($cats as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="sr-only">Product tags</label><br>
                @foreach ($tags as $item)
                    <input type="checkbox" name="tags[]" value="{{$item->id}}">{{$item->name}}
                    <br>
                @endforeach

            </div>
            <div class="form-group">
                <label for="sr-only">Product price</label>
                <input type="text" name="price" id="" class="form-control" placeholder="Input Field">
            </div>
            @error('price')
            <div class="help-block">{{$message}}</div>
            @enderror
            <div class="form-group">
                <label for="sr-only">Product sale price</label>
                <input type="text" name="sale_price" id="" class="form-control" placeholder="Input Field">
            </div>
            @error('sale_price')
            <div class="help-block">{{$message}}</div>
            @enderror
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
            </div>
            <div class="form-group">
                <label for="sr-only">Product image</label>
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
    function showOtherImage(input) {
        if (input.files && input.files.length) {
            var _html ='';
            console.log(input.files.length);
            for (let i = 0; i < input.files.length; i++) {
                var file = input.files[i];
                var reader = new FileReader();
        
                reader.onload = function (e) {
                    _html += `
                    <div class="col-md-3 thumbnail">
                            <img src="${e.target.result}" alt="" width="100%">
                        </div>
                    `;
                    $('#show_other_img').html(_html)
                }

                reader.readAsDataURL(file);
            }
        }
    };
</script>
@endpush