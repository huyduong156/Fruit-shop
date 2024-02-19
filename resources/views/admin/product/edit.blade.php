@extends('master.admin')

@section('title','Edit product')
@section('css')
    <link rel="stylesheet" href="admin_assets/vendor/libs/summernote/summernote.min.css">
@endsection

@section('main')






<form  action="{{route('product.update',$product->id)}}" method="POST" role="form" enctype="multipart/form-data">
    @csrf @method('PUT')
    <div class="row">
        <div class="col-9">
            <div class="form-group">
                <label for="sr-only">Product name</label>
                <input type="text"  value="{{$product->name}}" name="name" id="" class="form-control" placeholder="Input Field">
            </div>
            @error('name')
                <div class="help-block">{{$message}}</div>
            @enderror
            <div class="form-group">
                <label for="sr-only">Description</label>
                {{-- <textarea  name="description"  value="{{$product->description}}" class="form-control description"></textarea> --}}
                <textarea name="description" class="form-control description">{{readFileText($product->description)['content']}}</textarea>
            </div>
            <div class="form-group">
                <label for="sr-only">Product orther image</label>
                <input type="file" name="other_img[]" id="" class="form-control"  multiple  placeholder="Input Field" onchange="showOtherImage(this)">
            </div>
            <hr>
            <div class="row">
                @foreach ($product->images as $img)
                <div class="col-md-3" style="position: relative;">
                    <a href="" class="thumbnail">
                        <img src="uploads/product/{{$img->image}}" alt="" width="100%" style="border: 1px solid #ddd">
                    </a>
                    <a onclick="return confirm('are u sure delete it ?')" href="{{route('product.destroyImage', $img->id)}}" style="position: absolute;top:5px; right:20px;" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                </div>
                @endforeach
            </div>
            {{-- @if (!isset($product->images[0]))
                <h3>Thêm album ảnh</h3>
            @else
                <h3>ảnh mới sẽ thay thế ảnh cũ</h3>
            @endif --}}
            <div class="row" id="show_other_img">
                {{-- <div class="col-md-3 thumbnail">
                    <img src="" alt="" width="100%">
                </div> --}}
            </div>

        </div>
        <div class="col-3">
                <div class="form-group">
                    <label for="sr-only">Product category</label>
                    <select name="category_id" id="">
                        <option value="">-------Choice-------</option>
                        @foreach ($cats as $cat)
                            <option {{$cat->id == $product->category_id ? 'selected':''}}  value="{{$cat->id}}">{{$cat->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="sr-only">Product tags</label><br>
                    @foreach ($tags as $item_tags)
                        <input type="checkbox" name="tags[]" value="{{$item_tags->id}}" {{ $product->tags->contains($item_tags->id) ? 'checked' : '' }}>
                        {{$item_tags->name}}
                        <br>
                    @endforeach
                    {{-- @foreach ($tags as $item_tags)
                        <input type="checkbox" name="tags[]"  value="{{$item->id}}">{{$item->name}}
                        <br>
                    @endforeach --}}
                </div>
                <div class="form-group">
                    <label for="sr-only">Product price</label>
                    <input type="text" value="{{$product->price}}" name="price" id="" class="form-control" placeholder="Input Field">
                </div>
                @error('price')
                    <div class="help-block">{{$message}}</div>
                @enderror
                <div class="form-group">
                    <label for="sr-only">Product sale price</label>
                    <input type="text" value="{{$product->sale_price}}" name="sale_price" id="" class="form-control" placeholder="Input Field">
                </div>
                @error('sale_price')
                    <div class="help-block">{{$message}}</div>
                @enderror
                <div class="form-group">
                    <label for="sr-only">Category status</label>
                    <div class="radio">
                        <label class="form-check-label">
                            <input {{$product->status == 1 ? 'checked':''}}  type="radio" class="form-check-input" name="status" id="inputstatus" value="1">
                            Publish
                      </label>
                    </div>
                    <div class="radio">
                        <label class="form-check-label">
                            <input {{$product->status == 0 ? 'checked':''}}  type="radio" class="form-check-input" name="status" id="inputstatus" value="0">
                            Hidden
                      </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="sr-only">Product image</label>
                    <input type="file" name="img" id="" class="form-control" placeholder="Input Field" onchange="showImage(this)">
                    <img src="uploads/product/{{$product->image}}" alt="" width="100%" id="show_image">
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

        function showOtherImage(input) {
        if (input.files && input.files.length) {
            var _html ='<h3>ảnh mới sẽ thay thế ảnh cũ</h3>';
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



























