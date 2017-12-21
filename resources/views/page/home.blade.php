@extends('master')
@section('content')
@include('banner')
<div class="marquee" style="text-align:center">
<p style="font-size:20pt">Sản Phẩm Nổi Bật</p>
</div>
<div class="container">
	@foreach($newprdct->chunk(2) as $products)
	<div class="row">
		@foreach($products as $item)
		<div class="col-md-6">
		<div class="row">
			<div class="col-md-7">
				<a href="{{route('chi-tiet',$item->slug)}}"><img src="source/image/product/{{$item->image}}" width="300" height="200" alt=""></a>
			</div>
			<div class="col-md-5">
				<a href="{{route('chi-tiet',$item->slug)}}">{{$item->name}}</a>
				<?= substr($item->description,0,180). '...' ?>
				<a href="{{route('chi-tiet',$item->slug)}}">xem thêm</a>
			</div>
		</div>
		</div>
		@endforeach
	</div>
	<div style"height:5%">&nbsp;</div>
	@endforeach
	<div class="row">{{$newprdct->links()}}</div>
</div>
<script src="source/assets/js/slider.js"></script>
@endsection