@extends('admin.layout')
@section('main-content')
    <div class="card">
        
        <div class="card-header">
            @if(!$data)
                Add Category
            @else
                Edit Category
            @endif
        </div>
            <div class="card-body">
            @if(\Session::has('error'))
                <div>
                    <li class="alert alert-danger p-0">{!! \Session::get('error') !!}</li>
                </div>
            @endif

            @if(\Session::has('success'))
                <div>
                    <li class="alert alert-success p-0">{!! \Session::get('success') !!}</li>
                </div>
            @endif

            @if(!$data)
                <form role="form" method="post" action="{{url('category')}}">
            @else
                <form role="form" method="post" action="{{url('category/'.$data->id)}}">
                @method('PUT')
            @endif
                {{csrf_field()}}

                    <div class="mb-3 row">
                        <label for="" class="col-sm-3 col-form-label">Select Parent Category :</label>
                        <div class="col-sm-9">
                            <select type="text" name="parent_category_id" class="form-control">
                                <option value="">Select Category</option>
                                @if($categories)
                                    @foreach($categories as $c)
                                        @if($data && $data->parent_category_id && $data->parent_category_id==$c->id)
                                            <option value="{{$c->id}}" selected>{{$c->category_name}}</option>  
                                        @else
                                            <option value="{{$c->id}}">{{$c->category_name}}</option>  
                                        @endif
                                    @endforeach
                                @endif
                            </select>
                            @error('parent_category_id')
                                <div class="alert alert-danger p-0">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="" class="col-sm-3 col-form-label">Enter Category Name :</label>
                        <div class="col-sm-9">
                            <input type="text" 
                                    class="form-control"
                                    name="category_name" 
                                    placeholder="Category name" 
                                    value="{{$data ? $data->category_name : old('category_name')}}" 
                                    />         
                            @error('category_name')
                                <div class="alert alert-danger p-0">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <div class="col-sm-12 text-end">
                            @if(!$data)
                                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                                <button type="button" class="btn btn-sm btn-danger">Clear All</button>
                             @else
                                 <button type="submit" class="btn btn-sm btn-primary">Update</button>
                                 <a href="{{ url('category')}}" class="btn btn-sm btn-danger">Go Back</a>
                             @endif   
                        </div>                         
                    </div> 
                </form>

            </div> <!-- CARD BODY -->
        </div>   <!-- CARD -->
    </div>
   
@endsection
