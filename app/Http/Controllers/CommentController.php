<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function Postcomment(Request $request){
        $request->validate([
            'comment'=>'required|max:200',
        ]);

        $request['user_id']=auth()->user()->id;

        Comments::create([
            'blog_id'=> $request->blog_id,
            'user_id'=> $request->user_id,
            'comment'=> $request->comment
        ]);

        return back()->with('message','Comment added');
    }
}
