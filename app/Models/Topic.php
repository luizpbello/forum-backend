<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = ['title', 'content', 'category'];

    public function comment(){
        return $this->hasMany(Comment::class);
    }
}
