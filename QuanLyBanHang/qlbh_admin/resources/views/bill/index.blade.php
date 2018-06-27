@extends('layouts.app')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Đơn Hàng:
                        <small>Danh sách</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead class="odd gradeX" align="center">
                    <tr class="odd gradeX" align="center">
                        <th>STT</th>
                        <th>Tên Khách Hàng</th>
                        <th>SĐT</th>
                        <th>Địa Chỉ</th>
                        <th>Tổng Tiền ĐH</th>
                        <th>Xem</th>
                        <th>Duyệt</th>
                        <th>Hủy</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{--{{dd($data)}}--}}
                    <?php foreach ($data as $key => $value): ?>
                    <tr class="odd gradeX" align="center">
                        <td>{{ $value->stt }}</td>
                        <td>{{ $value->name_customer }}</td>
                        <td>{{ $value->phone_customer }}</td>
                        <td>{{ $value->address_customer }}</td>
                        <td>{{number_format($value->total_bills)}} $</td>
                        <td class="center">
                            <a href="{{route('donhang.show',[$value->id_customer])}}">Xem</a>
                        </td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i>
                            <a href="{{route('donhang.duyetdh',[$value->id_customer])}}">duyệt</a>
                        </td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i>
                            <a href="{{route('donhang.delete',[$value->id_customer])}}">hủy</a>
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
        });
    </script>
@endsection