@extends('frontend.layout.master')
@section('content')
    <section class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="/">Trang chủ</a></li>
                <li><a href="/tin-tuc">Blog</a></li>
                <li>Blog Single</li>
            </ol>
            <h2>{{$page_title??'DKT'}}</h2>
        </div>
    </section>
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-8 entries">
                    <article class="entry entry-single">
                        <div class="entry-img">
                            <img src="{{$news[0]->image}}" alt="" class="img-fluid">
                        </div>
                        <h2 class="entry-title">
                            <a href="{{$news[0]->url}}">{{$news[0]->title}}</a>
                        </h2>

                        <div class="entry-meta">
                            <ul>
                                <li class="d-flex align-items-center"><i class="bi bi-person"></i>{{$news[0]->user->name}}<a href="#"></a></li>
                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="#"><time datetime="2020-01-01">{{$news[0]->created_at}}</time></a></li>
                            </ul>
                        </div>
                        <div class="entry-content">
                            <p>{!! $news[0]->description !!}</p>
                        </div>
                        {!! $news[0]->content !!}
                        <span><i class="bi bi-eye-fill"></i>View: {{$news[0]->totalviews}}</span>
                    </article>
                    <style>
                        article img {
                            max-width: 100%;
                        }
                        td {
                            border: 1px #ccc solid;
                        }
                        .entry.entry-single{
                            min-height: 600px;
                        }
                    </style>
                </div>
                <!-- End blog entries list -->
                <div class="col-lg-4">
                @include('frontend.components.side-bar-blog')
                    <!-- End sidebar -->
                </div>
                <!-- End blog sidebar -->
            </div>
        </div>
    </section>
    <script>
        window.onload = function() {
            $.ajax({
                method: "PUT",
                url: "{{route('items.add-view',$news[0]->id)}}",
                data: {
                    "_token": "{{ csrf_token() }}",
                }
            })
        }
    </script>
@endsection
@section('styles')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@endsection
