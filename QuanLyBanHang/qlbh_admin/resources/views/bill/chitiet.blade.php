@extends('layouts.app')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div style="margin-left: -35px;margin-top: 10px">
                    @if($data[0]->status == 0)
                        <div style="width: 80px;height: 80px;border: 1px solid red;border-radius: 72px;background-color: red;">
                            <p style="margin-top: 36%;margin-left: 1px;color: white">Chưa duyệt</p>
                        </div>
                    @else
                        <div style="width: 80px;height: 80px;border: 1px solid #33ff00;border-radius: 72px;background-color: #33ff00">
                            <p style="margin-top: 40%;margin-left: 15%; color: white">Đã duyệt</p>
                        </div>
                    @endif
                    </div>
                    <h1 class="page-header" style="text-align: center; border: none">ĐƠN ĐẶT HÀNG</h1>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="col-lg-6">
                    <h4>Khách Hàng : {{$khach->name}}</h4>
                </div>
                <div class="col-lg-6">
                    <h4>Số Điện Thoại : {{$khach->phone_number}}</h4>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="col-lg-6">
                    <h4>Giới Tính : {{$khach->gender}}</h4>
                </div>
                <div class="col-lg-6">
                    <h4>Email : {{$khach->email}}</h4>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="col-lg-6">
                    <h4>Địa Chỉ : {{$khach->address}}</h4>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="col-lg-6">
                    <h4>Ghi Chú : {{$khach->note}}</h4>
                </div>
            </div>
            <div class="col-lg-12">
                <br>
                <hr>
            </div>
            <div class="col-lg-12">
            </div>
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead class="odd gradeX" align="center">
                <tr class="odd gradeX" align="center">
                    <th>STT</th>
                    <th>Tên Sản Phẩm</th>
                    <th>Đơn Vị</th>
                    <th>Số Lượng</th>
                    <th>Giá</th>
                    <th>Thành Tiền</th>
                </tr>
                </thead>
                <tbody>
                {{--{{dd($data)}}--}}
                <?php $sum = 0; ?>
                <?php foreach ($data as $key => $value): ?>
                <tr class="odd gradeX" align="center">
                    <td>{{ $value->stt }}</td>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->unit }}</td>
                    <td>
                        {{ $value->quantity }}
                        <?php $sum = $sum + $value->quantity;?>
                    </td>
                    <td>
                        @if($value->promotion_price == 0)
                            {{number_format($value->unit_price)}} $
                        @else
                            {{number_format($value->promotion_price)}} $
                        @endif
                    </td>
                    <td>
                        @if($value->promotion_price == 0)
                            {{number_format($value->unit_price * $value->quantity)}} $
                        @else
                            {{number_format($value->promotion_price * $value->quantity)}} $
                        @endif
                    </td>
                </tr>
                <?php endforeach ?>
                </tbody>
            </table>
            <div class="col-lg-12">
                <div class="col-lg-10" style="text-align: right">Tổng SL:
                </div>
                <div class="col-lg-2">
                    {{($sum)}}
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="col-lg-10" style="text-align: right">Tổng Tiền:
            </div>
            <div class="col-lg-2">
                {{number_format($value->total)}} $
            </div>
        </div>
        <div class="col-lg-12">
            <br>
        </div>
        <div class="col-lg-12">
            <div class="col-lg-6" style="text-align: right"></div>
            <div class="col-lg-6" style="text-align: center">
                Cần thơ ngày : {{$value->date_order}}
            </div>
        </div>
    </div>
    </div>
@endsection