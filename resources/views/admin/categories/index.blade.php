@extends('layouts.admin')


@section('content')

    <h2>Categories</h2>

    @if(Session::has('category_updated'))
        <div class="alert alert-info">
            <strong>{{session('category_updated')}}</strong>
        </div>
        @endif

    @if(Session::has('category_deleted'))
        <div class="alert alert-danger">
            <strong>{{session('category_deleted')}}</strong>
        </div>
    @endif

    @if(Session::has('category_created'))
        <div class="alert alert-info">
            <strong>{{session('category_created')}}</strong>
        </div>
    @endif

    <div class="col-lg-4 col-sm-4">
        @if($categories)

            <table class="table">
                <thead>

                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Created_</th>
                    <th>Updated</th>
                </tr>
                </thead>


                <tbody>
                @foreach($categories as $category)

                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->created_at->diffForHumans()}}</td>
                        <td>{{$category->updated_at->diffForHumans()}}</td>
                        <td><a href="{{route('admin.categories.edit',$category->id)}}">Edit</a></td>
                    </tr>
                @endforeach


                @endif
            </table>
    </div>

    <div class="col-lg-8 col-sm-8">
        <h2>Create Category</h2>

        {!! Form::open(['method'=>'POST','action'=>'AdminCategoriesController@store']) !!}

           <div class="form-group">
               {!! Form::label('name','Name') !!}

               {!! Form::text('name',null,['class'=>'form-control']) !!}
           </div>

          {!! Form::submit('Create',['class'=>'btn btn-primary']) !!}


        {!! Form::close() !!}
    </div>


    @endsection