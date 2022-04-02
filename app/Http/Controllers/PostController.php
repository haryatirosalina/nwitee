<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\Comment;
use App\Models\LikeDislike;
use Auth;
use Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Post::all();
        return view('home', ['data' => $data]);
    }

    public function createPost()
    {
        $post = Post::all();
        return view('createPost', ['post'=>$post]);
    }

    public function indexCreateStore(Request $request)
    {
        $post =new Post;
        $post->description = $request->description;
        $post->topics = $request->topics;
        $file = $request->file('file');
    	$filename = time() . '.' . $file->getClientOriginalExtension();
    	Image::make($file)->resize(300, 300)->save( public_path('/img/file/' . $filename ) );
    	$post->file = $filename;

        $post->save();
        return redirect('/home');
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
        $post = Post::whereId($id)->first();
        return view('/editPost',['post' => $post]);
        
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
        $post = Post::find($id);
        $post->description = $request->description;
        $post->topics = $request->topics;
        $file = $request->file('file');
    	$filename = time() . '.' . $file->getClientOriginalExtension();
    	Image::make($file)->resize(300, 300)->save( public_path('/img/file/' . $filename ) );
    	$post->file = $filename;

        $post->save();
        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::find($id);
        $comment = Comment::where('post_id',$id)->delete();
        $post->delete();
        return redirect('home')->with('sukses','Data post berhasil dihapus');
    }

    function save_likedislike(Request $request){
        $data = new LikeDislike;
        $data->post_id = $request->post;
        if($request->type == 'like'){
            $data->like=1;
        }else{
            $data->dislike=1;
        }
        $data->save();
        return response()->json([
            'bool' => true
        ]);
    }
}
