<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                </div>
                <!-- /input-group -->
            </li>
            <li>
                <a href="{{ url('/admin') }}"><i class="fa fa-dashboard fa-fw"></i>  Bảng điều khiển</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>  Loại sản phẩm<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('type.index') }}"> Danh sách</a>
                    </li>
                    <li>
                        <a href="{{ route('type.create') }}"> Thêm mới</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-cube fa-fw"></i>  Sản phẩm<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('product.index') }}"> Danh sách sản phẩm</a>
                    </li>
                    <li>
                        <a href="{{ route('product.create') }}"> Thêm mới sản phẩm</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-cube fa-fw"></i>  Đơn Hàng<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('donhang.index') }}"> Danh sách đơn hàng</a>
                    </li>
                    <li>
                        <a href="{{ route('donhang.duyetdonhang') }}"> Đơn hàng đã duyệt</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>  Quảng cáo<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('slide.index') }}"> Danh sách slider</a>
                    </li>
                    <li>
                        <a href="{{ route('slide.create') }}"> Thêm mới slider</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>  Quản lý kho<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('kho.index') }}"> Số lượng tồn kho</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-users fa-fw"></i>  Người dùng<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('user.index') }}"> Danh sách người dùng</a>
                    </li>
                    <li>
                        <a href="{{ route('user.create') }}"> Thêm mới người dùng</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>