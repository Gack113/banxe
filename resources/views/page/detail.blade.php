@extends('master')
@section('content')
<hr>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <p>
                <h1>{{$prdct->name}}</h1>
            </p>
            <p>
                <h2>Giá: {{number_format($prdct->unit_price)}}</h2>
            </p>
            <p>
                <h3>Khu Vực: {{$prdct->location}}</h3>
            </p>
            <p>
                <h3>{!!$prdct->description!!}</h3>
            </p>
            @foreach($prdctImage as $photo)
                <a  class="image-link" href="source/image/product/{{$photo->image}}">
                    <img src="source/image/product/{{$photo->image}}" alt="" height="250px">
                </a>
                <br><br>
            @endforeach
        </div>

    </div>
</div>
@endsection