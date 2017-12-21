<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="keywords" content="Bán nhà vũng tàu">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Xe Hơi Ngọc Quốc</title>
	<base href="{{asset('')}}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="source/assets/css/index.css">
	<link rel="stylesheet" href="source/assets/css/slider.css">
	<link rel="stylesheet" href="viewbox/viewbox.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="icon" href="/source/image/icon/favicon.png">
</head>
<body>
    @include('header')
	<div class="rev-slider">
        @yield('content')
	</div> <!-- .container -->
    @include('footer')
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
<script src="viewbox/jquery.viewbox.min.js"></script>
<script>
	$(document).ready(function() {
		$('.image-link').viewbox();
	});
	$('.pagination li').addClass('page-item');
	$('.pagination li a').addClass('page-link');
	$('.pagination span').addClass('page-link');
</script>
</body>
</html>
