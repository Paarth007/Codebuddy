@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-2">
    <ul class="list-group">
        <li class="list-group-item">
               <a href="{{ url('users') }}"> Users</a>
            </li>
        <li class="list-group-item"><a href="{{ url('category') }}"> Category</a></li>
    </ul>
    </div>
        <div class="col-md-8">
            @yield('main-content')
        </div>
    </div>
</div>
@endsection
