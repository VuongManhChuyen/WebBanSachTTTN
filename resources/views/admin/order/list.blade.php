@extends('admin.index')
@section('content')
<div class="container-fluid pt-4 px-4">
</div>

<!-- Recent Sales Start -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary text-center rounded p-4">
        <div
            class="d-flex align-items-center justify-content-between mb-4"
        >
            <h6 class="mb-0">Danh Sách thông tin khách hàng</h6>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="table-responsive">
            <table
                class="table text-start align-middle table-bordered table-hover mb-0"
            >
                <thead>
                    <tr class="text-white">
                        <th scope="col">STT</th>
                        <th scope="col">Họ Tên</th>
                        <th scope="col">Số Điện Thoại</th>
                        <th scope="col">Địa chỉ</th>
                        <th scope="col">Ghi chú</th>
                        <th>Tên sản phẩm</th>
                        <th scope="col">Số lượng sản phẩm</th>
                        <th>Tổng tiền</th>
                        <th scope="col">Trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order  as  $key => $order)
                    
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$order->name_kh}}</td>
                        <td>{{$order->phone}}</td>
                        <td>{{$order->address}}</td>
                        <td>{{$order->note}}</td>
                        <td>{{$order->name_book}}</td>
                        <td>{{$order->book_quantity}}</td>
                        <td>{{$order->book_price}}</td>
                        <td>{{$order->name_status}}</td>
                        <td>
                            
                            
                                <form action="{{ route('order.destroy',$order->order_id) }}" method="POST">
                                    <a
                                class="btn btn-sm btn-primary"
                                href="{{ route('order.edit',$order->order_id) }}"
                                >Update</a
                            >
                                @csrf
                                @method('DELETE')
                                    <button class="btn btn-sm btn-primary">Delete</button>
                                </form>
                            
                        </td>
                    </tr>   
                    @endforeach               
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection