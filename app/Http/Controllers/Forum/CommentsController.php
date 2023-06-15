<?php

namespace App\Http\Controllers\Forum;
use App\Models\Topic;
use App\Http\Controllers\Controller;
use App\Models\Comments;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Request $request, Comments $comment){
        try {
            $validatedData = $request->validate([
                'topic'=>'required|numeric',
                'content' => 'required|string',
            ]);
        
            $comment->content = $validatedData['content'];
            $comment->topic_id = $request->topic;
            $comment->save();
        
            return response()->json(['message' => 'Comentário criado com sucesso', 'comment' => $comment]);
        } catch (\Throwable $th) {
            dd($th);
        }
    }


    public function index(Topic $topic){
        $comments = $topic->comment()->get();
        return response()->json(['comments', $comments]);
    }


    public function show(Comments $comment, $id){
        $comment = $comment->find($id);
        return response()->json(['comment', $comment]);
    }
    
    public function destroy($topicId, $commentId)
    {
        try {
            $comment = Comments::findOrFail($commentId);
            $comment->delete();
            return response()->json(['message' => 'Comentário excluído com sucesso']);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao excluir o comentário', 'error' => $th->getMessage()], 500);
        }
    }
    
    

}
