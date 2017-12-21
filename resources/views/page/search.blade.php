@extends('master')
@section('content')
<div class="container">
<div class="container-fluid row">
	<div class="col-12">
		<div>
			<p>{{count($product)}} kết quả</p>
			<div class="clearfix"></div>
			@foreach($product->chunk(3) as $products)
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
			<div class="row">{{$product->links()}}</div>
		</div>
	</div>
</div>
</div> <!-- #content -->

@endsection