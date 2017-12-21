<nav class="navbar navbar-expand-lg navbar-light bg-light" >
<a class="navbar-brand" href="{{route('home')}}"><i class="fa fa-home" aria-hidden="true"></i>Trang Chủ<span class="sr-only"></span></a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
	<ul class="navbar-nav mr-auto">
		<li class="nav-item">
			<a class="nav-link" href="#">Liên Hệ</a>
		</li>
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			Sản Phẩm
			</a>
			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				@foreach($type as $item)
				<a class="dropdown-item" href="{{route('loai',$item->name)}}"><i class="fa fa-car"></i> {{$item->name}}</a>
				@endforeach
			</div>
		</li>
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Bảng Giá
			</a>
			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				<a class="dropdown-item" href="#"><i class="fa fa-money"></i> 1-5 tỷ</a>
				<a class="dropdown-item" href="#"><i class="fa fa-money"></i> 5-10 tỷ</a>
				<a class="dropdown-item" href="#"><i class="fa fa-money"></i> 10-20 tỷ</a>
				<a class="dropdown-item" href="#"><i class="fa fa-money"></i> 20-50 tỷ</a>
				<a class="dropdown-item" href="#"><i class="fa fa-money"></i> Trên 50 tỷ</a>
			</div>
		</li>
		<li>
			<form class="form-inline my-2 my-lg-0" method="get" action="{{route('tim-kiem')}}">
				<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="tu-khoa">
				<button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search</button>
			</form>
		</li>
	</ul>
	<ul class="navbar-nav my-auto">
		<li class="nav-item dropdown">
			<a href="#" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<button class="btn btn-outline-info my-2 my-sm-0">
					<span>
						<i class="fa fa-shopping-cart" aria-hidden="true"></i> 
						@if(Session::has('cart'))
							({{Session('cart')->totalQty}})
						@else
							(Trống)
						@endif
					</span>
				</button>
			</a>
			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				@if(Session::has('cart'))
					@foreach(Session('cart')->items as $item)
					<a class="dropdown-item" href="#">
						<img src="source/image/product/{{$item['item']->image}}" alt="" width="50">
						<span>{{$item['item']->name}}</span>
						<span>{{substr($item['item']->unit_price,0,5)}}..</span>
						<span>x{{$item['qty']}}</span>
					</a>
					@endforeach
					<a class="dropdown-item" href="#">Tổng: {{number_format(Session('cart')->totalPrice)}}</a>
				@else
					<a class="dropdown-item" href="#">Tổng: 0</a>
				@endif
				<a class="dropdown-item" href="{{route('dat-hang')}}"><button class="btn btn-info">Đặt hàng <i class="fa fa-angle-right" aria-hidden="true"></i></button></a>
			</div>
		</li>&nbsp;
		@if(Auth::check())
		<li class="nav-item dropdown">
			<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
				{{Auth::user()->name}}
			</a>
			<div class="dropdown-menu">
				@if(Auth::user()->role_id == 1)
				<a class="dropdown-item" href="{{route('admin')}}"><i class="fa fa-area-chart"></i> Trang quản trị</a>
				@endif
				<a class="dropdown-item" href="#"><i class="fa fa-user"></i> Hồ sơ cá nhân</a>
				<a class="dropdown-item" href="{{route('logout')}}"><i class="fa fa-sign-out"></i> Đăng xuất</a>
			</div>
		</li>
		@else
		<li class="nav-item"><a href="{{route('login')}}"><button class="btn btn-outline-info my-2 my-sm-0">Đăng Nhập</button></a></li>&nbsp;
		<li class="nav-item"><a href="{{route('signup')}}"><button class="btn btn-outline-info my-2 my-sm-0">Đăng Ký</button></a></li>
		@endif
	</ul>
</div>
</nav>