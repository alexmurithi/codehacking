@extends('layouts.admin')

@section('content')
    <h2>Comments</h2>

    @if(Session::has('comment_moderated'))
           <div class="alert alert-info">
               <strong>{{session('comment_moderated')}}</strong>
           </div>

        @endif

    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Post Id</th>
            <th>Author</th>
            <th>Email</th>
            <th>Body</th>

            <th>Created</th>
            <th>Update</th>

        </tr>
        </thead>
        <tbody>
        @if($comments)
            @foreach($comments as $comment)
                <tr>


                    <td>{{$comment->id}}</td>
{{--                    <td><img src="{{$post->photo ? $post->photo->path : 'images/imageComingSoon.jpg'}}"   alt="" width="50px"></td>--}}
                    <td>{{$comment->post_id}}</td>
                    <td>{{$comment->author}}</td>
                    <td>{{$comment->email}}</td>
                    <td>{{$comment->body}}</td>

                    <td>{{$comment->created_at->diffForHumans()}}</td>
                    <td>{{$comment->updated_at->diffForHumans()}}</td>
                    <td><a href="{{route('home.post',$comment->post->id)}}">View Post</a></td>

                    <td>
                        @if($comment->is_active ==0)
                            {!! Form::open(['method'=>'PATCH','action'=>['PostCommentsController@update',$comment->id]]) !!}

                            <input type="hidden" name="is_active" value="1">
                            {!! Form::submit('Approve',['class'=>'btn btn-success']) !!}
                            {!! Form::close() !!}
                        @else
                            {!! Form::open(['method'=>'PATCH','action'=>['PostCommentsController@update',$comment->id]]) !!}

                            <input type="hidden" name="is_active" value="0">
                            {!! Form::submit('Un-Approve',['class'=>'btn btn-warning']) !!}
                            {!! Form::close() !!}
                        @endif
                    </td>
                    <td>

                    </td>






                </tr>
            @endforeach
        @endif






        </tbody>
    </table>
    @stop