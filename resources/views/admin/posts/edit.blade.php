@extends('layouts.admin')


@section('content')
    <h2>Edit Post</h2>



    @include('includes.form-errors')

    <div class="col-lg-4 col-sm-4">
        <img src="{{$post->photo? $post->photo->path : "/images/imageComingSoon.jpg"}}" alt="" class="img-responsive img-rounded">
    </div>

    <div class="col-lg-8 col-sm-8">
        {!! Form::model($post,['method'=>'PATCH','action'=>['AdminPostsController@update',$post->id],'files'=>true]) !!}

        <div class="form-group">
            {!! Form::label('category_id','Category') !!}
            {!! Form::select('category_id',[] + $categories,null,['class'=>'form-control']) !!}
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

            {!! Form::submit('Edit Post',['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

        {!! Form::open(['method'=>'DELETE','action'=>['AdminPostsController@destroy',$post->id]]) !!}

        {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}

        {!! Form::close() !!}
    </div>



@stop