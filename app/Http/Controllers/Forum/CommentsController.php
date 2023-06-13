<?php

namespace App\Http\Controllers\Forum;
use App\Models\Comments;
use App\Models\Topic;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Request $request, Topic $topic){
        $validateData = $request -> validate([
            'content' => 'required|string'
        ]);
        $comment = $topic -> comments() ->create($validateData);

        return response()->json(['message', 'Comentário enviado com sucesso', 'comment' => $comment]);
    }


    public function index(Topic $topic){
        $comments = $topic->comment()->get();
        return response()->json(['comments', $comments]);
    }

    public function show(Comments $comment){
        return response()->json(['comment', $comment]);
    }
    
}
