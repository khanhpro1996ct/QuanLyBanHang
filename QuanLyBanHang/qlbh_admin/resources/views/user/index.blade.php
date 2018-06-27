<!-- Page Content -->
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
                    <h1 class="page-header">Người dùng:
                        <small>Danh sách</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead class="odd gradeX" align="center">
                    <tr class="odd gradeX" align="center">
                        <th>STT</th>
                        <th>Họ & Tên</th>
                        <th>Email</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Chỉnh sửa</th>
                        <th>Xóa</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($data as $key => $value): ?>
                    <tr class="odd gradeX" align="center">
                        <td>{{ $value->stt }}</td>
                        <td>{{ $value->full_name }}</td>
                        <td>{{ $value->email}}</td>
                        <td>{{$value->address}}</td>
                        <td>{{$value->phone}}</td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i>
                            <a class="sua" sua2="{{ $value->name }}"
                               sua1="{{ route('user.edit', [$value->id]) }}">edit</a>
                        </td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i>
                            <a class="xoa" xoa2="{{ $value->name }}" xoa1="{{ route('user.destroy',[$value->id]) }}">delete</a>
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
                let url = $(this).attr('sua1');
                let sua2 = $(this).attr('sua2');
                swal({
                    title: "Cập nhật người dùng tên:",
                    text: `${sua2}`,
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
                let url = $(this).attr('xoa1');
                let xoa2 = $(this).attr('xoa2');
                swal({
                    title: "Bạn chắc chắn muốn xóa người dùng tên:",
                    text: `${xoa2}`,
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