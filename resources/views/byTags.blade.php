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
                        <h2>блоги с тегами - {{$tag}} </h2>

                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($news as $k)
                    <div class="col-lg-3">
                        <div class="news-item">
                            <a href="{{route('news.show', $k->id)}}">
                                <div class="news-image" style="background-image: url({{request()->root()}}{{$k->image}})">
                                    @auth
                                        @if(Auth::user()->id ==$k->auth)
                                            <div class="ad-tools">
                                                <a href="{{route('news.edit',$k->id)}}">
                                                    <span><i class="far fa-edit"></i></span>
                                                </a>
                                                <a href="{{route('news.destroy',$k->id)}}" onclick="return confirm('вы действительно хотите удалить?')">
                                                    <span><i class="fas fa-trash-alt"></i></span>
                                                </a>
                                            </div>
                                        @endif
                                    @endauth
                                </div>
                            </a>
                            <div class="title-cont">
                                <a href="{{route('news.show', $k->id)}}">
                                    <div class="news-title">
                                        {{$k->title}}
                                    </div>
                                </a>
                                <div class="news-desc">
                                    {{$k->descr}}
                                </div>
                                <hr color="gray">
                                <?php
                                $tags = json_decode($k->tags_list);
                                ?>
                                @if($k->tags_list!=null)
                                    <div class="tag-list">
                                        <span><i class="fas fa-tags"></i> </span>
                                        @foreach($tags as $k)
                                            <a href="{{route('byTags',$k)}}"> <span>{{$k}}</span></a>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
