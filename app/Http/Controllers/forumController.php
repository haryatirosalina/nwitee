<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Forum;
use App\Models\detailForum;
use Image;

class forumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Forum::all();
        return view('forum', ['data' => $data]);
    }

    public function createForum()
    {
        return view('createForum');
    }
    // public function detailForum()
    // {
    //     return view('detailForum');
    // }
    // public function indexdetailForum(Request $request)
    // {
	// // insert data ke table detaiForum
	// DB::table('detail_forum')->insert([
	// 	'comment' => $request->comment,

	// ]);

    //     return view('detailForum');
    // }

    public function indexCreateStore(Request $request)
    {
	// insert data ke table pegawai
	DB::table('forum')->insert([
		'forum' => $request->forum,
		'topics' => $request->topics,
		'post' => $request->post,
	]);

        return redirect('/forum');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('detailForum', [
            'forum' => Forum::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data   = Forum::whereId($id)->first();
        return view('/editForum',['data' => $data]);
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
        // update forum
        DB::table('forum')->where('id',$request->id)->update([
            'forum' => $request->forum,
            'topics' => $request->topics,
            'post' => $request->post,
        ]);
        return redirect('/forum')->with('status', 'Data berhasil diubah!');
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
        return redirect('forum')->with('sukses','Data forum berhasil dihapus');
    }


    //detail Forum
    public function detail()
    {
        $data = detailForum::all();
        return view('detailForum', ['data' => $data]);
    }

    public function addDiscuss()
    {
        return view('addDiscuss');
    }
    public function Store(Request $request)
    {
        $data =new detailForum;
        $data->deskripsi = $request->deskripsi;
        $data->save();
        return redirect('/detailForum/{id}');
    }
}
