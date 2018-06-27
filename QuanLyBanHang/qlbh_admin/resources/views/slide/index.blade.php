@extends('layouts.app')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        {{ session()->get('message') }}
                    </div>
                @endif
                <div class="col-lg-12">
                    <h1 class="page-header">Slider:
                        <small>Danh sách</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead class="odd gradeX" align="center">
                    <tr class="odd gradeX" align="center">
                        <th>STT</th>
                        <th>Ảnh</th>
                        <th>Chỉnh sửa</th>
                        <th>Xóa</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($data as $key => $value): ?>
                    <tr class="odd gradeX" align="center">
                        <td>{{ $value->stt }}</td>
                        @if (empty($value->image))
                            <td><img src="{{url('upload')}}/khanh.png" width="200px" height="200px"></td>
                        @else
                            <td><img src="{{$value->image}}" width="200px" height="200px"></td>
                        @endif
                        <td class="center"><i class="fa fa-pencil fa-fw"></i>
                            <a class="sua" zero9="{{ route('slide.edit', [$value->id]) }}">edit</a>
                        </td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i>
                            <a class="xoa" zero9="{{ route('slide.destroy',[$value->id]) }}">delete</a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            $(".sua").click(function () {
                let url = $(this).attr('zero9');
                swal({
                    title: "Cập nhật slider",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then(function (willDelete) {
                    if (willDelete) {
                        window.location.href = url;
                    }
                });
            });
            $(".xoa").click(function () {
                let url = $(this).attr('zero9');
                swal({
                    title: "Bạn chắc chắn muốn xóa slider",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then(function (willDelete) {
                    if (willDelete) {
                        window.location.href = url;
                    }
                });
            });
        });
        $(document).ready(function () {
            $('#dataTables-example').DataTable({
                responsive: true
            });
        });
    </script>
@endsection