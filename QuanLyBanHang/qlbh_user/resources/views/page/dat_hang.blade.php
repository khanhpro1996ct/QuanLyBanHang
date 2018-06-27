@extends('IndexMain')
@section('content')
    <div class="container">
        <div id="content">
            <form action="{{route('dathang')}}" method="post" class="beta-form-checkout">
                @csrf
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        {{ session()->get('message') }}
                    </div>
                @endif
                <div class="row">
                    <div class="col-sm-6">
                        <h4>Đặt Hàng</h4>
                        <div class="space20">&nbsp;</div>
                        <div class="form-block">
                            <label for="name">Họ & Tên Khách Hàng (*) :</label>
                            <input type="text" name="name" placeholder="Họ & tên" required>
                        </div>
                        <div class="form-block">
                            <label>Giới Tính (*) :</label>
                            <input type="radio" class="input-radio" name="gender" value="nam" checked="checked"
                                   style="width: 10%">
                            <span style="margin-right: 10%">Nam</span>
                            <input type="radio" class="input-radio" name="gender" value="nữ"
                                   style="width: 10%">
                            <span>Nữ</span>
                        </div>
                        <div class="form-block">
                            <label for="email">Email (*) :</label>
                            <input type="email" id="email" name="email" required placeholder="expample@gmail.com">
                        </div>
                        <div class="form-block">
                            <label for="adress">Địa Chỉ (*) :</label>
                            <input type="text" id="address" name="address" placeholder="30/04,Ninh Kiều,Cần Thơ"
                                   required>
                        </div>
                        <div class="form-block">
                            <label for="phone">Điện Thoại (*) :</label>
                            <input type="text" id="phone" name="phone" required>
                        </div>
                        <div class="form-block">
                            <label for="notes">Ghi Chú :</label>
                            <textarea id="notes" name="notes"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="your-order">
                            <div class="your-order-head"><h5>Đơn Hàng Của Bạn</h5></div>
                            <div class="your-order-body" style="padding: 0px 10px">
                                <div class="your-order-item">
                                    <div>
                                        @if(Session::has('cart'))
                                            @foreach($product_cart as $cart)
                                                <div class="media">
                                                    <img width="15%" src="{{$cart['item']['image']}}" alt=""
                                                         class="pull-left">
                                                    <div class="media-body">
                                                        <span style="float: right">
                                                            <a class="card-item-delete"
                                                               href="{{route('xoagiohang',$cart['item']['id'])}}">
                                                                <i class="fa fa-times"></i></a>
                                                        </span>
                                                        <span class="color-gray your-order-info">Đơn Giá:
                                                            {{number_format($cart['price'])}} vnđ
                                                        </span>
                                                        <span class="color-gray your-order-info">Số Lượng:
                                                            {{$cart['qty']}}
                                                        </span>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                </div>
                                <div class="your-order-item">
                                    <div class="pull-left">
                                        <p class="your-order-f18">Tổng Tiền:</p>
                                    </div>
                                    <div class="pull-right">
                                        <h5 class="color-black">
                                            @if(Session::has('cart'))
                                                {{number_format($totalPrice)}}
                                            @else
                                                0
                                            @endif vnđ
                                        </h5>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="your-order-head"><h5>Hình Thức Thanh Toán</h5></div>
                            <div class="your-order-body">
                                <ul class="payment_methods methods">
                                    <li class="payment_method_bacs">
                                        <input id="payment_method_bacs" type="radio" class="input-radio"
                                               name="payment_method" value="COD" checked="checked"
                                               data-order_button_text="">
                                        <label for="payment_method_bacs">Thanh toán khi nhận hàng</label>
                                        <div class="payment_box payment_method_bacs" style="display: block;">
                                            Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền
                                            cho nhân viên giao hàng.
                                        </div>
                                    </li>
                                    <li class="payment_method_cheque">
                                        <input id="payment_method_cheque" type="radio" class="input-radio"
                                               name="payment_method" value="ATM" data-order_button_text="">
                                        <label for="payment_method_cheque">Chuyển khoản </label>
                                        <div class="payment_box payment_method_cheque" style="display: none;">
                                            Chuyển tiền đến tài khoản sau:
                                            <br>- Số tài khoản: 97043668 13888555 010
                                            <br>- Chủ Tài Khoản: Nguyễn Quốc Khánh
                                            <br>- Ngân hàng Vietcombank, Chi nhánh Cần Thơ.
                                        </div>
                                    </li>

                                </ul>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="beta-btn primary" href="#">Đặt hàng <i
                                            class="fa fa-chevron-right"></i></button>
                            </div>
                        </div> <!-- .your-order -->
                    </div>
                </div>
            </form>
        </div> <!-- #content -->
    </div> <!-- .container -->
@endsection
