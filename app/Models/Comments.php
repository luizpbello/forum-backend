<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $fillable = ['topic_id','content'];

    public function topic(){
        return $this->belongsTo(Topic::class);
    }

}
