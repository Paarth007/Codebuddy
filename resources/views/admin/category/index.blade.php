@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-2">
        <ul class="list-group">
            <li class="list-group-item">Users</li>
            <li class="list-group-item">Category</li>
        </ul>
    </div>

    <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5>Category List</h5>
                    <a href="{{ url('category/create') }}" class="btn btn-primary">Add New Category</a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Action</th>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Total Subcategory<br>
                                        <small style="font-size:10px">Click on button to view subcategory</small>
                                </th>
                                <th scope="col">SubCategory</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($categories))
                                @foreach($categories as $c)
                                    <tr>
                                        <td>
                                                <a href="{{ url('category/'.$c->id.'/edit')}}" class="btn btn-sm btn-info">Edit</a>

                                                <a class="btn btn-sm btn-danger" 
                                                    href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();document.getElementById('logout-form-{{$c->id}}').submit();">
                                                        Delete
                                                </a>
                                                <form id="logout-form-{{$c->id}}" action="{{ url('category/'.$c->id) }}" method="POST" class="d-none">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                    
                                            </td>    
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$c->category_name}}</td>
                                        <td><button type="button" 
                                                    class="btn btn-sm btn-info" 
                                                    onClick="showSubcategories({{$c->id}})">
                                                    {{count($c->subcategory)}}
                                            </button>
                                        </td>
                                        <td>
                                                @if(count($c->subcategory))
                                                    <table class="table subcategoryTable" id="subcategoryTable_{{$c->id}}" style="display:none">
                                                    @foreach($c->subcategory as $s)                                                   
                                                        <tr>
                                                            <td>
                                                                <a href="{{ url('category/'.$s->id.'/edit')}}" class="btn btn-sm btn-warning">Edit</a>
                                                                <a class="btn btn-sm btn-danger" 
                                                                    href="{{ route('logout') }}"
                                                                    onclick="event.preventDefault();document.getElementById('logout-form-{{$s->id}}').submit();">
                                                                        Delete
                                                                </a>
                                                                <form id="logout-form-{{$s->id}}" action="{{ url('category/'.$s->id) }}" method="POST" class="d-none">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                </form>
                                                        
                                                            </td>    
                                                            <td>{{$s->category_name}}</td>
                                                        </tr>
                                                    @endforeach
                                                    
                                                    </table>
                                                @endif
                                            </td>
                                    </tr>
                                @endforeach
                            @endif    
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('script')
    <script type="text/javascript">
           
        function showSubcategories(id){
            $('.subcategoryTable').hide();
            $('#subcategoryTable_'+id).show();
        }

    </script>
@endsection