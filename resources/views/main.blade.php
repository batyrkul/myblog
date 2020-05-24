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
            @foreach ($News as $k)
                <div class="col-lg-3">
                    <div class="news-item">
                        <a href="{{route('news.show', $k->id)}}">
                            <div class="news-image" style="background-image: url({{request()->root()}}{{$k->image}})">

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
                                @foreach($tags as $j)
                                    <a href="{{route('byTags',$j)}}"> <span>{{$j}}</span></a>
                                    @endforeach
                            </div>
                                @endif
                        </div>
                        @auth
                            @if(Auth::user()->id == $k->auth)
                                <div class="ad-tools">
                                    <a href="{{route('news.edit',$k->id)}}">
                                        <span><i class="far fa-edit"></i></span>
                                    </a>

                                    <form action="{{ route('news.destroy',$k->id) }}" method="POST">
                                        <span><button type="submit"><i class="fas fa-trash-alt"></i></button></span>

                                        @csrf
                                        @method('DELETE')
                                    </form>


                                </div>
                            @endif
                        @endauth
                    </div>

                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
