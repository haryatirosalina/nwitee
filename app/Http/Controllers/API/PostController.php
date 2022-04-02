<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\Post;
use App\Http\Resources\PostResource;
use App\Http\Controllers\API\APIController as APIController;
use Illuminate\Support\Facades\DB;
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
        //
        $post = Post::latest()->get();
        return response()->json([PostResource::collection($post), 'Programs fetched.']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(),[
            'description' => 'required',
            'topics' => 'required',
            'file' => 'mimes:jpeg,bmp,png,gif,svg'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }
        $post = New Post;
        $post->description = $request->description;
        $post->topics = $request->topics;
        $file = $request->file('file');
        // $file = $request->file;
        if ($request->hasFile('file')) {
            $filename = time() . '.' . $file->getClientOriginalExtension();
            Image::make($file)->resize(300, 300)->save( public_path('/img/file/' . $filename ) );
            $post->file = $filename;
        }
        $result=$post->save();
        // return response()->json([$file]);
        return response()->json(['Post updated successfully.', new PostResource($post)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
        $post = Post::find($id);
        if (is_null($post)) {
            return response()->json('Data not found', 404); 
        }
        return response()->json([new PostResource($post)]);
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
        //
        $validator = Validator::make($request->all(),[
            'description' => 'required',
            'topics' => 'required',
            'file' => 'mimes:jpeg,bmp,png,gif,svg'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }
        $post = Post::find($id);
        $post->description = $request->description;
        $post->topics = $request->topics;
        $file = $request->file('file');
        if ($request->hasFile('file')) {
            $filename = time() . '.' . $file->getClientOriginalExtension();
            Image::make($file)->resize(300, 300)->save( public_path('/img/file/' . $filename ) );
            $post->file = $filename;
        }
        $result=$post->save();
        return response()->json([$file]);
        // return response()->json(['Post updated successfully.', new PostResource($post)]);
        
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
        $post->delete();
        return response()->json('Post deleted successfully');
    }
}