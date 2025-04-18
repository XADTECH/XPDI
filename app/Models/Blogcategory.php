<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blogcategory extends Model
{
    protected $guarded = [];

    public function blogpost(){
        return $this->hasMany(BlogPost::class, 'blogcat_id', 'id');
    }

   
}
