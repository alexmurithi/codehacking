@extends('layouts.admin')

@section('content')

    <h2>Create Category</h2>

    {!! Form::open(['method'=>'POST','action'=>'AdminCategoriesController@store']) !!}

    <div class="form-group">
        {!! Form::label('name','Name') !!}

        {!! Form::text('name',null,['class'=>'form-control']) !!}
    </div>

    {!! Form::submit('Create',['class'=>'btn btn-primary']) !!}


    {!! Form::close() !!}
    @stop