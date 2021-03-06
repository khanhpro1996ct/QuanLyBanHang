@extends('layouts.app')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Loại sản phẩm:
                        <small>Cập nhật</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="{{ route('type.update', $data->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Tên Loại sản phẩm (*)</label>
                            <input class="form-control" name="name" value="{{ $data->name }}"/>
                        </div>
                        <div class="form-group">
                            <label>Mô tả sản phẩm</label>
                            <textarea rows="4" class="form-control ckeditor"
                                      name="description">{{ $data->description }}</textarea>
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
                    title: "Bạn muốn cập nhật loại sản phẩm?",
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