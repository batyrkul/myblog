@extends('header.header')

@section('js')
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.4.2/bootstrap-tagsinput.css" />
    <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.4.2/bootstrap-tagsinput.min.js"></script>
@endsection
@section('meta')

@endsection
@section('title')

@endsection
@section('content')
    <style>
        .bootstrap-tagsinput {    background-color: unset;    display: inline-block;    padding: 4px 6px;    margin-bottom: 10px;    color: #555;
            vertical-align: middle;    border-radius: 4px;    max-width: 100%;    line-height: 22px;    cursor: text;
        }
        .bootstrap-tagsinput .tag {    margin-right: 2px;    color: white;    background-color: #a0a0a0;
            padding: 10px;
        }
    </style>
    <section id="create">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4>Редактировать блог</h4>
                </div>
            </div>
            <form action="{{ route('news.update',$news->id) }}" method="POST" class="row" enctype="multipart/form-data">
                <label class="col-lg-4">Тема</label> <input class="col-lg-6" name="title" placeholder="Тема" value="{{$news->title}}" required>
                <label class="col-lg-4">Краткий описание</label> <textarea class="col-lg-6" name="descr" placeholder="Краткий описание" required>{{$news->descr}}</textarea>
                <label class="col-lg-4">Текст</label> <textarea id="text" class="col-lg-6" name="text" placeholder="Текст" required>{{$news->text}}</textarea>
                <div class="col-lg-12">
                    @csrf  <br/>
                    @method('PUT')
                </div>
                <label class="col-lg-4">Картинка</label>
                <div class="col-lg-6">
                    <input name="image" type="file" placeholder="Картинка" >
                    <div class="isset-img">
                        <input type="hidden" name="isset_image" value="{{$news->image}}">
                        <img src="{{request()->root()}}{{$news->image}}"/>
                        <br/> <br/>
                    </div>
                </div>
                <label class="col-lg-4">Теги</label>
                <?php
                $tags = json_decode($news->tags_list);
                $tag_list = "";
                if($news->tags_list!=null)
                    foreach ($tags as $k){
                        $tag_list .= $k.",";
                    }
                ?>
                <div class="col-lg-6" data-type="{{$tag_list}}">

                    <input id="tags"  name="tags" type="text" data-role="tagsinput" placeholder="Теги" value="{{$tag_list}}" >
                </div>
                <label class="col-lg-4">Дата</label> <input  class="col-lg-6" name="date" type="datetime-local" value="{{date('Y-m-d\TH:i',strtotime($news->date))}}" >
                <input  class="col-lg-6" name="auth" type="hidden" value="{{auth::user()->id}}">
                <label class="col-lg-4"></label> <button type="submit" class="col-lg-6 btn btn-success">Сохранить</button>

            </form>
        </div>
    </section>
    <script>
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace( 'text' );

        $(function () {
            $("tags").tagsinput('items');
        });

    </script>
@endsection
