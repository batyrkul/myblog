<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;

class NewsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index','show']]);
    }
    //
    public function index()
    {
        $News = News::latest()->paginate(15);

        return view('main')->with(["News"=> $News]);
    }

    public function create()
    {


        return view('blogCreate');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'text' => 'required',
            'auth' => 'required'
        ]);


        $image = $request->file('image');
        if($image!=null){
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $new_name);
        }else{
            $new_name = null;
        }


        $tags = explode(",", $request->tags);

        $taglist = json_encode($tags);


        $form_data = array(
            "title" => $request->title,
            "descr" => $request->descr,
            "text" => $request->text,
            "date" => $request->date,
            "auth" => $request->auth,
            "image" => "/images/".$new_name,
            "tags" =>$tags,
            "tags_list" => $taglist,
        );

        $newsitem = News::create($form_data);

        $newsitem->attachTags($tags);


        return redirect('/')->with('success', 'Data Added successfully.');

    }

    public function show(News $news)
    {
        return view('newsShow',compact('news'));
    }

    public function edit(News $news)
    {

        return view('newsEdit',compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => 'required',
            'text' => 'required',
            'auth' => 'required'
        ]);

        $image = $request->file('image');

        if($image!=null) {
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $new_name);

            $new_name = "/images/".$new_name;
        }else{

            $new_name = $request->isset_image;
        }

        $tags = explode(",", $request->tags);

        $taglist = json_encode($tags);

        $form_data = array(
            "title" => $request->title,
            "descr" => $request->descr,
            "text" => $request->text,
            "date" => $request->date,
            "auth" => $request->auth,
            "image" =>$new_name,
            "tags" =>$tags,
            "tags_list" => $taglist,
        );

        $news->update($form_data);

        $news->syncTags($tags);

        return redirect('/');
    }

    public function destroy(News $news)
    {
        $news->delete();

        return redirect()->route('news.index');
    }


}
