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
                <h4>Добавить блог</h4>
            </div>
        </div>
        <form action="{{ route('news.store') }}" method="POST" class="row" enctype="multipart/form-data">
            <label class="col-lg-4">Тема</label> <input class="col-lg-6" name="title" placeholder="Тема" required>
            <label class="col-lg-4">Краткий описание</label> <textarea class="col-lg-6" name="descr" placeholder="Краткий описание" required></textarea>
            <label class="col-lg-4">Текст</label> <textarea id="text" class="col-lg-6" name="text" placeholder="Текст" required></textarea>
            <div class="col-lg-12">
                @csrf  <br/>
            </div>
            <label class="col-lg-4">Картинка</label> <input class="col-lg-6" name="image" type="file" placeholder="Картинка" >
            <label class="col-lg-4">Теги</label> <div class="col-lg-6"><input id="tags"  name="tags" type="text" data-role="tagsinput" placeholder="Теги" >

            </div>
            <label class="col-lg-4">Дата</label> <input  class="col-lg-6" name="date" type="datetime-local" >
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
