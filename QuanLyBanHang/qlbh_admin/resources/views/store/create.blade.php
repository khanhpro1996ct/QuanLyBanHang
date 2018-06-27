@extends('layouts.app')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Cửa Hàng:
                        <small>Thêm mới</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="{{ route('store.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Tên cửa hàng (*)</label>
                            <input class="form-control" name="name" placeholder="nhập tên cửa hàng" required/>
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ (*)</label>
                            <input class="form-control" name="address" placeholder="nhập địa chỉ" required/>
                        </div>
                        <div class="form-group">
                            <label>Số điện thoại (*)</label>
                            <input class="form-control" name="phone" placeholder="nhập sđt" required/>
                        </div>
                        <div class="form-group">
                            <label>Email (*)</label>
                            <input class="form-control" name="email" placeholder="nhập email" required/>
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
        $(document).ready(function () {
            $("#them").click(function () {
                swal({
                    title: "Bạn muốn thêm một cửa hàng mới?",
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
