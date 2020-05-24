<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;

class IndexController extends Controller
{
    //

    public function byTags($tag){

        $news = News::withAnyTag([$tag])->get();



        return view("byTags")->with(["news"=>$news,"tag"=>$tag]);
    }
} 
