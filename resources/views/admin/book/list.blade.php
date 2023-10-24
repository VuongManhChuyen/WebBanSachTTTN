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
            <h6 class="mb-0">Danh Sách Sản Phẩm</h6>
            <a class="btn btn-sm btn-primary" href="{{route('book.create')}}">Add</a>
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
                        <th scope="col">ID</th>
                        <th scope="col">Tên Sách</th>
                        <th scope="col">Ảnh</th>
                        <th scope="col">Mô tả</th>
                        <th scope="col">price</th>  
                        <th scope="col">Danh Mục</th>
                        <th scope="col">Giá Khuyến Mại</th>
                        <th scope="col">Tác Giả</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($book as $key => $book)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$book->name_book}}</td>
                        <td><img src="{{asset('/storage/images/'.$book->img)}}" alt=""style="height: 100px;width:100px;">
                            </td>
                        <td>{{$book->description}}</td>
                        <td>{{$book->price}}</td>                  
                        <td>{{$book->category->name_category}}</td>
                        <td>{{$book->promotion->price_promotion}}</td>
                        <td>{{$book->author->name_author}}</td>
                        <td>
                            
                            
                                <form action="{{ route('book.destroy',$book->id) }}" method="POST">
                                    <a
                                class="btn btn-sm btn-primary"
                                href="{{ route('book.edit',$book->id) }}"
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