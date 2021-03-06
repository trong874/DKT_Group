<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Item;
use App\Models\Setting;
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
        $page_title = Setting::where('name','title')->first('val')->val;

        $hero_banner = $this->getHeroBanner();

        $who_are_we_banner = $this->getWhoAreWeBanner();

        $environment_banner = $this->getEnvironmentBanner();

        $our_target_banner = $this->getOurTargetBanner();

        $general_intro_banner = $this->getGeneralIntro();

        $news = $this->getNews(5);

        $my_service = $this->getMyService();

        $the_number = $this->getTheNumber();

        $business_areas = $this->getBusinessAreas();

        $leadership_banner = $this->getLeaderShipBanner();

        $partner_banner = $this->getPartnerBanner();

        $our_value_banner = $this->getOurValueBanner();

        return view('frontend.index',$this->getConfigPage(),compact(
            'page_title',

            'hero_banner',

            'our_target_banner',

            'general_intro_banner',

            'environment_banner',

            'who_are_we_banner',

            'news',

            'my_service',

            'business_areas',

            'leadership_banner',

            'partner_banner',

            'our_value_banner',

            'the_number'
        ));
    }

    public function dashboardBackend()
    {
        return view('backend.dashboard');
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

    public function getGeneralIntro()
    {
        return Item::where('module','advertisement')
            ->where('position','general_intro')
            ->where('status','1')
            ->get([
                'title',
                'content',
                'image'
            ]);
    }

    public function getOurTargetBanner()
    {
        return Item::where('module','advertisement')
            ->where('position','our_target_banner')
            ->where('status','1')
            ->get([
                'title',
                'description',
                'image'
            ]);
    }

    public function getEnvironmentBanner()
    {
        return Item::where('module','advertisement')
            ->where('position','environment_banner')
            ->where('status','1')
            ->get([
                'title',
                'image'
            ]);
    }
    public function getHeroBanner()
    {
        return Item::where('module','advertisement')
            ->where('position','hero_banner')
            ->where('status','1')
            ->first([
                'title',
                'image',
                'description',
            ]);
    }

    public function getWhoAreWeBanner()
    {
        return Item::where('module','advertisement')
            ->where('position','who_are_we_banner')
            ->where('status','1')
            ->first([
                'title',
                'image',
                'description',
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
                'created_at',
                'url'
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
    public function getTheNumber($limit = 4)
    {
        return Item::where('module','advertisement')
            ->where('position','the_number')
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
        $page_title = 'Ho???t ?????ng n???i b???t';
        $description =  Setting::where('name','description')->first('val')->val;
        $categories_news = Group::where('module','article-list')->get();
        $category = Group::with('item')->where('slug',$slug)->get();
        $news = $category[0]->item()->paginate(3);
        $top_view = Item::where('module','article')->orderBy('totalviews','DESC')->paginate(5);
        return view('frontend.blog',$this->getConfigPage(),compact('page_title','news','top_view','categories_news','description'));
    }

    public function showNews()
    {
        $page_title = 'Ho???t ?????ng n???i b???t';
        $news = $this->getNewsForBlog();
        $top_view = $this->getTopViewNews();
        $categories_news = Group::where('module','article-list')->get(['url','title']);
        return view('frontend.blog',$this->getConfigPage(),compact('news','page_title','top_view','categories_news'));
    }

    public function showDetailNews($position,$slug)
    {
        $page_title = 'Trang tin t???c';
        $categories_news = Group::where('module','article-list')->get(['url','title']);
        $news = Item::with('user')
            ->where('slug',$slug)->where('position',$position)
            ->first([
                'id',
                'image',
                'title',
                'description',
                'content',
                'totalviews',
                'author_id',
                'created_at',
                'url'
            ]);
        $top_view = $this->getTopViewNews();
        return view('frontend.blog-single',$this->getConfigPage(),compact('page_title','news','top_view','categories_news'));
    }

    public function getConfigPage()
    {
        return [
          "description"=>  Setting::where('name','description')->first('val')->val,
            "address"=>Setting::where('name','address')->first('val')->val,
            "phone"=>Setting::where('name','phone')->first('val')->val,
            "email"=> Setting::where('name','email')->first('val')->val
        ];
    }

    public function filterNews(Request $request)
    {
        $keyword = $request->keyword;
        $page_title = 'Trang tin t???c';
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

    public function getRecuitmentForBlog()
    {
        return Item::with('user')
            ->where('module','article')
            ->where('position','recuitment')
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

    public function showRecruitment()
    {
        $page_title = 'Th??ng tin tuy???n d???ng';
        $recuitment = $this->getRecuitmentForBlog();
        $top_view = $this->getTopViewNews();
        $categories_news = Group::where('module','article-list')->where('slug','tuyen-dung')->get(['url','title']);
        return view('frontend.tuyendung',$this->getConfigPage(),compact('recuitment','top_view','page_title','categories_news'));    }
}
