@extends('layouts.app')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Kho :
                        <small>Cập nhật</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="{{ route('kho.update', [$data->id]) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Tên Loại sản phẩm : {{ $data->name }}</label>
                        </div>
                        <div class="form-group">
                            <label>Giá nhập kho</label>
                            <input class="form-control" name="giagoc" value="{{ $data->giagoc }}"/>
                        </div>
                        <div class="form-group">
                            <label>Giá bán</label>
                            <input class="form-control" name="unit_price" value="{{ $data->unit_price }}"/>
                        </div>
                        <div class="form-group">
                            <label>Giá khuyến mại</label>
                            <input class="form-control" name="promotion_price" value="{{ $data->promotion_price }}"/>
                        </div>
                        <div class="form-group">
                            <label>Số lượng nhập kho</label>
                            <input class="form-control" name="soluong" value="{{ $data->soluong }}"/>
                        </div>
                        <div class="form-group">
                            <label>Đơn vị tính</label>
                            <input class="form-control" name="unit" value="{{ $data->unit }}"/>
                        </div>
                        <a id="capnhat" class="btn btn-default">Cập nhật</a>
                        <button id="reset" type="reset" class="btn btn-default">Làm mới</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            $("#capnhat").click(function () {
                swal({
                    title: "Bạn muốn cập nhật lại sản phẩm?",
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