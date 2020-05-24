<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class News extends Model
{
    use \Conner\Tagging\Taggable;
    //
    protected $fillable = [
        'title', 'descr','text','date','auth','image','tags','tags_list'
    ];

}

