@extends('layouts.app')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sản phẩm:
                        <small>Cập nhật</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-12" style="padding-bottom:120px">
                    <form action="{{ route('product.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Tên sản phẩm (*)</label>
                            <input class="form-control" name="name" value="{{ $data->name }}"/>
                        </div>
                        <div class="form-group">
                            <label>Tên loại sản phẩm</label>
                            <select class="form-control" name="id_type">
                                @foreach ($loaisanpham as $key => $value)
                                    @if($value->id == $data->id_type)
                                        <option value="{{ $value->id }}" selected>{{ $value->name }}</option>
                                    @else
                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Mô tả sản phẩm</label>
                            <textarea rows="3" class="form-control ckeditor" name="description">{{ $data->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Mô tả chi tiết sản phẩm</label>
                            <textarea rows="4" class="form-control ckeditor" name="description_detail">{{ $data->description_detail }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Ảnh minh họa</label>
                            <br>
                            @if($data->image == null)
                                <img id="avatar" src="{{url('upload')}}/image.png" width="180px" height="180px"
                                     alt="your image"/>
                            @else
                                <img id="avatar" src="{{$data->image}}" width="180px" height="180px" alt="your image"/>
                            @endif
                            <input type='file' name="file" onchange="readURL(this)"/>
                        </div>
                        <div class="form-group">
                            <label>Giá nhập kho (*)</label>
                            <input class="form-control" name="giagoc" value="{{ $data->giagoc }}"/>
                        </div>
                        <div class="form-group">
                            <label>Giá bán (*)</label>
                            <input class="form-control" name="unit_price" value="{{ $data->unit_price }}"/>
                        </div>
                        <div class="form-group">
                            <label>Giá gốc khuyễn mại</label>
                            <input class="form-control" name="promotion_price" value="{{ $data->promotion_price }}"/>
                        </div>
                        <div class="form-group">
                            <label>Đơn vị</label>
                            <input class="form-control" name="unit" value="{{ $data->unit }}"/>
                        </div>
                        <div class="form-group">
                            <label>Số lượng</label>
                            <input class="form-control" name="soluong" value="{{ $data->soluong }}"/>
                        </div>
                        {{--<div class="form-group">--}}
                            {{--<label>Trạng thái sản phẩm</label>--}}
                            {{--@if($data->status == 'Còn hàng')--}}
                                {{--<label class="radio-inline">--}}
                                    {{--<input name="status" value="Còn hàng" checked="" type="radio" id="0">Còn hàng--}}
                                {{--</label>--}}
                                {{--<label class="radio-inline">--}}
                                    {{--<input name="status" value="Hết hàng" type="radio" id="1">Hết hàng--}}
                                {{--</label>--}}
                            {{--@else--}}
                                {{--<label class="radio-inline">--}}
                                    {{--<input name="status" value="Còn hàng" type="radio" id="0">Còn hàng--}}
                                {{--</label>--}}
                                {{--<label class="radio-inline">--}}
                                    {{--<input name="status" checked="" value="Hết hàng" type="radio" id="1">Hết hàng--}}
                                {{--</label>--}}
                            {{--@endif--}}
                        {{--</div>--}}
                        <div class="form-group">
                            <label>Hàng mới :</label>
                            @if($data->new == 1)
                                <input class="field" name="new" type="checkbox" checked value="1">
                            @else
                                <input class="field" name="new" type="checkbox" value="0">
                            @endif
                        </div>
                        <a id="capnhat" class="btn btn-default">Cập nhật</a>
                        <button id="reset" type="reset" class="btn btn-default">Làm lại</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $("#avatar").attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(document).ready(function () {
            $("#capnhat").click(function () {
                swal({
                    title: "Bạn muốn cập nhật sản phẩm?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then(function (willDelete) {
                    if (willDelete) {
                        $("form").submit();
                    }
                });
            });
        });
        $(document).ready(function () {
            $('#reset').click(function () {
                location.reload();
            });
        });
    </script>
@endsection