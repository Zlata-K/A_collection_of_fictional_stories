<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Story;

class CommentController extends Controller
{
    public function store(Request $request) // function saves the comment using the morphMany() relationship
    {
    	/*$request->validate([
            'text'=>'required',
        ]);
   
        $input = $request->all();
        $input['user_id'] = auth()->user()->id;
    
        Comment::create($input);
   
        return back();*/

        $comment = new Comment;
        $comment->text = $request->get('text');
        $comment->user()->associate($request->user());
        $post = Story::find($request->get('story_id'));
        $post->comments()->save($comment);

        return back();
    }
}
