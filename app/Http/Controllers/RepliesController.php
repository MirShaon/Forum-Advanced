<?php

namespace App\Http\Controllers;
use Auth;
use Session;
use App\Reply;
use App\Like;
use App\User;

use Illuminate\Http\Request;

class RepliesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function like($id)
    {
        Like::create([
             'reply_id' => $id,
             'user_id'  =>Auth::id()

        ]);

        Session::flash('success', 'You Liked the Reply');
        return redirect()->back();
    }


    public function unlike($id)
    {

     $like = Like::where('reply_id', $id)->where('user_id', Auth::id())->first();
     $like->delete();


    Session::flash('success', 'You UnLiked');

      return redirect()->back();
  

    }


    public function best_answer($id)
    {
           $reply = Reply::find($id);
           $reply->best_answer = 1;
           $reply->save();

           $reply->user->points +=100;
           $reply->user->save();

           Session::flash('success','Done');
           return redirect()->back();


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        return view('replies.edit',['reply' => Reply::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $this->validate(request(),[
           
           'content' => 'required'


        ]);

        $reply = Reply::find($id);
        $reply->content = request()->content;
        $reply->save();

        Session::flash('success', 'Reply Updated');
        return redirect()->route('discussion',['slug'=>$reply->discussion->slug ]);
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
    }
}
