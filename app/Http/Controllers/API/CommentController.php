<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Validator;
use App\Models\Comment;
use App\Models\Post;
use App\Http\Resources\CommentResource;
use App\Http\Controllers\API\APIController as APIController;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comment = Comment::latest()->get();
        return response()->json([CommentResource::collection($comment), 'Programs fetched.']);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $post = Post::find($id);

        $comment = new Comment();
        $comment->name = Auth::user()->name;
        $comment->email = Auth::user()->email;
        $comment->comment = $request->comment;
        $comment->post()->associate($post);

        $comment->save();
        
        return response()->json(['comment created successfully.', new CommentResource($comment)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Forum $data, $id)
    {
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return response()->json('Comment deleted successfully');
    }
}
