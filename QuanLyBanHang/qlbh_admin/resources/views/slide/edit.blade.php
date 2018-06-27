@extends('layouts.app')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Slider:
                        <small>Cập nhật</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="{{ route('slide.update',$data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Image</label>
                            <br>
                            @if($data->image == null)
                                <img id="avatar" src="{{url('upload')}}/image.png" width="200px" height="200px"
                                     alt="your image"/>
                            @else
                                <img id="avatar" src="{{$data->image}}" width="200px" height="200px" alt="your image"/>
                            @endif
                            <input type='file' name="file" onchange="readURL(this)"/>
                        </div>
                        <a id="capnhat" class="btn btn-default">Cập nhật</a>
                        <button id="reset" type="reset" class="btn btn-default">Làm lại</button>
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
            $("#capnhat").click(function () {
                swal({
                    title: "Bạn muốn cập nhật slider?",
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