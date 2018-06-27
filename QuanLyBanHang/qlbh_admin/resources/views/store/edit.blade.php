@extends('layouts.app')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Cửa Hàng:
                        <small>Cập nhật</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="{{ route('store.update', $data->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Tên cửa hàng (*)</label>
                            <input class="form-control" name="name" value="{{ $data->name }}"/>
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ (*)</label>
                            <input class="form-control" name="address" value="{{ $data->address }}"/>
                        </div>
                        <div class="form-group">
                            <label>Số điện thoại (*)</label>
                            <input class="form-control" name="phone" value="{{ $data->phone }}"/>
                        </div>
                        <div class="form-group">
                            <label>Email (*)</label>
                            <input class="form-control" name="email" value="{{ $data->email }}"/>
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
                    title: "Bạn muốn cập nhật cửa hàng?",
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