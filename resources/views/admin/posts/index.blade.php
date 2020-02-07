@extends('layouts.admin')


@section('content')
    <h2>Posts</h2>
@if(Session::has('post_updated'))
      <div class="alert alert-info">
          <strong>{{session('post_updated')}}</strong>
      </div>
    @endif

    @if(Session::has('post_deleted'))
        <div class="alert alert-warning">
            <strong>{{session('post_deleted')}}</strong>
        </div>
    @endif

    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Photo</th>
            <th>Title</th>
            <th>Body</th>
            <th>Category</th>

            <th>Created</th>
            <th>Update</th>

        </tr>
        </thead>
        <tbody>
        @if($posts)
            @foreach($posts as $post)
                <tr>


                    <td>{{$post->id}}</td>
                    <td><img src="{{$post->photo ? $post->photo->path : 'images/imageComingSoon.jpg'}}"   alt="" width="50px"></td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->body}}</td>
                    <td>{{$post->category->name}}</td>

                    <td>{{$post->created_at->diffForHumans()}}</td>
                    <td>{{$post->updated_at->diffForHumans()}}</td>
                    <td><a href="{{route('admin.posts.edit',$post->id)}}">Edit</a></td>




                </tr>
            @endforeach
        @endif






        </tbody>
    </table>
    

    @stop