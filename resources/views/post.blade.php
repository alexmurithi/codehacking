@extends('layouts.blog-post')

@section('content')




    <!-- Blog Post -->

    <!-- Title -->
    @if(Session::has('comment_submitted'))
        <div class="alert alert-success">
            <strong>{{session('comment_submitted')}}</strong>
        </div>
    @endif
    <h1>{{$post->title}}</h1>

    <!-- Author -->
    <p class="lead">
        by <a href="#">{{$post->user->name}}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> Posted  {{$post->created_at->diffForHumans()}}</p>

    <hr>

    <!-- Preview Image -->
         @if($post->photo)
             <img class="img-responsive" src="{{$post->photo->path}}" alt="">
             @endif



    <hr>

    <!-- Post Content -->
    <p class="lead">{{$post->body}}</p>


    <hr>

    <!-- Blog Comments -->

    <!-- Comments Form -->
    @if(Auth::check())
    <div class="well">
        <h4>Leave a Comment:</h4>

        {!! Form::open(['method'=>'POST','action'=>'PostCommentsController@store']) !!}

        <input type="hidden" name="post_id" value="{{$post->id}}">
            <div class="form-group">
                {!! Form::textarea('body',null,['class'=>'form-control','rows'=>4]) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}
            </div>

        {!! Form::close() !!}

    </div>

      @else
      <div class="alert alert-warning">
        <strong>You are not allowed to comment!</strong>
      </div>
    @endif

    <hr>

    <!-- Posted Comments -->

    <!-- Comment -->
    @if($comments)
        @foreach($comments as $comment)
    <div class="media">
        <a class="pull-left" href="#">
            <img class="media-object img-rounded" src="{{$comment->user_photo ? $comment->user_photo : '/images/imageComingSoon.jpg'}}" width="50px" alt="">
        </a>
        <div class="media-body">
            <h4 class="media-heading">{{$comment->author}}
                <small>{{$comment->created_at->diffForHumans()}}</small>
            </h4>
            {{$comment->body}}


     @if($comment->replies)

     @foreach($comment->replies as $reply)

          <div class="media">
              <a class="pull-left" href="#">
                  <img class="media-object" src="{{$reply->user_photo ? $reply->user_photo : '/images/imageComingSoon.jpg'}}" width="30px" alt="">
              </a>
              <div class="media-body">
                  <h4 class="media-heading">{{$reply->author}}
                      <small>{{$reply->created_at->diffForHumans()}}</small>
                  </h4>
                  {{$reply->body}}


                    </div>
                    <div class="comment-reply-container">
                      <button type="button" name="button" class="toggle-reply btn btn-primary pull-right">Reply</button>

                      <div class="comment-reply col-sm-6" style="display:none;">
                        {!!Form::open(['method'=>'POST','action'=>'CommentRepliesController@store'])!!}
                            <input type="hidden" name="comment_id" value="{{$comment->id}}">

                             <div class="form-group">
                                {!!Form::textarea('body',null,['class'=>'form-control','rows'=>'1'])!!}
                             </div>
                          {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}

                        {!!Form::close()!!}

              </div>

          </div>
        </div>

        @endforeach



         @endif


        </div>
    </div>
    @endforeach
@endif




@stop

@section('scripts')
<script>
     $(".toggle-reply").click(function(){
         $(this).next().slideToggle("slow");
     });
     </script>
  @stop
