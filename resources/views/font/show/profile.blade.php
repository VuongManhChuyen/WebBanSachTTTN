@extends('font.layout')
@section('content')

<div class="bg-white overflow-hidden shadow rounded-lg border">
    <div class="px-4 py-5 sm:px-6">
        <h3 class="text-lg leading-6 font-medium text-gray-900 text-center">
         Profile
        </h3>
    
    </div>
    <div class="border-t border-gray-200 px-4 py-5 sm:p-0 container">
        <dl class="sm:divide-y sm:divide-gray-200">
            <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 text-center">
                <dt class="text-lg font-medium text-gray-500 ">
                    Full name
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    {{(Auth::user()->name)}}
                </dd>
            </div>
            <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 text-center">
                <dt class="text-lg font-medium text-gray-500">
                    Email address
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    {{(Auth::user()->email)}}
                </dd>
            </div>
            <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 text-center">
                <dt class="text-lg font-medium text-gray-500">
                    Phone number
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    {{(Auth::user()->phone)}}
                </dd>
            </div>
            <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 text-center">
                <dt class="text-lg font-medium text-gray-500">
                    Address
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    {{(Auth::user()->address)}}
                </dd>
            </div>
            
            <a class="btn container" href="{{route('profile.edit',$id)}}" >Cập Nhật Thông Tin</a>
     
        </dl>
    </div>
</div>

@endsection