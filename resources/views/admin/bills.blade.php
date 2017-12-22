@extends('admin/dashdoard')
@section('content')
<div class="container">
     <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <h2 style="text-align:center">Danh Sách Hóa Đơn</h2>
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
            <table class="table table-bordered table-hover table-responsive">
                <tr>
                    <th>Mã Khách Hàng</th>
                    <th>Tổng Tiền</th>
                    <th>Hình Thức Thanh Toán</th>
                    <!-- <th>Chú Thích</th> -->
                    <th>Trạng thái</th>
                    <th>Ngày Tạo</th>
                    <th>Quản Lý</th>
                </tr>
                @foreach($bills as $bill)
                <tr>
                    <td>{{$bill->id_customer}}</td>
                    <td>{{number_format($bill->total)}}</td>
                    <td>{{$bill->payment}}</td>
                    <!-- <td>{{$bill->note}}</td> -->
                    <td>
                        @if($bill->state_id == 0)
                            Chưa giao
                        @elseif($bill->state_id == 1)
                            Đang giao
                        @else
                            Đã giao
                        @endif
                    </td>
                    <td>{{$bill->date_order}}</td>
                    <td>
                        <a class="delete" href="{{route('show-bill',$bill->id)}}">Xem</a>
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#md{{$bill->id}}">Sửa</button>
                            <div class="modal fade bd-example-modal-sm" id="md{{$bill->id}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3>Trạng thái đơn hàng</h3>
                                        </div>
                                        <form action="{{route('update-bill',$bill->id)}}" method="POST">
                                        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                                            <div class="modal-body">
                                                <select class="form-control" name="state" id="state">
                                                    <option value="0">Chưa giao hàng</option>
                                                    <option value="1">Đang giao hàng</option>
                                                    <option value="2">Đã giao hàng</option>
                                                </select>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-info">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                       
                    </td>
                 
                </tr>
                @endforeach
            </table>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>

@endsection
