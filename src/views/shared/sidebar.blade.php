{{--<div class="nav-side-menu">--}}
	{{--<div class="brand">Brand Logo</div>--}}
	{{--<i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>--}}

	{{--<div class="menu-list">--}}

		{{--<ul id="menu-content" class="menu-content collapse out">--}}
			{{--<li>--}}
				{{--<a href="#">--}}
					{{--<i class="fa fa-dashboard fa-lg"></i> Dashboard--}}
				{{--</a>--}}
			{{--</li>--}}
			{{--<li>--}}
				{{--<a href="{{url('/admin/product')}}">--}}
					{{--<i class="fa fa-account fa-lg"></i> Sản phẩm--}}
				{{--</a>--}}
			{{--</li>--}}

			{{--<li>--}}
				{{--<a href="{{url('/admin/infor')}}">--}}
					{{--<i class="fa fa-account fa-lg"></i> Thông tin--}}
				{{--</a>--}}
			{{--</li>--}}
			{{--<li>--}}
				{{--<a href="{{url('/admin/customer')}}">--}}
					{{--<i class="fa fa-account fa-lg"></i> Khách hàng--}}
				{{--</a>--}}
			{{--</li>--}}
			{{--<li>--}}
				{{--<a href="{{url('/admin/partner')}}">--}}
					{{--<i class="fa fa-account fa-lg"></i> Đối tác--}}
				{{--</a>--}}
			{{--</li>--}}
			{{--<li>--}}
				{{--<a href="{{url('/admin/account')}}">--}}
					{{--<i class="fa fa-account fa-lg"></i> User--}}
				{{--</a>--}}
			{{--</li>--}}
		{{--</ul>--}}
	{{--</div>--}}
{{--</div>--}}

<aside>
	<div id="sidebar" class="nav-collapse">
		<!-- sidebar menu start-->
		<div class="leftside-navigation">
			<ul class="sidebar-menu" id="nav-accordion">
			@if(Auth::check())
				<li class="sub-menu">
					<a href="javascript:;">
						<i class="fa fa-user"></i>
						<span>Người dùng: <b>{{Auth::user()->name}}</b></span>
					</a>
					<ul class="sub">
						{{--<li><a href="{{url('admin/user')}}">Thông tin người dùng</a></li>--}}
						{{--<li><a href="{{url('admin/change-pass')}}">Đổi mật khẩu</a></li>--}}
						{{-- <li><a href="{{url('/admin/user/edit', [Auth::user()->id])}}">Thông tin người dùng</a></li> --}}
						<li><a href="{{url('/logout')}}">Đăng xuất</a></li>
					</ul>
				</li>
			@endif
				<li>
					<a href="{{url('admin/infor')}}">
						<i class="fa fa-info-circle"></i>
						<span>Thông tin</span>
					</a>
				</li>
				<li>
					<a href="{{url('/admin/banner')}}">
						<i class="fa fa-picture-o"></i>
						<span>Banner</span>
					</a>
				</li>
				{{-- <li>
					<a href="{{url('/admin/menu')}}">
						<i class="fa fa-bars"></i>
						<span>Menu</span>
					</a>
				</li>
				<li>
					<a href="{{url('/admin/slidebar-menu')}}">
						<i class="fa fa-bars"></i>
						<span>SlibarMenu</span>
					</a>
				</li> --}}
				{{-- <li>
					<a href="{{url('/admin/city')}}">
						<i class="fa fa-home"></i>
						<span>City</span>
					</a>
				</li> --}}
				{{-- <li>
					<a href="{{url('/admin/product-adv')}}">
						<i class="fa fa-buysellads"></i>
						<span>Quảng cáo</span>
					</a>
				</li> --}}
				<li class="sub-menu">
					<a href="javascript:;">
						<i class="fa fa-tasks"></i>
						<span>Sản phẩm</span>
					</a>
					<ul class="sub">
						<li><a href="{{url('admin/product')}}">Danh sách sản phẩm</a></li>
						<li><a href="{{url('admin/product-group')}}">Nhóm sản phẩm</a></li>
						<li><a href="{{url('admin/manufact')}}">Hãng sản xuất</a></li>
						{{-- <li><a href="{{url('admin/comment')}}">Bình luận</a></li>
						<li><a href="{{url('admin/reply-comment')}}">Phản hồi bình luận</a></li>
						<li><a href="{{url('admin/rate')}}">Đánh giá</a></li>
						<li><a href="{{url('admin/size')}}">Kích cỡ</a></li> --}}
					</ul>
				</li>
				<li>
					<a href="{{url('/admin/promotion')}}">
						<i class="fa fa-bars"></i>
						<span>Ưu đãi</span>
					</a>
				</li>
				{{-- <li class="sub-menu">
					<a href="javascript:;">
						<i class="fa fa-bell-o"></i>
						<span>Đặt hàng</span>
					</a>
					<ul class="sub">
						<li><a href="{{url('admin/order')}}">Danh sách đặt hàng</a></li>
						<li><a href="{{url('admin/order-detail')}}">Chi tiết đặt hàng</a></li>
					</ul>
				</li> --}}
				{{-- <li>
					<a href="{{url('/admin/promotion')}}">
						<i class="fa fa-bookmark"></i>
						<span>Khuyến mãi</span>
					</a>
				</li>
				<li>
					<a href="{{url('/admin/provider')}}">
						<i class="fa fa-male"></i>
						<span>Nhà cung cấp</span>
					</a>
				</li>
				<li>
					<a href="{{url('/admin/password-reset')}}">
						<i class="fa fa-lock"></i>
						<span>Làm mới mật khẩu</span>
					</a>
				</li> --}}
				{{-- <li class="sub-menu">
					<a href="javascript:;">
						<i class="fa fa-user"></i>
						<span>Tài khoản</span>
					</a>
					<ul class="sub">
						<li><a href="{{url('admin/account')}}">Danh sách tài khoản</a></li>
						<li><a href="{{url('admin/account-group')}}">Nhóm tài khoản</a></li>
						<li><a href="{{url('/logout')}}">Đăng xuất</a></li>
					</ul>
				</li> --}}
				{{--<li class="sub-menu">--}}
					{{--<a href="javascript:;">--}}
						{{--<i class="fa fa-account"></i>--}}
						{{--<span>Người dùng</span>--}}
					{{--</a>--}}
					{{--<ul class="sub">--}}
						{{--<li><a href="{{url('admin/account')}}">Thông tin người dùng</a></li>--}}
						{{--<li><a href="{{url('admin/change-pass')}}">Đổi mật khẩu</a></li>--}}
					{{--</ul>--}}
				{{--</li>--}}
				{{-- @if(Auth::check()) --}}
					{{-- <li class="sub-menu">
						<a href="javascript:;">
							<i class="fa fa-user"></i> --}}
							{{-- <span>Người dùng: --}} {{-- <b>{{Auth::account()->name}}</b> --}}{{-- </span> --}}
						{{-- </a> --}}
						{{-- <ul class="sub"> --}}
							{{--<li><a href="{{url('admin/account')}}">Thông tin người dùng</a></li>--}}
							{{--<li><a href="{{url('admin/change-pass')}}">Đổi mật khẩu</a></li>--}}
							{{-- <li><a href="{{url('/admin/user')}}">Thông tin người dùng</a></li> --}}
						{{-- </ul> --}}
					{{-- </li> --}}
				{{-- @endif --}}

			</ul></div>
		<!-- sidebar menu end-->
	</div>
</aside>