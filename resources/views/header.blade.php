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
				<a class="dropdown-item" href="{{route('loai',$item->name)}}">{{$item->name}}</a>
				@endforeach
			</div>
		</li>
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Bảng Giá
			</a>
			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				<a class="dropdown-item" href="#"> 1-5 tỷ</a>
				<a class="dropdown-item" href="#"> 5-10 tỷ</a>
				<a class="dropdown-item" href="#"> 10-20 tỷ</a>
				<a class="dropdown-item" href="#"> 20-50 tỷ</a>
				<a class="dropdown-item" href="#"> Trên 50 tỷ</a>
			</div>
		</li>
		<li>
			<form class="form-inline my-2 my-lg-0" method="get" action="{{route('tim-kiem')}}">
				<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="tu-khoa">
				<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
			</form>
		</li>
	</ul>
	<a href="{{route('login')}}"><button class="btn btn-outline-primary">Đăng Nhập</button></a>
	<div>&nbsp;&nbsp;</div>
	<a href="{{route('login')}}"><button class="btn btn-outline-primary">Đăng Ký</button></a>
	
	
	<div>&nbsp;&nbsp;</div>
	<a href="{{route('login')}}">
	<button class="btn btn-outline-info">
	<span>
		<i class="fa fa-shopping-cart" aria-hidden="true"></i> 
		@if(Session::has('cart'))
			({{Session('cart')->totalQty}})
		@else
			(Trống)
		@endif
	</span></button>
	</a>
</div>
</nav>