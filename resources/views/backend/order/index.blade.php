@extends('backend.layouts.lte')

@section('title')
    Quản lý đơn hàng
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Danh sách đơn hàng</h3>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped table-bordered text-sm">
                <thead>
                <tr>
                    <th style="width: 60px">ID</th>
                    <th>Thông tin đặt hàng</th>
                    <th>Sản phẩm</th>
                    <th>Giá trị</th>
                    <th>Ngày đặt</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>
                            <p class="mb-0"><span class="text-secondary">Tên: </span><strong>{{ $order->name }}</strong></p>
                            <p class="mb-0"><span class="text-secondary">Điện thoại: </span><strong>{{ $order->phone }}</strong></p>
                            <p class="mb-0"><span class="text-secondary">Email: </span><strong>{{ $order->email }}</strong></p>
                            <p class="mb-0"><span class="text-secondary">Address: </span><strong>{{ $order->address }}</strong></p>
                            <p class="mb-0"><span class="text-secondary">Ghi chú: </span><strong>{{ $order->note }}</strong></p>

                        </td>
                        <td>
                            @foreach($order->order_items as $orderItem)
                                <p class="mb-0"><span class="text-secondary">{{ $loop->index + 1 }}.</span> {{ $orderItem->product->name }}</p>
                            @endforeach
                        </td>
                        <td>{{ human_money($order->amount()) }}</td>
                        <td>{{ $order->created_at }}</td>
                        <td>{{ $order->statusLable() }}</td>
                        <td>
                            <a href="{{ route('backend.order.view', ['id' => $order->id]) }}" target="_blank" class="btn btn-outline-primary btn-sm" title="Xem đơn hàng">
                                <i class="fad fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
