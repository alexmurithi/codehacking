

@extends('layouts.admin')

@section('content')
  <h3>Users</h3>

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
            <td><img src="{{$user->photo ? $user->photo->path : "No photo found!"}}" id="userPhoto" class="img-responsive img-rounded" alt="" width="50px"></td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->role->name}}</td>
            <td>{{$user->is_active==1? 'Active' :'Inactive'}}</td>
            <td>{{$user->created_at}}</td>
            <td>{{$user->updated_at}}</td>


      </tr>
        @endforeach
    @endif


    </tbody>
  </table>
@stop
