<?php

namespace App\Http\Controllers\Forum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Topic;

class TopicController extends Controller
{
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'title' => 'required|string',
                'content' => 'required|string',
                'category_id' => 'required|numeric'
            ]);

            $topic = Topic::create($validatedData);

            return response()->json(['message' => 'Tópico criado com sucesso', 'topic' => $topic], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erro ao criar o tópico', 'error' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, Topic $topic, $id)
    {
        try {
            $validatedData = $request->validate([
                'title' => 'required|string',
                'content' => 'required|string',
                'category_id' => 'required|numeric'
            ]);

            $topic = $topic->find($id);
            $topic->update($validatedData);

            return response()->json(['message' => 'Tópico atualizado com sucesso', 'topic' => $topic]);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao atualizar o tópico', 'error' => $th->getMessage()], 500);
        }
    }

    public function destroy(Topic $topic, $id)
    {
        try {
            $topic = $topic->find($id);

            if (!$topic) {
                return response()->json(['message' => 'Tópico não encontrado'], 404);
            }

            $topic->delete();
            
            return response()->json(['message' => 'Tópico excluído com sucesso']);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao excluir o tópico', 'error' => $th->getMessage()], 500);
        }
    }

    public function index()
    {
        try {
            $topics = Topic::with('comment')->get();

            return response()->json(['topics' => $topics]);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao obter os tópicos', 'error' => $th->getMessage()], 500);
        }
    }

    public function show(Topic $topic, $id)
    {
        try {
            $topic = $topic->with('comment')->find($id);

            if (!$topic) {
                return response()->json(['message' => 'Tópico não encontrado'], 404);
            }

            return response()->json(['topic' => $topic]);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao obter o tópico', 'error' => $th->getMessage()], 500);
        }
    }
}
