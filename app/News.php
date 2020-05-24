<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class News extends Model
{
    use \Spatie\Tags\HasTags;
    //
    protected $fillable = [
        'title', 'descr','text','date','auth','image','tags','tags_list'
    ];
}

