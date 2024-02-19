@extends('master.admin')

@section('title','Home display')


@section('main')
<form action="{{route('post_setting_home')}}" method="POST" role="form" enctype="multipart/form-data"
    style="border: 1px solid rgb(128, 128, 128); border-radius: 5px; padding: 10px">
    @csrf
    <div id="table-content-slider">
        @foreach ($data_slider as $item)
        {{-- @dd($item) --}}
        <table class="table table-bordered" id="table-content-slider-{{$loop->index+1}}">
            <thead>
                <tr>
                    <th>
                        @if ($loop->index != 0)
                        <button class="btn btn-danger btn-delete-table" data-id="{{$loop->index+1}}"><i
                                class="fa-regular fa-square-minus"></i> Xóa</button>
                        @endif
                    </th>
                    <th>
                        <h4 style="text-align: center; color: rgb(255, 22, 139);">Banner {{$loop->index+1}}</h4>
                    </th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <th>Tiêu đề</th>
                    <th>
                        <input type="text" value="{{$item['title_banner']}}" name="banner[{{$loop->index}}][title_banner]" id=""
                            class="form-control" placeholder="Tiêu đề ">
                        @error('title_banner')
                            <div class="help-block">{{$message}}</div>
                        @enderror
                    </th>
                </tr>
                <tr>
                    <th>Tiêu đề nhỏ</th>
                    <th>
                        <input type="text" value="{{$item['title_small']}}" name="banner[{{$loop->index}}][title_small]" id=""
                            class="form-control" placeholder="Tiêu đề nhỏ">
                    </th>
                </tr>
                <tr>
                    <th>tiêu đề nút</th>
                    <th>
                        <input type="text" value="{{$item['title_button']}}" name="banner[{{$loop->index}}][title_button]" id=""
                            class="form-control" placeholder="Tiêu đề nút">
                    </th>
                </tr>
                <tr>
                    <th>Liên kết</th>
                    <th>
                        {{-- <input type="text" value="{{$item['link']}}" name="banner[{{$loop->index}}][link]" id="" class="form-control"
                            placeholder="Liên kết"> --}}
                    </th>
                </tr>
                <tr>
                    <th>Ảnh banner</th>
                    <th>
                    {{-- <input type="text" value="{{$item['image_banner']}}" name="banner[0][image_banner]" id="" class="form-control"> --}}
                    <input type="file" name="image" id="" class="form-control">
                </th>
                </tr>
                <tr>
                    <th></th>
                    <th>
                        <img src="uploads/slider/1-1.jpg" alt="" width="100%">
                    </th>
                </tr>
            </tbody>
        </table>
        @endforeach

    </div>
    <button id="add-slide" class="btn btn-primary"><i class="fa-solid fa-circle-plus"></i> Thêm slide</button>
    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i></button>
</form>

.
@endsection
@push('js')
<script>
    $('#add-slide').click(function(ev){
            ev.preventDefault();

            var data_count = $('#table-content-slider table').length;

            var newTableHtml = '<table class="table table-bordered" id="table-content-slider-' + (data_count + 1) + '">' +
                '<thead>' +
                    '<tr>' +
                        '<th><button class="btn btn-danger btn-delete-table" data-id="' + (data_count + 1) + '"><i class="fa-regular fa-square-minus"></i> Xóa</button></th>' +
                        '<th><h4 style="text-align: center; color: rgb(255, 22, 139);">Banner ' + (data_count + 1) + '</h4></th>' +
                    '</tr>' +
                '</thead>' +
                '<tbody>' +
                    '<tr>' +
                        '<th>Tiêu đề</th>' +
                        '<th><input type="text" value="" name="banner[' + data_count + '][title_banner]" class="form-control" placeholder="Tiêu đề "></th>' +
                    '</tr>' +
                    '<tr>' +
                        '<th>Tiêu đề nhỏ</th>' +
                        '<th><input type="text" value="" name="banner[' + data_count + '][title_small]" class="form-control" placeholder="Tiêu đề nhỏ"></th>' +
                    '</tr>' +
                    '<tr>' +
                        '<th>tiêu đề nút</th>' +
                        '<th><input type="text" value="" name="banner[' + data_count + '][title_button]" class="form-control" placeholder="Tiêu đề nút"></th>' +
                    '</tr>' +
                    '<tr>' +
                        '<th>Liên kết</th>' +
                        '<th><input type="text" value="" name="banner[' + data_count + '][link]" class="form-control" placeholder="Liên kết"></th>' +
                    '</tr>' +
                    '<tr>' +
                        '<th>Ảnh banner</th>' +
                        '<th><input type="file" name="banner[' + data_count + '][image_banner]" class="form-control"></th>' +
                    '</tr>' +
                '</tbody>' +
            '</table>';

            // Thêm nội dung mới vào cuối của phần tử #table-content-slider
            $('#table-content-slider').append(newTableHtml);
        });

        $('.btn-delete-table').click(function(ev) {
            ev.preventDefault();

            // Lấy giá trị từ thuộc tính data-id
            var itemId = '#table-content-slider-' + $(this).data('id');
            Swal.fire({
                title: "Thông báo",
                text: "Bạn có chắc muốn xóa không",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Có"
                }).then((result) => {
                     $(itemId ).remove();

                    if (result.isConfirmed) {
                        Swal.fire({
                        title: "Deleted!",
                        text: "Xóa thành công",
                        icon: "success"
                        });
                    }
            });
            
            // Gọi hàm xóa phần tử khác dựa trên itemId
            // deleteItem(itemId); 
        });


</script>
@endpush