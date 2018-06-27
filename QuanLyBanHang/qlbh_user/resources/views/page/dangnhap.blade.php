@extends('IndexMain')
@section('content')
    <div class="inner-header">
        <div class="container">
            @if(Session::has('flag'))
                <div class="alert alert-{{Session::get('flag')}}">{{Session::get('message')}}</div>
            @endif
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="container">
        <div id="content">
            <form action="{{route('login')}}" method="post" class="beta-form-checkout">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-6">
                        <h4>Đăng nhập</h4>
                        <div class="space20">&nbsp;</div>
                        <div class="form-block">
                            <label for="email">Địa Chỉ Email (*):</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div class="form-block">
                            <label for="phone">Mật Khẩu (*):</label>
                            <input style="height: 37px" type="password" id="password" name="password" required>
                        </div>
                        <div style="padding-left: 200px" class="form-block">
                            <button type="submit" class="btn btn-primary">Đăng Nhập</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection