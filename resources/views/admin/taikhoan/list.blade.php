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
            <h6 class="mb-0">Danh Sách Phân Quyền</h6>
            {{-- <a class="btn btn-sm btn-primary" href="{{route('role.create')}}">Add</a> --}}
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
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        {{-- <th scope="col">Pass</th> --}}
                        <th scope="col">name_role</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($taikhoan as $key =>$taikhoan)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$taikhoan->name}}</td>
                        <td>{{$taikhoan->email}}</td>
                        {{-- <td>{{$taikhoan->password}}</td> --}}
                        <td>{{$taikhoan->role->display_name}}</td>
                        <td>
                            
                            
                                <form action="{{ route('taikhoan.destroy',$taikhoan->id) }}" method="POST">
                                    <a
                                class="btn btn-sm btn-primary"
                                href="{{ route('taikhoan.edit',$taikhoan->id) }}"
                                >Update</a
                            >
                        
                                @csrf
                                @method('DELETE')
                                    <button class="btn btn-sm btn-primary ">Delete</button>
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