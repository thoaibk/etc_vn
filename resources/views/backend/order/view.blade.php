@extends('backend.layouts.lte')

@section('title')
    Chi tiết đơn hàng
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <!-- Main content -->
                <div class="invoice p-3 mb-3">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-12">

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                            <h4>{{ $order->name }}</h4>
                            <address>
                                Phone: {{ $order->phone }}<br>
                                Email: {{ $order->email }} <br>
                                Địa chỉ: {{ $order->address }}<br>
                                Ghi chú : {{ $order->note }}<br>

                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">

                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            <span>Ngày đặt: {{ $order->created_at  }}</span>
                            <br>
                            <span>Trạng thái: </span> <strong >{{ $order->statusLable() }}</strong> <br>
                            <span>Giá trị đơn hàng: </span> <strong>{{ human_money($order->amount()) }}</strong>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- Table row -->
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Sản phẩm</th>
                                    <th>Đơn giá</th>
                                    <th>Số lượng </th>
                                    <th style="width: 200px">Tông tiền</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($order->order_items as $orderItem)
                                    <tr>
                                        <td>{{ $orderItem->product->name }}</td>
                                        <td>{{ human_money($orderItem->price) }}</td>
                                        <td>{{ $orderItem->qty }}</td>
                                        <td>{{ human_money($orderItem->total()) }}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="3" style="text-align: right"><strong>Tổng cộng</strong></td>
                                    <td><strong>{{ human_money($order->amount()) }}</strong></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                </div>
                <!-- /.invoice -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
@stop
