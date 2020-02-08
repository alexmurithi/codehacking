@extends('layouts.admin')

@section('content')
    <h2>Media</h2>

    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Photo</th>
            <th>Created</th>

        </tr>
        </thead>
        <tbody>
        @if($photos)
            @foreach($photos as $photo)
                <tr>


                    <td>{{$photo->id}}</td>
                    <td><a href="{{$photo->path ? $photo->path : 'images/imageComingSoon.jpg'}}"><img src="{{$photo->path ? $photo->path : 'images/imageComingSoon.jpg'}}"  class="img-rounded"  alt="" width="50px"></a></td>

                    <td>{{$photo->created_at->diffForHumans()}}</td>

                </tr>
    @endforeach
    @endif


        </tbody>
    </table>

    @stop