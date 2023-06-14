<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comments;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Comments::create([
            'user_id' => 1,
            'topic_id' => 1,
            'category_id' => 1,
            'content' => 'Comentário no primeiro tópico',
        ]);
    }
}
