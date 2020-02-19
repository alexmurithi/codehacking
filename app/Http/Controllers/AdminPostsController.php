<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\PostsRequest;
use App\Photo;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $posts =Post::all();


        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
        $categories =Category::pluck('name','id')->all();
        return view('admin.posts.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsRequest $request)

    {
        $user =Auth::user();
        $input =$request->all();

        if($file =$request->file('photo_id')){
            $name =time().$file->getClientOriginalName();
            $file->move('images',$name);

            $photo =Photo::create(['path'=>$name]);
            $input['photo_id']=$photo->id;
        }
        $user->posts()->create($input);

        return redirect('/admin/posts');

//        return($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post =Post::findOrFail($id);
        $categories =Category::pluck('name','id')->all();
        return view('admin.posts.edit',compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post =Post::find($id);
       $input =$request->all();

       if($file =$request->file('photo_id')){
           $name =time(). $file->getClientOriginalName();
           $file->move('images',$name);

           $photo =Photo::create(['path'=>$name]);
           $input['photo_id']=$photo->id;
       }
       $post->update($input);

       Session::flash('post_updated','Your post has been updated successfully');

       return redirect('/admin/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post =Post::findOrFail($id);

        unlink(public_path() .$post->photo->path);
        $post->delete();

        Session::flash('post_deleted','Your Post has been deleted !!');
        return redirect('/admin/posts');
    }

    public function post($id){

        $post =Post::find($id);
        $comments =$post->comments()->where('is_active',1)->orderBy('created_at','desc')->get();

        return view('post',compact('post','comments'));
    }
}
