@extends('layouts.admin')


@section('content')
    <h2>Create Post</h2>

    @include('includes.form-errors')

    {!! Form::open(['method'=>'POST','action'=>'AdminPostsController@store','files'=>true]) !!}

        <div class="form-group">
            {!! Form::label('category_id','Category') !!}
            {!! Form::select('category_id',[''=>'Choose Category'] + $categories,null,['class'=>'form-control']) !!}
        </div>

         <div class="form-group">
             {!! Form::label('title','Title') !!}
             {!! Form::text('title',null,['class'=>'form-control']) !!}
         </div>

    <div class="form-group">
        {!! Form::label('body','Description') !!}
        {!! Form::textarea('body',null,['class'=>'form-control','rows'=>8]) !!}
    </div>

    <div class="form-group">
        {!! Form::label('photo','Photo') !!}
        {!! Form::file('photo_id',null) !!}
    </div>

    <div class="form-group">

        {!! Form::submit('Create Post',['class'=>'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}

@stop