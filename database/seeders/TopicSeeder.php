<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Topic;
class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Topic::create([
            'title' => 'Título do tópico',
            'content' => 'Conteúdo do tópico',
            'user_id' => 1,
            'category_id' => 1,
        ]);
    }
}