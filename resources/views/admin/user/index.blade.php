@extends('admin.layout')
@section('main-content')

    <div class="card">
        <div class="card-header">User List</div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($users))
                        @foreach($users as $u)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$u->name}}</td>
                                <td>{{$u->email}}</td>
                                <td>{{$u->created_at}}</td>
                            </tr>
                        @endforeach
                    @endif    
                </tbody>
            </table>
        </div>
    </div>
@endsection
