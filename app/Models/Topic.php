<?php

namespace App\Models;

use App\Models\Comments;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = ['title', 'content', 'category'];

    public function comment(){
        return $this->hasMany(Comments::class);
    }
}
