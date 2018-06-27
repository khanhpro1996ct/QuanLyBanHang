@extends('IndexMain')
@section('content')
    <div class="inner-header">
        <div class="container">
            <div class="pull-left">
                <h6 class="inner-title">{{$loai_sp->name}}</h6>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="container">
        <div id="content" class="space-top-none">
            <div class="main-content">
                <div class="row">
                    <div class="col-sm-3">
                        <ul class="aside-menu">
                            @foreach($loai as $l)
                                <li><a href="{{route('loaisanpham',$l->id)}}">{{$l->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-sm-9">
                        <div class="beta-products-list">
                            <h4>Sản phẩm mới</h4>
                            <div class="beta-products-details">
                                <p class="pull-left">Tìm thấy {{count($sp_theoloai)}} sản phẩm</p>
                                <div class="clearfix"></div>
                            </div>
                            <div class="row">
                                @foreach($sp_theoloai as $sp)
                                    <div class="col-sm-4" style="margin-bottom: 10px">
                                        <div class="single-item">
                                            @if($sp->promotion_price!=0)
                                                <div class="ribbon-wrapper">
                                                    <div class="ribbon sale">Sale</div>
                                                </div>
                                            @endif
                                            <div class="single-item-header">
                                                <a href="{{route('chitietsanpham',$sp->id)}}">
                                                    <img src="{{$sp->image}}" height="250px" width="250px">
                                                </a>
                                            </div>
                                            <div class="single-item-body">
                                                <p class="single-item-title">{{$sp->name}}</p>
                                                <p class="single-item-price">
                                                    @if($sp->promotion_price==0)
                                                        <span class="flash-sale">{{number_format($sp->unit_price)}}
                                                            $</span>
                                                    @else
                                                        <span class="flash-del">{{number_format($sp->unit_price)}}
                                                            $</span>
                                                        <span class="flash-sale">{{number_format($sp->promotion_price)}}
                                                            $</span>
                                                    @endif
                                                </p>
                                            </div>
                                            <div class="single-item-caption">
                                                <a class="add-to-cart pull-left"
                                                   href="{{route('themgiohang',$sp->id)}}"><i
                                                            class="fa fa-shopping-cart"></i></a>
                                                <a class="beta-btn primary"
                                                   href="{{route('chitietsanpham',$sp->id)}}">Xem chi tiết
                                                    <i class="fa fa-chevron-right"></i></a>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="row">{{$sp_theoloai->links()}}</div>
                        </div>
                    </div>
                </div>
                <div class="space50">&nbsp;</div>
                        <div class="beta-products-list">
                            <h4>Sản phẩm khác</h4>
                            <div class="beta-products-details">
                                <p class="pull-left">Tìm thấy {{count($sp_khac)}} sản phẩm</p>
                                <div class="clearfix"></div>
                            </div>
                            <div class="row">
                                @foreach($sp_khac as $sp_k)
                                    <div class="col-sm-3" style="margin-bottom: 10px">
                                        <div class="single-item">
                                            @if($sp_k->promotion_price!=0)
                                                <div class="ribbon-wrapper">
                                                    <div class="ribbon sale">Sale</div>
                                                </div>
                                            @endif
                                            <div class="single-item-header">
                                                <a href="{{route('chitietsanpham',$sp->id)}}">
                                                    <img src="{{$sp_k->image}}" alt="" height="250px" width="250px"></a>
                                            </div>
                                            <div class="single-item-body">
                                                <p class="single-item-title">{{$sp_k->name}}</p>
                                                <p class="single-item-price">
                                                    @if($sp_k->promotion_price==0)
                                                        <span class="flash-sale">{{number_format($sp_k->unit_price)}}
                                                            $</span>
                                                    @else
                                                        <span class="flash-del">{{number_format($sp_k->unit_price)}}
                                                            $</span>
                                                        <span class="flash-sale">{{number_format($sp_k->promotion_price)}}
                                                            $</span>
                                                    @endif
                                                </p>
                                            </div>
                                            <div class="single-item-caption">
                                                <a class="add-to-cart pull-left"
                                                   href="{{route('themgiohang',$sp_k->id)}}"><i
                                                            class="fa fa-shopping-cart"></i></a>
                                                <a class="beta-btn primary"
                                                   href="{{route('chitietsanpham',$sp_k->id)}}">Xem chi tiết
                                                    <i class="fa fa-chevron-right"></i></a>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="row">{{$sp_khac->links()}}</div>
                            <div class="space40">&nbsp;</div>
                        </div>
            </div>
        </div>
    </div>
@endsection