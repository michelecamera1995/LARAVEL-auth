<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostsModel extends Model
{
    //
    protected $fillable = ['title', 'content', 'slug'];
}
