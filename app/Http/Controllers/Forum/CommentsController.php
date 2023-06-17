<?php

namespace App\Http\Controllers\Forum;
use App\Models\Topic;
use App\Http\Controllers\Controller;
use App\Models\Comments;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CommentsController extends Controller
{
    public function store(Request $request,)
    {
        $validatedData = $request->validate([
            'topic_id' => 'required|numeric',
            'title' => 'required|string',
            'content' => 'required|string',
        ]);
    
        $comment = Comments::create($validatedData);
    
    }
    



    public function index(Topic $topic){
        $comments = $topic->comment()->get();
        return response()->json(['comments', $comments]);
    }

    

    public function show( $topicId,  $commentId){
        try {
            $comment = Comments::findOrFail($commentId);
           
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao tentar editar o comentário', 'error' => $th->getMessage()], 500);
        }
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
    

    public function update(Request $request, $topicId, $commentId){
        try {
            $validatedData = $request->validate([
                'content' => 'required|string',
            ]);
            $comment = Comments::findOrFail($commentId);
            $comment->update($validatedData);
            return response()->json(['message' => 'Comentário atualizado com sucesso', 'topic' => $comment]);

        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao atualizar o comentário', 'error' => $th->getMessage()], 500);
        }
    }
    

}
