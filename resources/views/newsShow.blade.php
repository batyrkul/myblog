@extends('header.header')
@section('js')

@endsection
@section('meta')

@endsection
@section('title')

@endsection
@section('content')
    <section id="news-cont">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="content-text">
                        <h2>{{$news->title}}</h2>
                        <div>
                            @if ($news->image != null)
                                <img src="{{request()->root()}}{{$news->image}}"/>
                            @endif
                            {!! $news->text !!}
                        </div>
                        <div class="date">
                            {{$news->date}}
                        </div>
                        <?
                        $tags = json_decode($news->tags_list);
                        ?>
                        @if ($news->tags_list != null)
                        <div class="tags">

                            @foreach($tags as $k)
                              <a href="{{route('byTags',$k)}}">  <span><i class="fas fa-tags"></i> {{$k}}</span></a>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
