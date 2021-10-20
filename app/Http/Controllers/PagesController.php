<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Item;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    protected $module = [];
    public function __construct(Request $request)
    {
        $this->module = $request->segment(1);
    }

    public function index()
    {
        $page_title = 'Công ty cổ phần thương mại điện tử DKT';

        $news = $this->getNews(3);

        $my_service = $this->getMyService();

        $business_areas = $this->getBusinessAreas();

        $leadership_banner = $this->getLeaderShipBanner();

        $partner_banner = $this->getPartnerBanner();

        $our_value_banner = $this->getOurValueBanner();

        return view('frontend.index',compact(
            'page_title',
            'news',
            'my_service',
            'business_areas',
            'leadership_banner',
            'partner_banner',
            'our_value_banner'
        ));
    }

    public function getPartnerBanner($limit=4)
    {
        return Item::where('module','advertisement')
            ->where('position','partner_banner')
            ->where('status','1')
            ->orderBy('created_at','ASC')
            ->limit($limit)
            ->get([
                'title',
                'image',
                'description',
                'content'
            ]);
    }

    public function getNews($limit = 5)
    {
        return Item::where('module','article')
            ->where('status','1')
            ->orderBy('created_at','ASC')
            ->limit($limit)
            ->get([
                'title',
                'image',
                'url',
                'created_at',
            ]);
    }

    public function getNewsForBlog()
    {
        return Item::with('user')
            ->where('module','article')
            ->where('status','1')
            ->orderBy('created_at','ASC')
            ->paginate(4,[
                'author_id',
                'title',
                'image',
                'url',
                'description',
                'created_at'
            ]);
    }

    public function getMyService($limit = 6)
    {
        return Item::where('module','advertisement')
            ->where('position','my_service')
            ->where('status','1')
            ->limit($limit)
            ->get([
                'title',
                'image',
                'description'
            ]);
    }

    public function getBusinessAreas($limit = 4)
    {
        return Item::where('module','advertisement')
            ->where('position','business_areas')
            ->where('status','1')
            ->limit($limit)
            ->get([
                'title',
                'image',
                'description'
            ]);
    }

    public function getTopViewNews($limit = 5)
    {
       return Item::where('module','article')
            ->where('status','1')
            ->orderBy('totalviews','DESC')
            ->limit($limit)
            ->get([
                'title',
                'image',
                'created_at'
            ]);
    }

    public function getLeaderShipBanner($limit = 5)
    {
        return Item::where('module','advertisement')
            ->where('position','leadership_banner')
            ->where('status','1')
            ->limit($limit)
            ->get([
                'title',
                'image',
                'description',
                'content',

            ]);
    }

    public function getOurValueBanner($limit = 3)
    {
        return Item::where('module','advertisement')
            ->where('position','our_value_banner')
            ->where('status','1')
            ->limit($limit)
            ->get([
                'title',
                'image',
                'description',
            ]);
    }

    public function showNewsBySlug($slug)
    {
        $page_title = 'Trang tin tức';
        $categories_news = Group::where('module','article-list')->get();
        $category = Group::with('item')->where('slug',$slug)->get();
        $news = $category[0]->item()->paginate(3);
        $top_view = Item::where('module','article')->orderBy('totalviews','DESC')->paginate(5);
        return view('frontend.blog',compact('page_title','news','top_view','categories_news'));
    }

    public function showNews()
    {
        $page_title = 'Trang tin tức';
        $news = $this->getNewsForBlog();
        $top_view = $this->getTopViewNews();
        $categories_news = Group::where('module','article-list')->get(['url','title']);
        return view('frontend.blog',compact('news','page_title','top_view','categories_news'));
    }

    public function showDetailNews($slug)
    {
        $page_title = 'Trang tin tức';
        $categories_news = Group::where('module','article-list')->get(['url','title']);
        $news = Item::with('user')
            ->where('slug',$slug)
            ->get([
                'id',
                'image',
                'title',
                'description',
                'content',
                'totalviews',
                'author_id',
                'created_at'
            ]);
        $top_view = $this->getTopViewNews();
        return view('frontend.blog-single',compact('page_title','news','top_view','categories_news'));
    }

    public function filterNews(Request $request)
    {
        $keyword = $request->keyword;
        $page_title = 'Trang tin tức';
        $news = Item::with('user')->where('module','article')->where('status','1')->where('title','LIKE','%'.$keyword.'%')->paginate(3);
        $top_view = $this->getTopViewNews();
        $categories_news = Group::where('module','article')->get();
        return view('frontend.blog',compact('news','page_title','top_view','categories_news'));
    }

    public function quickSearch(Request $request)
    {
        $items = Item::where('title','LIKE','%'.$request->get('query').'%')->get();
        return view('layout.partials.extras._quick_search_result',compact('items'));
    }
}
