<?php

namespace App\Http\Controllers;
use Session;
use Notification;
use Auth;
use App\User;
use App\Reply;
use App\Discussion;

use Illuminate\Http\Request;

class DiscussionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('discuss');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[


         'channel_id' => 'required',
         'content'    => 'required',
         'title'      => 'required'
         

     ]);
     $discussion = Discussion::create([

            'title'       =>$request->title,
            'content'     =>$request->content,
            'channel_id'  =>$request->channel_id,
            'user_id'     =>Auth::id(),
            'slug'        =>str_slug($request->title)
            
       

        ]);


     Session::flash('success', 'Discussions Created Successfully');
     return redirect()->route('discussion',['slug' =>$discussion->slug]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        
        $discussion = Discussion::where('slug', $slug)->first();
        $best_answer = $discussion->replies()->where('best_answer',1)->first();
        return view('discussions.show')->with('d',$discussion)
                                       ->with('best_answer',$best_answer);
    }

    public function reply($id)
    {

         $d = Discussion::find($id);

         $reply = Reply::create([

              'user_id' => Auth::id(),
              'discussion_id' => $id,
               'content' => request()->content

         ]);

         $reply->user->points +=25;
         $reply->user->save();

          $watchers = array();
         foreach($d->watchers as $watcher):

         array_push($watchers, User::find($watcher->user_id));

         endforeach;   
         Notification::send($watchers, new \App\Notifications\NewReplyAdded($d));



         Session::flash('success', 'Replied to Discussion');
         return redirect()->back();
    


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        return view('discussions.edit',['discussion' => Discussion::where('slug',$slug)->first()]);
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

        $d=Discussion::find($id);
        $d->content = request()->content;
        $d->save();

        Session::flash('success','updated Successfully');
        return redirect()->route('discussion',['slug'=>$d->slug]);
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
