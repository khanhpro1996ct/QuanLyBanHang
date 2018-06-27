@extends('IndexMain')
@section('content')
    <div class="inner-header">
        <div class="container">
            <div class="pull-left">
                <h6 class="inner-title">Sản phẩm : {{$sanpham->name}}</h6>
            </div>
        </div>
    </div>
    <div class="container">
        <div id="content" style="padding: 0px">
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-4">
                            <img src="{{$sanpham->image}}" alt="">
                        </div>
                        <div class="col-sm-8">
                            <div class="single-item-body">
                                <p class="single-item-title">
                                <p style="color : #4e35c9;font-weight: 580; font-size: 20px">Tên sản phẩm :</p>
                                <h3 style="margin-top: 10px;margin-bottom: 10px;">{{$sanpham->name}}</h3></p>
                                <p class="single-item-price">
                                    @if($sanpham->promotion_price==0) 
                                        <p style="color : #f50219;font-weight: 580; font-size: 16px;margin-bottom: 10px">Giá bán :</p>
                                        <span class="flash-sale" style="font-size: 20px;">{{number_format($sanpham->unit_price)}} $</span>
                                    @else
                                        <p style="color : #f50219;font-weight: 580; font-size: 16px;margin-bottom: 10px;">Giá bán :</p>
                                        <span class="flash-del" style="font-size: 20px;">{{number_format($sanpham->unit_price)}} $</span>
                                        <p style="color : #f50219;font-weight: 580; font-size: 16px;margin-bottom: 10px;margin-top: 10px">Giá khuyến mãi :</p>
                                        <span class="flash-sale" style="font-size: 20px;">{{number_format($sanpham->promotion_price)}} $</span>
                                    @endif
                                </p>
                            </div>
                            <div class="clearfix"></div>
                            <div class="single-item-caption" style="margin-top: 10px; margin-bottom: 10px">
                                    <a class="add-to-cart pull-left" style="width: max-content;background-color: white;border: 1px solid #57a7c6;" 
                                        href="{{route('themgiohang',$sanpham->id)}}">
                                            <div style="margin-top: -2px;margin-left: 5px;">Thêm vào giỏ hàng
                                                <i class="fa fa-shopping-cart" style="color: #3a5c83;"></i>
                                            </div>
                                    </a>
                                    <a class="beta-btn primary" href="{{route('dathang')}}">Giỏ hàng của bạn
                                            <i class="fa fa-chevron-right"></i>
                                    </a>
                                    <div class="clearfix"></div>
                            </div>
                            <div class="single-item-desc">
                                <p style="color: #4e35c9;font-weight: 580;font-size: 16px;margin-bottom: 10px;margin-top: 15px;">MÔ TẢ SẢN PHẨM :</p>
                                <p>{!! $sanpham->description !!}</p>
                            </div>
                        </div>
                    </div>
                    <div class="space40">&nbsp;</div>
                    <div class="woocommerce-tabs">
                        <ul class="tabs">
                            <li><a href="#tab-description"><b style="font-size: 20px">Mô tả chi tiết</b></a></li>
                        </ul>
                        <div class="panel" id="tab-description">
                            <p>{!! $sanpham->description_detail !!}</p>
                        </div>
                    </div>
                    <div class="space20">&nbsp;</div>
                </div>
                <div class="col-sm-12">
                <div class="beta-products-list">
                        <h6>Sản Phẩm Cùng Loại:</h6>
                        <br>
                        <div class="row">
                            @foreach($sanpham_tuongtu as $sptt)
                                <div class="col-sm-3" style="margin-bottom: 10px">
                                    <div class="single-item">
                                        @if($sptt->promotion_price!=0)
                                            <div class="ribbon-wrapper">
                                                <div class="ribbon sale">Sale</div>
                                            </div>
                                        @endif
                                        <div class="single-item-header">
                                            <a href="{{route('chitietsanpham',$sptt->id)}}">
                                                <img src="{{$sptt->image}}" alt="" height="250px" width="250px">
                                            </a>
                                        </div>
                                        <div class="single-item-body">
                                            <p class="single-item-title">{{$sptt->name}}</p>
                                            <p class="single-item-price">
                                                @if($sptt->promotion_price==0)
                                                    <span class="flash-sale">{{number_format($sptt->unit_price)}} $</span>
                                                @else
                                                    <span class="flash-del">{{number_format($sptt->unit_price)}} $</span>
                                                    <span class="flash-sale">{{number_format($sptt->promotion_price)}} $</span>
                                                @endif
                                            </p>
                                        </div>
                                        <div class="single-item-caption">
                                            <a class="add-to-cart pull-left" href="{{route('themgiohang',$sptt->id)}}">
                                                <i class="fa fa-shopping-cart"></i>
                                            </a>
                                            <a class="beta-btn primary" href="{{route('chitietsanpham',$sptt->id)}}">Xem chi tiết
                                                <i class="fa fa-chevron-right"></i>
                                            </a>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="row">{{$sanpham_tuongtu->links()}}</div>
                    </div> <!-- .beta-products-list -->
                </div>
                <div class="col-sm-3 aside">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection