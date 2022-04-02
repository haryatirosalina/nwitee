<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\Forum;
use App\Http\Resources\ForumResource;
use App\Http\Controllers\API\APIController as APIController;

class ForumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forum = Forum::latest()->get();
        return response()->json([ForumResource::collection($forum), 'Programs fetched.']);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'forum' => 'required|string|max:255',
            'topics' => 'required',
            'post' => 'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        $data = Forum::create([
            'forum' => $request->forum,
            'topics' => $request->topics,
            'post' => $request->post,
         ]);
        
        return response()->json(['forum created successfully.', new ForumResource($data)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Forum::find($id);
        if (is_null($data)) {
            return response()->json('Data not found', 404); 
        }
        return response()->json([new ForumResource($data)]);
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
        $validator = Validator::make($request->all(),[
            'forum' => 'required|string|max:255',
            'topics' => 'required',
            'post' => 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        $data = Forum::find($id);
        $data->forum = $request->forum;
        $data->topics = $request->topics;
        $data->post = $request->post;
        $result=$data->save();
        return response()->json(['Forum updated successfully.', new ForumResource($data)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Forum::find($id);
        $data->delete();
        return response()->json('Forum deleted successfully');
    }
}
