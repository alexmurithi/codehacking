@extends('layouts.admin')

@section('content')
  <h3>Users</h3>

  <table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>

      </tr>
    </thead>
    <tbody>
      <tr>
        @if($users)
            @foreach($users as $user)
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->role->name}}</td>
            @endforeach
        @endif
      </tr>


    </tbody>
  </table>
@stop
