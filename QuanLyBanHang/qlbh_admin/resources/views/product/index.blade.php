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
                    <h1 class="page-header">Sản phẩm:
                        <small>Danh sách</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead class="odd gradeX" align="center">
                    <tr class="odd gradeX" align="center">
                        <th>STT</th>
                        <th>Loại Hạt Giống</th>
                        <th>Tên Hạt Giống</th>
                        <th>Hình Ảnh</th>
                        <th>Chi Tiết</th>
                        <th>Chỉnh Sửa</th>
                        <th>Xóa</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($data as $key => $value): ?>
                    <tr class="odd gradeX" align="center">
                        <td>{{ $value->stt }}</td>
                        <td>{{ $value->id_type }}</td>
                        <td>{{ $value->name }}</td>
                        @if (empty($value->image))
                            <td><img src="{{url('upload')}}/khanh.png" width="50px" height="50px"></td>
                        @else
                            <td><img src="{{$value->image}}" width="50px" height="50px"></td>
                        @endif
                        <td class="center"><i class="fa fa-pencil fa-fw"></i>
                            <a id="{{ $value->id }}" onclick="show(this)">show</a>
                        </td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i>
                            <a emDiem="{{ $value->name }}"
                               zero9="{{ route('product.edit', [$value->id]) }}" onclick="sua(this)">edit</a>
                        </td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i>
                            <a emDiem="{{ $value->name }}"
                               zero9="{{ route('product.destroy',[$value->id]) }}" onclick="xoa(this)">delete</a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div id="mdl-show" class="modal fade" role="dialog" style="">
        <div class="modal-dialog" style="margin-left: 5%;margin-right: 5%;width: auto;">
            <div class="modal-content" style="min-width: 1024px">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <div style="display: inline-block">
                        <h4 style="float: left" id="txt-title" class="modal-title">Thông tin chi tiết :</h4>
                        <a style="float: left" id="name1"></a>
                    </div>
                </div>
                <div class="modal-body" style="padding-left: 30px; padding-right: 30px">
                    <div class="row" style="width: 100%; display: -webkit-box;margin-left: 0px">
                        <div style="width: 80%">
                            <div class="row" style="margin-bottom: 3%; width: 100%;display: -webkit-box">
                                <div style="width: 180px">Tên sản phẩm :</div>
                                <div style="width: 85%" id="name2"></div>
                            </div>
                            <div class="row" style="margin-bottom: 3%;width: 100%;display: -webkit-box">
                                <div style="width: 180px">Loại sản phẩm :</div>
                                <div style="width: 85%" id="id_type"></div>
                            </div>
                            <div class="row" style="width: 100%;display: -webkit-box">
                                <div style="width: 180px">Mô tả sản phẩm :</div>
                                <div style="width: 85%" id="description"></div>
                            </div>
                        </div>
                        <div style="width: 20%">
                            <img id="image" src="" width="180px" height="180px" alt="">
                        </div>
                    </div>
                    <div class="row" style="width: 100%; display: -webkit-box">
                        <div style="width: 180px">Mô tả chi tiết sản phẩm :</div>
                        <div style="width: 85%" id="description_detail"></div>
                    </div>
                    <div class="row" style="width: 100%; display: -webkit-box">
                        <div style="width: 180px">Giá nhập kho :</div>
                        <div style="width: 85%" id="giagoc"></div>
                    </div>
                    <div class="row" style="width: 100%; display: -webkit-box">
                        <div style="width: 180px">Giá bán :</div>
                        <div style="width: 85%" id="unit_price"></div>
                    </div>
                    <div class="row" style="display: -webkit-box">
                        <div style="width: 180px">Giá khuyến mại :</div>
                        <div style="width: 85%" id="promotion_price"></div>
                    </div>
                    <div class="row" style="display: -webkit-box">
                        <div style="width: 180px">Số Lượng :</div>
                        <div style="width: 85%" id="soluong"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        let json = @json($data);
        console.table(json);
        let data = [];
        json.forEach(function (element) {
            data[element.id] = element;
        });

        function sua(e) {
            let url = e.getAttribute('zero9');
            let emDiem = e.getAttribute('emDiem');
            swal({
                title: "Cập nhật sản phẩm tên:",
                text: `${emDiem}`,
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then(function (willDelete) {
                if (willDelete) {
                    window.location.href = url;
                }
            });
        }

        function xoa(e) {
            let url = e.getAttribute('zero9');
            let emDiem = e.getAttribute('emDiem');
            swal({
                title: "Bạn chắc chắn muốn xóa sản phẩm tên:",
                text: `${emDiem}`,
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then(function (willDelete) {
                if (willDelete) {
                    window.location.href = url;
                }
            });
        }

        function show(e) {
            $("#mdl-show").modal();
            $("#name1").html(data[e.id].name);
            $("#name2").html(data[e.id].name);
            $("#id_type").html(data[e.id].id_type);
            $("#description").html(data[e.id].description);
            $("#description_detail").html(data[e.id].description_detail);
            $("#image").attr('src', data[e.id].image);
            $("#giagoc").html(data[e.id].giagoc.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + ' $');
            $("#unit_price").html(data[e.id].unit_price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + ' $');
            $("#promotion_price").html(data[e.id].promotion_price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + ' $');
            $("#soluong").html(data[e.id].soluong);
        }

        $(document).ready(function () {
            $('#example').DataTable();
            $('#dataTables-example').DataTable();
        });
    </script>
@endsection