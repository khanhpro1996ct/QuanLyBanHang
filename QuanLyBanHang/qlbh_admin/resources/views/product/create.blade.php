@extends('layouts.app')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sản Phẩm:
                        <small>Thêm mới</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-12" style="padding-bottom:120px">
                    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Tên sản phẩm (*)</label>
                            <input class="form-control" name="name" placeholder="nhập tên sản phẩm" required/>
                        </div>
                        <div class="form-group">
                            <label>Tên loại sản phẩm (*)</label>
                            <select class="form-control" name="id_type">
                                <option value="">---</option>
                                @foreach ($loaisanpham as $key => $value)
                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Mô tả sản phẩm (*)</label>
                            <textarea rows="3" class="form-control ckeditor" name="description" placeholder="mô tả sản phẩm"
                                      required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Mô tả chi tiết sản phẩm</label>
                            <textarea rows="6" class="form-control ckeditor" name="description_detail" placeholder="mô tả chi tiết sản phẩm"
                                      required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Ảnh minh họa</label>
                            <br>
                            <img width="180px" height="180px" id="avatar" src="{{url('upload')}}/image.png" alt="your image"/>
                            <input type='file' name="file" onchange="readURL(this)"/>
                        </div>
                        <div class="form-group">
                            <label>Giá nhập kho (*)</label>
                            <input class="form-control" name="giagoc" placeholder="giá nhập kho của sản phẩm" required/>
                        </div>
                        <div class="form-group">
                            <label>Giá bán (*)</label>
                            <input class="form-control" name="unit_price" placeholder="giá bán của sản phẩm" required/>
                        </div>
                        <div class="form-group">
                            <label>Giá gốc khuyễn mại</label>
                            <input class="form-control" name="promotion_price"
                                   placeholder="giá khuyến mại sản phẩm" required/>
                        </div>
                        <div class="form-group">
                            <label>Đơn vị</label>
                            <input class="form-control" name="unit" placeholder="kg,bao,..." required/>
                        </div>
                        <div class="form-group">
                            <label>Số lượng</label>
                            <input class="form-control" name="soluong" required/>
                        </div>
                        <div class="form-group">
                            <label>Hàng mới :</label>
                            <input class="field" name="new" type="checkbox" value="1">
                        </div>
                        <a id="them" class="btn btn-default">Thêm mới</a>
                        <button id="reset" type="reset" class="btn btn-default">Làm mới</button>
                    </form>
                </div>
            </div>
        </div>
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
            $("#them").click(function () {
                swal({
                    title: "Bạn muốn thêm sản phẩm?",
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