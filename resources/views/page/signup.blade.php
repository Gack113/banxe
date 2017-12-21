<html lang="en">
<head>
    <base href="{{secure_asset('')}}">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="icon" href="source/image/icon/favicon.png">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://www.google.com/recaptcha/api.js'></script>
	<title>Đăng ký tài khoản</title>
    <style>
        @media(min-width: 768px) {
            .field-label-responsive {
                padding-top: .5rem;
                text-align: right;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <form class="form-horizontal" method="POST" action="{{route('signup')}}">
        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
        <div class="row"  style="margin-top:10%">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <h2>Đăng Ký Tài Khoản Mới</h2>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                @if(count($errors) > 0)
                <div class="alert alert-danger">
                @foreach($errors->all() as $err)
                    {{$err}}&nbsp;&nbsp;&nbsp;
                @endforeach
                </div>
                @endif
                @if(Session::has('message'))
                    <h5 class="alert alert-success">{{Session::get('message')}}</h5>
                @endif
            </div>
            <div class="col-3"></div>
        </div>
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="username">Tên Đăng Nhập</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-user"></i></div>
                        <input type="text" name="username" class="form-control" id="username"
                               placeholder="Tên Đăng Nhập" required autofocus>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="name">Tên Hiển Thị</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-user"></i></div>
                        <input type="text" name="name" class="form-control" id="name"
                               placeholder="Tên Hiển Thị" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="email">E-Mail</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-at"></i></div>
                        <input type="text" name="email" class="form-control" id="email"
                               placeholder="Email@example.com" required autofocus>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="password">Mật Khẩu</label>
            </div>
            <div class="col-md-6">
                <div class="form-group has-danger">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-key"></i></div>
                        <input type="password" name="password" class="form-control" id="password"
                               placeholder="Mật Khẩu" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="password_confirmation">Nhập Lại Mật Khẩu</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem">
                            <i class="fa fa-repeat"></i>
                        </div>
                        <input type="password" name="password_confirmation" class="form-control"
                               id="password_confirmation" placeholder="Nhập Lại Mật Khẩu" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-info"><i class="fa fa-user-plus"></i> Đăng ký</button>
                <a href="{{route('login')}}"><button type="button" class="btn btn-info"><i class="fa fa-sign-in"></i> Đăng nhập</button></a>
            </div>
        </div>
        <!-- @captcha -->
    </form>
</div>
<body>