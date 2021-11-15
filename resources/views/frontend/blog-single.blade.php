@extends('frontend.layout.master')
@section('content')
    <section class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="/">{{__('Trang chủ')}}</a></li>
                <li><a href="/tin-tuc">{{__('Tin tức')}}</a></li>
                <li><span>{{$news->title}}</span></li>
            </ol>
            <h2>{{__($page_title)??'DKT'}}</h2>
        </div>
    </section>
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-8 entries">
                    <article class="entry entry-single">
{{--                        <div class="entry-img">--}}
{{--                            <img src="{{$news->image}}" alt="" class="img-fluid">--}}
{{--                        </div>--}}
                        <h2 class="entry-title">
                            <a href="{{$news->url}}">{{$news->title}}</a>
                        </h2>

                        <div class="entry-meta">
                            <ul>
                                <li class="d-flex align-items-center"><i class="bi bi-person"></i>{{$news->user->name}}<a href="#"></a></li>
                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="#"><time datetime="2020-01-01">{{$news->created_at}}</time></a></li>
                            </ul>
                        </div>
                        <div class="entry-content">
                            <p>{!! $news->description !!}</p>
                        </div>
                        {!! $news->content !!}
                        <span><i class="bi bi-eye-fill"></i>View: {{$news->totalviews}}</span>
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
                url: "{{route('items.add-view',$news->id)}}",
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
