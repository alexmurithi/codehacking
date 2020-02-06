

@extends('layouts.admin')

@section('content')
  <h3>Users</h3>
      @if(Session::has('deleted_user'))
            <div class="alert alert-info">
                <strong>{{session('deleted_user')}}</strong>
            </div>
          @endif
  <table class="table">
    <thead>
      <tr>
        <th>Id</th>
          <th>Photo</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
          <th>Account Status</th>
          <th>Created</th>
          <th>Update</th>

      </tr>
    </thead>
    <tbody>
    @if($users)
        @foreach($users as $user)
      <tr>


            <td>{{$user->id}}</td>
            <td><img src="{{$user->photo ? $user->photo->path : "/images/imageComingSoon.jpg"}}" id="userPhoto"   alt="" width="50px"></td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->role->name}}</td>
            <td>{{$user->is_active==1? 'Active' :'Inactive'}}</td>
            <td>{{$user->created_at}}</td>
            <td>{{$user->updated_at}}</td>
             <td><a type="button" class="btn btn-primary" href="{{route('admin.users.edit',$user->id)}}">Edit</a></td>
           <td>
               {!! Form::open(['method'=>'DELETE','action'=>['AdminUsersController@destroy',$user->id]]) !!}

                    {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
               {!! Form::close() !!}
           </td>


      </tr>
        @endforeach
    @endif






    </tbody>
  </table>

    <style>
        #userPhoto{
            width:50px;
            height:50px;
            object-fit: cover;
            border-radius: 50%;
        }
    </style>
@stop
