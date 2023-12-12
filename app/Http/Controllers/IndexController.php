<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\News;

class IndexController extends Controller
{
   
   public function index(){
        
       // $menu = Menu::orderBy('sort_id','Asc')->where('status',1)->get()->toArray();
        $banner = News::orderBy('id','Desc')->where('status',1)->where('banner_news',1)->limit(3)->get()->toArray();
        $sidebanner = News::orderBy('id','Desc')->where('status',1)->where('banner_news',1)->limit(5)->get()->toArray();
        $whatsNew = News::orderBy('id','Desc')->where('status',1)->limit(5)->get()->toArray();
        $trending = News::orderBy('id','Desc')->where('trending',1)->limit(10)->get()->toArray();
        $popular = News::orderBy('id','Desc')->where('popular',1)->limit(10)->get()->toArray();
        $news = News::orderBy('id','Desc')->limit(10)->get()->toArray();
        return view('front.index',compact('banner','sidebanner','whatsNew','trending','popular','news'));

   }

   
   public function category($url){
        
        $menu_id = Menu::select('id')->where('slug',$url)->first();
        $allnews = News::where(['menu_id'=>$menu_id->id,'status'=>['1']])->orderBy('id','Desc')->paginate(4);
        
        return view('front.menus',compact('allnews'));

   }

   public function news($url)
   {
      
      $details = News::where(['news_slug'=>$url,'status'=>['1']])->first()->toArray();
      $subject_ids = News::where('news_slug', $url)->pluck('id');
      $previous_record = News::where('id', '<', $subject_ids)->orderBy('id','desc')->first();
      $next_record = News::where('id', '>', $subject_ids)->orderBy('id')->first();

  
     
     return view('front.details',compact('details','previous_record','next_record'));
   }


}
