<div id="header">
    <div class="header-body">
        <div class="container beta-relative">
            <div class="pull-left">
                <a href="{{route('trangchu')}}" id="logo">
                    <img style="margin-bottom: 0px"
                         src="{{url('sourceMain/assets/dest/images/icon.jpg')}}" width="200px">
                </a>
            </div>
            <div class="pull-right beta-components space-left ov">
                <div class="space10">&nbsp;</div>
                <div class="beta-comp">
                    <form role="search" method="get" id="searchform" action="{{route('search')}}">
                        <input type="text" value="" name="keySearch" id="key" placeholder="Nhập từ khóa..."/>
                        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
                    </form>
                </div>
                <div class="beta-comp">
                    <div class="cart">
                        <div class="beta-select">
                            <i class="fa fa-shopping-cart"></i> Giỏ hàng :
                            @if(Session::has('cart')){{Session('cart')->totalQty}}
                            @else Trống
                            @endif
                            <i class="fa fa-chevron-down"></i>
                        </div>
                        <div class="beta-dropdown cart-body">
                            @if(Session::has('cart'))
                                @foreach($product_cart as $product)
                                    <div class="cart-item">
                                        <div class="media">
                                            <span style="float: right">
                                                    <a class="card-item-delete"
                                                       href="{{route('xoagiohang',$product['item']['id'])}}">
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                </span>
                                            <a class="pull-left">
                                                <img src="{{$product['item']['image']}}">
                                            </a>
                                            <div style="line-height: 16px" class="media-body">
                                                <span style="margin: 0px"
                                                      class="cart-item-title">{{$product['item']['name']}}</span>
                                                <span style="margin: 0px"
                                                      class="cart-item-amount">Số lượng : {{$product['qty']}}<br>
                                                    <span>
                                                        <span style="color: black">Giá :</span>
                                                        @if($product['item']['promotion_price']==0)
                                                            {{number_format($product['item']['unit_price'])}}
                                                        @else
                                                            {{number_format($product['item']['promotion_price'])}}
                                                        @endif vnđ
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="cart-caption">
                                    <div class="cart-total text-right">Tổng tiền:
                                        <span class="cart-total-value">
                                            @if(Session::has('cart'))
                                                {{number_format($totalPrice)}}
                                            @else 0
                                            @endif vnđ
                                        </span>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="center">
                                        <div class="space10">&nbsp</div>
                                        <a href="{{route('dathang')}}" class="beta-btn primary text-center">Đặt hàng
                                            <i class="fa fa-chevron-right"></i>
                                        </a>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-top">
        <div class="container">
            <div class="pull-left auto-width-left">
                <ul class="top-menu menu-beta l-inline">
                    <li>
                        <a>
                            <i class="fa fa-home"></i>
                            Niên Luận Ngành Kỹ Thuật Phần Mềm
                        </a>
                    </li>
                    <li>
                        <a>
                            <i class="fa fa-phone"></i>
                            0972 705 703
                        </a>
                    </li>
                </ul>
            </div>
            <div class="pull-right auto-width-right">
                <ul class="top-details menu-beta l-inline">
                    @if(Auth::check())
                        <li><a href="">Chào bạn {{Auth::user()->full_name}}</a></li>
                        <li><a href="{{route('logout')}}">Đăng xuất</a></li>
                    @else
                        <li><a href="{{route('signin')}}">Đăng kí</a></li>
                        <li><a href="{{route('login')}}">Đăng nhập</a></li>
                    @endif
                    <li><a href="http://localhost/QuanLyBanHang/qlbh_admin/public/admin">Đăng nhập qtv</a></li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="header-bottom" style="background-color: #0b9239;">
        <div class="container">
            <nav class="main-menu">
                <ul class="l-inline ov">
                    <li><a href="{{url('index')}}">
                            <i style="color: #8fc801;font-size: 20px;" class="fa fa-home"></i>Trang Chủ
                        </a>
                    </li>
                    <li>
                        <a><i style="color: #8fc801;font-size: 20px;" class="fa fa-pagelines"></i>Loại Sản Phẩm</a>
                        <ul class="sub-menu">
                            @foreach($loai_sp as $loai)
                                <li><a href="{{route('loaisanpham',$loai->id)}}">{{$loai->name}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="{{url('gioithieu')}}">
                            <i style="color: #8fc801;font-size: 20px;" class="fa fa-building"></i>Giới Thiệu
                        </a>
                    </li>
                    <li><a href="{{url('lienhe')}}">
                            <i style="color: #8fc801;font-size: 20px;" class="fa fa-phone"></i>Liên Hệ
                        </a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </nav>
        </div>
    </div>
</div>