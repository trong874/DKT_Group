<div class="sidebar">
    <h3 class="sidebar-title">{{__('Tin tức hàng đầu')}}</h3>
    <div class="sidebar-item recent-posts">
        @foreach($top_view as $blog)
        <div class="post-item clearfix">
            <img src="{{$blog->image}}" alt="">
            <h4><a href="{{$blog->url}}">{{$blog->title}}</a></h4>
            <time datetime="2020-01-01">{{$blog->created_at}}</time>
        </div>
        @endforeach
    </div>
    <!-- End sidebar recent posts-->
    <h3 class="sidebar-title">Tags</h3>
    <div class="sidebar-item tags">
        <ul>
            <li><a href="#">App</a></li>
            <li><a href="#">IT</a></li>
            <li><a href="#">Business</a></li>
            <li><a href="#">Mac</a></li>
            <li><a href="#">Design</a></li>
            <li><a href="#">Office</a></li>
            <li><a href="#">Creative</a></li>
            <li><a href="#">Studio</a></li>
            <li><a href="#">Smart</a></li>
            <li><a href="#">Tips</a></li>
            <li><a href="#">Marketing</a></li>
        </ul>
    </div>
    <!-- End sidebar tags-->
</div>
