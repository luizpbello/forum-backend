<?php

namespace App\Http\Controllers\Forum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Topic;

class TopicController extends Controller
{
    public function store(Request $request){
        $validateData = $request->validate([
            'title'=>'required|string',
            'content'=>'required|string',
            'cateogry'=>'required|string'
        ]);
    
        $topic = Topic::create($validateData);
    
        return response()->json(['message','Tópico criado com sucesso', 'topic' => $topic ]);
    
      }
    
    
      public function update(Request $request, Topic $topic){
        $validateData = $request->validate([
            'title'=>'required|string',
            'content'=>'required|string',
            'cateogry'=>'required|string'
        ]);
    
        $topic->update($validateData);
    
        return response()->json(['message' => 'Tópico atualizado com succeso', 'topic' => $topic]);
      }
    
    
      public function destroy(Topic $topic){
        $topic -> delete();
    
        return response()->json(['message' => 'Tópico excluido com sucesso']);
      }
    
    
      public function index(){
        $topics = Topic::all()->load('comment');
        
    
        return response()->json(['topics' => $topics]);
      }
    
    
      public function show(Topic $topic){
        return response()->json(['topic', $topic]);
      }
    
}
