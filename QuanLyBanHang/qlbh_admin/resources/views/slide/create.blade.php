@extends('layouts.app')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Slider:
                        <small>Thêm mới</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="   padding-bottom:120px">
                    <form action="{{route('slide.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Image</label>
                            <br>
                            <img id="avatar" src="{{url('upload')}}/image.png" alt="your image"/>
                            <input type='file' name="file" onchange="readURL(this)"/>
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
                    title: "Bạn muốn thêm một slider mới ?",
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