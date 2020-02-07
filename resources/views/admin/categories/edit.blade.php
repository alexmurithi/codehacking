@extends('layouts.admin')

@section('content')
    <h2>Edit categories</h2>

    {!! Form::model($category,['method'=>'PATCH','action'=>['AdminCategoriesController@update',$category->id]]) !!}

      <div class="form-group">
          {!! Form::label('name', 'Category') !!}
          {!! Form::text('name',null,['class'=>'form-control']) !!}
      </div>



    <div class="form-group">
        {!! Form::submit('Update',['class'=>'btn btn-primary']) !!}
    </div>


    {!! Form::close() !!}


    {!! Form::open(['method'=>'DELETE','action'=>['AdminCategoriesController@destroy',$category->id]]) !!}

    {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
    @stop