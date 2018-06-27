@extends('IndexMain')
@section('content')
    <div class="container">
        <div id="content" class="space-top-none">
            <div class="space50">&nbsp;</div>
            <div class="row">
                <div class="col-sm-12">
                    <h2>Mẫu liên hệ</h2>
                    <div class="space20">&nbsp;</div>
                    <p>Vui lòng điền đầy đủ thông tin bên dưới để được hỗ trợ tốt nhất</p>
                    <div class="space20">&nbsp;</div>
                    <form action="#" method="post" class="contact-form">
                        <div class="form-block">
                            <input style="width: 80%" name="your-name" type="text" placeholder="Tên bạn" required>
                        </div>
                        <div class="form-block">
                            <input style="width: 80%" name="your-email" type="email" placeholder="Email của bạn" required>
                        </div>
                        <div class="form-block">
                            <input style="width: 80%" name="your-subject" type="text" placeholder="Vấn đề" required>
                        </div>
                        <div class="form-block">
                            <textarea name="your-message" placeholder="Mô tả cụ thể vấn đề"></textarea>
                        </div>
                        <div class="form-block">
                            <button type="submit" class="beta-btn primary">Gởi Yêu Cầu
                                <i style="color: #8fc816" class="fa fa-chevron-right"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- #content -->
    </div> <!-- .container -->
@endsection