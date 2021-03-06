@extends('layouts.admin')



@section('content')
    <h3>Edit User</h3>

    @include('includes.form-errors')

    <div class="col-lg-3 col-sm-3 col-xs-6">
        <img src="{{$user->photo ? $user->photo->path : '/images/imageComingSoon.jpg'}}" class="img-responsive img-rounded" alt="">
    </div>
    <div class="col-lg-9 col-sm-9 col xs-6">
        {!! Form::model($user,['method'=>'PATCH','action'=>['AdminUsersController@update',$user->id],'files'=>true]) !!}
        <div class="form-group">
            {!! Form::label('name','Name') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('email','Email') !!}
            {!! Form::email('email',null,['class'=>'form-control']) !!}
        </div>


{{--        <div class="form-group">--}}
{{--            {!! Form::label('password','Password') !!}--}}
{{--            {!! Form::password('password',['class'=>'form-control']) !!}--}}
{{--        </div>--}}

        <div class="form-group">
            {!! Form::label('photo_id','Photo') !!}
            {!! Form::file('photo_id',['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('role_id','Role') !!}
            {!! Form::select('role_id',$roles, null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('is_active','Status') !!}
            {!! Form::select('is_active',array(1=>'Active',0=>'Inactive'),null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Edit User',['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}


    </div>


@endsection