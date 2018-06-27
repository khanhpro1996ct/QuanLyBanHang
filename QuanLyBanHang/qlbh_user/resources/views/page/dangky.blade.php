@extends('IndexMain')
@section('content')
    <div class="inner-header">
        <div class="container">
            @if(count($errors)>0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $err){{$err}}
                    @endforeach
                </div>
            @endif
            @if(session()->has('message'))
                    <div class="alert alert-success">
                        <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        {{ session()->get('message') }}
                    </div>
            @endif
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="container">
        <div id="content">
            <form action="{{route('signin')}}" method="post" class="beta-form-checkout">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-6">
                        <h4>Đăng kí</h4>
                        <div class="space20">&nbsp;</div>
                        <div class="form-block">
                            <label for="email">Email (*) :</label>
                            <input type="email" id="email" name="email" placeholder="example@gmail.com" required>
                        </div>
                        <div class="form-block">
                            <label for="your_last_name">Họ và tên (*) :</label>
                            <input type="text" id="your_last_name" name="fullname" placeholder="Nguyễn Văn A" required>
                        </div>
                        <div class="form-block">
                            <label for="adress">Địa chỉ (*) :</label>
                            <input type="text" id="address" name="address" placeholder="30/4-cần thơ" required>
                        </div>
                        <div class="form-block">
                            <label for="phone">Số điện thoại (*) :</label>
                            <input type="text" id="phone" name="phone" placeholder="0972705703" required>
                        </div>
                        <div class="form-block">
                            <label for="phone">Mật khẩu (*) :</label>
                            <input type="password" id="password" name="password" style="height: 37px;" placeholder="******" required>
                        </div>
                        <div class="form-block">
                            <label for="phone">Nhập lại mật khẩu (*) :</label>
                            <input type="password" id="password" name="re_password" style="height: 37px;" placeholder="******" required>
                        </div>
                        <div style="margin-left: 200px" class="form-block">
                            <button style="background-color: #0b9239; border-color: #0b9239;" type="submit" class="btn btn-primary">Đăng kí</button>
                        </div>
                    </div>
                    <div class="col-sm-3"></div>
                </div>
            </form>
        </div> <!-- #content -->
    </div> <!-- .container -->
@endsection