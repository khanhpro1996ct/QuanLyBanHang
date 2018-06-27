<!-- Page Content -->
@extends('layouts.app')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Số Lượng Tồn Kho</h1>
                </div>
                <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead class="odd gradeX" align="center">
                    <tr class="odd gradeX" align="center">
                        <th>STT</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Giá Nhập Kho</th>
                        <th>Giá Bán</th>
                        <th>Giá KM</th>
                        <th>Số Lượng NK</th>
                        <th>Giá Tồn Kho</th>
                        <th>Thay Đổi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($data as $key => $value): ?>
                    <tr class="odd gradeX" align="center">
                        <td>{{ $value->stt }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ number_format($value->giagoc) }} .vnđ</td>
                        <td>{{ number_format($value->unit_price) }} .vnđ</td>
                        <td>{{ number_format($value->promotion_price) }} .vnđ</td>
                        <td>{{ $value->soluong}} {{ $value->unit}}</td>
                        <td>{{ number_format($value->soluong * $value->giagoc)}} .vnđ</td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i>
                            <a class="sua" emDiem="{{ $value->name }}" zero9="{{ route('kho.edit', [$value->id]) }}">edit</a>
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
            $('#dataTables-example').DataTable({
                responsive: true
            });
            $(".sua").click(function () {
                let url = $(this).attr('zero9');
                let emDiem = $(this).attr('emDiem');
                swal({
                    title: "Cập nhật loại tên:",
                    text: `${emDiem}`,
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
    </script>
@endsection