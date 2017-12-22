@extends('master')
@section('content')
@include('banner')
<div class="marquee" style="text-align:center">
<p style="font-size:20pt">Sản Phẩm Mới</p>
</div>
<div class="container">
	@foreach($newprdct->chunk(3) as $products)
	<div class="row">
		@foreach($products as $item)
		<div class="col-sm-4">
			<a href="{{route('chi-tiet',$item->slug)}}"><img src="source/image/product/{{$item->image}}" alt="" height="200" width="250"></a>
			<p ><h5>{{$item->name}}</h5></p>
			<p ><h6>{{$item->location}}<h6></p>
			<p>
				@if($item->promotion_price == 0)
					<span>{{number_format($item->unit_price)}}</span>
				@else
					<span>{{number_format($item->promotion_price)}}</span>
				@endif
			</p>
			<a class="btn btn-info" href="{{route('chi-tiet',$item->slug)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
			<a class="btn btn-info" href="{{route('them-vao-gio-hang',$item->id)}}"><i class="fa fa-shopping-cart"></i></a>
			<div class="clearfix"></div>
		</div>
		@endforeach
	</div>
	<div style"height:5%">&nbsp;</div>
	@endforeach
</div>

<div class="marquee" style="text-align:center">
<p style="font-size:20pt">Sản Phẩm Được Xem Nhiều Nhất</p>
</div>
<div class="container">
	@foreach($highestProducts->chunk(3) as $products)
	<div class="row">
		@foreach($products as $item)
		<div class="col-sm-4">
			<a href="{{route('chi-tiet',$item->slug)}}"><img src="source/image/product/{{$item->image}}" alt="" height="200" width="250"></a>
			<p ><h5>{{$item->name}}</h5></p>
			<p ><h6>{{$item->location}}<h6></p>
			<p>
				@if($item->promotion_price == 0)
					<span>{{number_format($item->unit_price)}}</span>
				@else
					<span>{{number_format($item->promotion_price)}}</span>
				@endif
			</p>
			<a class="btn btn-info" href="{{route('chi-tiet',$item->slug)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
			<a class="btn btn-info" href="{{route('them-vao-gio-hang',$item->id)}}"><i class="fa fa-shopping-cart"></i></a>
			<div class="clearfix"></div>
		</div>
		@endforeach
	</div>
	<div style"height:5%">&nbsp;</div>
	@endforeach
</div>

<div class="marquee" style="text-align:center">
<p style="font-size:20pt">Sản Phẩm Bán Chạy Nhất</p>
</div>
<div class="container">
	@foreach($saleprdct->chunk(3) as $products)
	<div class="row">
		@foreach($products as $item)
		<div class="col-sm-4">
			<a href="{{route('chi-tiet',$item->slug)}}"><img src="source/image/product/{{$item->image}}" alt="" height="200" width="250"></a>
			<p ><h5>{{$item->name}}</h5></p>
			<p ><h6>{{$item->location}}<h6></p>
			<p>
				@if($item->promotion_price == 0)
					<span>{{number_format($item->unit_price)}}</span>
				@else
					<span>{{number_format($item->promotion_price)}}</span>
				@endif
			</p>
			<a class="btn btn-info" href="{{route('chi-tiet',$item->slug)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
			<a class="btn btn-info" href="{{route('them-vao-gio-hang',$item->id)}}"><i class="fa fa-shopping-cart"></i></a>
			<div class="clearfix"></div>
		</div>
		@endforeach
	</div>
	<div style"height:5%">&nbsp;</div>
	@endforeach
</div>

<script src="source/assets/js/slider.js"></script>
@endsection