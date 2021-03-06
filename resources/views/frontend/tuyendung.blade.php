@extends('frontend.layout.master')
@section('content')
    <section class="breadcrumbs">
        <div class="container">
            <ol>
                <li><a href="/">{{__('Trang chủ')}}</a></li>
                <li><span>{{__('Tin tức')}}</span></li>
            </ol>
            <h2>{{__($page_title)??'DKT'}}</h2>
        </div>
    </section>
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">
            <div class="row">
                @if($recuitment[0] === null)
                    <h4>Danh mục chưa có bài viết nào !</h4>
                @endif
                <div class="col-lg-8 entries">
                    @foreach($recuitment as $blog)
                        <article class="entry">
                            <div class="entry-img">
                                <img src="{{$blog->image}}" alt="" class="img-fluid">
                            </div>
                            <h2 class="entry-title">
                                <a href="{{$blog->url}}">{{$blog->title}}</a>
                            </h2>

                            <div class="entry-meta">
                                <ul>
                                    <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="{{$blog->url}}">{{$blog->user->name}}</a></li>
                                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="{{$blog->url}}"><time datetime="2020-01-01">
                                                {{$blog->created_at}}</time></a></li>
                                </ul>
                            </div>
                            <div class="entry-content">
                                <p>{!! $blog->description !!}</p>
                                <div class="read-more">
                                    <a href="{{$blog->url}}">Xem thêm</a>
                                </div>
                            </div>
                        </article>
                    @endforeach
                    <style>
                        article img {
                            max-width: 100%;
                            width: 100%;
                        }
                    </style>
                    {{$recuitment->links()}}
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
@endsection
