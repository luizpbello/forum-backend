<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $fillable = ['content'];

    public function topic(){
        return $this->belongsTo(Topic::class);
    }

}
