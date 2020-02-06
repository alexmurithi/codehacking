@extends('layouts.admin')


@section('content')

    <h2>Categories</h2>

    <div class="col-lg-4 col-sm-4">
        @if($categories)

            <table class="table">
                <thead>

                <tr>
                    <th>Id</th>
                    <th>Name</th>
                </tr>
                </thead>


                <tbody>
                @foreach($categories as $category)

                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
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