<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    protected $guarded = [];

    public function category(){
        return $this->belongsTo(Blogcategory::class, 'blogcat_id', 'id');
    }
}
