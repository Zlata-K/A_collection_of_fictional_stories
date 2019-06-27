<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Story;
use DB;

class StoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$stories = DB::select('SELECT * FROM stories');
        //$stories =  Story::all()->paginate(1);
        $stories =  Story::orderBy('created_at','asc')->paginate(5);
        return view('sections.stories')->with('stories',$stories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sections.story_create');
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
            'title' => 'required',
            'story' => 'required'
        ]);
        // Create story
        $story = new Story;
        $story -> title = $request->input('title');
        $story -> story = $request->input('story');
        $story -> user_id = auth()->user()->id;
        $story->save();

        return redirect('/stories')->with('success','Story Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $story = Story::find($id);
        return view('sections.story_show')->with('story', $story);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $story = Story::find($id);
        
        //Check for correct user

        if(auth()->user()->type == 'admin' || auth()->user()->id === $story->user_id)
        {
            return view('sections.story_edit')->with('story', $story);
        }

       // if(auth()->user()->id !== $story->user_id){
            return redirect('/stories')->with('error', 'Only author can edit it');
       // }

        //return view('sections.story_edit')->with('story', $story);
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
        $this->validate($request,[
            'title' => 'required',
            'story' => 'required'
        ]);
        // Create story
        $story = Story::find($id);
        $story -> title = $request->input('title');
        $story -> story = $request->input('story');
        $story->save();

        return redirect('/stories')->with('success','Story Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $story = Story::find($id);

        //Check for correct user

        if(auth()->user()->type == 'admin' || auth()->user()->id === $story->user_id)
        {
            $story->delete();
        return redirect('/stories')->with('success','Story Removed');
        }


       // if(auth()->user()->type != 'admin'){
            return redirect('/stories')->with('error', 'Only author can edit it');
       /* }
        elseif(auth()->user()->id !== $story->user_id){
            return redirect('/stories')->with('error', 'Only author can edit it');
        }

        $story->delete();
        return redirect('/stories')->with('success','Story Removed');*/

    }
}
