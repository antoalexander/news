<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\News;
use App\Models\Video;
use App\Models\Menu;
use Image;
use Auth;

class NewsController extends Controller
{
    
    public function allNews(){
         $title = "All News";
         $allnews = News::orderBy('id','Desc')->paginate(10);
         return view('admin.news.all_news',compact('allnews','title'));
    }

    public function addNews(){
        $title = "Add News";
        $menu = Menu::where('status',1)->get();
        return view('admin.news.add_news',compact('title','menu'));
    }

    public function storeNews(Request $request){
         $data = $request->all();
          
       // echo "<pre>"; print_r($data); exit;

         $rules = [
             'menu_id' => 'required',
             'news_title' => 'required',
             'news_slug' =>'required',
             'news_image' => 'required',
             'full_news' => 'required',
         ];

         $custom_messages = [
             'news_title.required' => 'News Title Is required',
             'news_slug.required' => 'News Slug Required',
             'news_image.required' => 'News Image Required',
             'full_news.required' => 'News Details Required'
         ];

         $this->validate($request,$rules,$custom_messages);

         $newss = new News;
         // upload news image after resize
         if($request->hasFile('news_image')){
            $image_tmp = $request->file('news_image');
            if($image_tmp->isValid())
            {
                // upload image after resize
                //Get Image Extension
                $extension = $image_tmp->getClientOriginalExtension();
                //Generate New Image Name
                $imageName = rand(111,999999).'.'.$extension;
                $largeImagePath = 'upload/large/'.$imageName;
                $mediumImagePath = 'upload/medium/'.$imageName;
                $smallImagePath = 'upload/small/'.$imageName;
                // Upload the large, medium small image after resize
                Image::make($image_tmp)->resize(770,662)->save($largeImagePath);
                Image::make($image_tmp)->resize(370,396)->save($mediumImagePath);
                Image::make($image_tmp)->resize(270,216)->save($smallImagePath);
                // Insert image name in product table
                $newss->news_image = $imageName;
            }

         }

         $newss->news_title = $data['news_title'];
         $newss->menu_id = $data['menu_id'];
         $newss->news_slug=strtolower(str_replace(' ','-',$data['news_slug'])); 
         $newss->full_news = $data['full_news'];
         $newss->status = '1';
         $newss->latest_news = '1';
         $newss->banner_news = '1';
         $newss->created_by = Auth::guard('admin')->user()->name;
         $newss->save();
         
          $message = "News added successfully!";
          $menu = Menu::where('status',1)->get();
         return redirect('admin/all-news')->with('success_message',$message);

    }


    public function editNews($id){
         $title = "Edit News";
         $menu = Menu::where('status',1)->get();
         $news = News::findOrFail($id);
         return view('admin.news.edit_news',compact('news','title','menu'));
    }

    public function updateNews(Request $request){
          //echo "<pre>"; print_r($data); die;
          
           $news_id = $request->id;
           $old_img = $request->old_image;
           
        if($request->file('news_image')){
            $image_tmp = $request->file('news_image');
            $extension = $image_tmp->getClientOriginalExtension();
            //Generate New Image Name
            $imageName = rand(111,999999).'.'.$extension;
            $largeImagePath = 'upload/large/'.$imageName;
            $mediumImagePath = 'upload/medium/'.$imageName;
            $smallImagePath = 'upload/small/'.$imageName;
            // Upload the large, medium small image after resize
            Image::make($image_tmp)->resize(770,662)->save($largeImagePath);
            Image::make($image_tmp)->resize(370,396)->save($mediumImagePath);
            Image::make($image_tmp)->resize(270,216)->save($smallImagePath);
            // Insert image name in product table
            
          
            if(file_exists('upload/large/'.$old_img)){
                unlink('upload/large/'.$old_img);
            }
            if(file_exists('upload/medium/'.$old_img)){
                unlink('upload/medium/'.$old_img);
            }
            if(file_exists('upload/small/'.$old_img)){
                unlink('upload/small/'.$old_img);
            }
               
            News::findOrFail($news_id)->update([
               'news_title' => $request->news_title,
               'news_slug' => strtolower(str_replace(' ','-',$request->news_slug)),
               'menu_id' => $request->menu_id,
               'news_image' => $imageName,
               'full_news' => $request->full_news,
               'updated_at' => Carbon::now()
            ]);

       }
       else{
         // echo "<pre>"; print_r($request->all()); die;
           News::findOrFail($news_id)->update([
               'news_title' => $request->news_title,
               'news_slug' => strtolower(str_replace(' ','-',$request->news_slug)),
               'menu_id' => $request->menu_id,
               'full_news' => $request->full_news,
               'updated_at' => Carbon::now()
            ]);

        } // End Method
      
        $message = "News Updated successfully!";
        return redirect('admin/all-news')->with('success_message',$message);


    }

    public function updateNewsStatus(Request $request){
       
        if($request->ajax()){
            $data = $request->all();
           // echo "<pre>"; print_r($data); die;
            if($data['status']=="Active"){
                $status = 0;
            }
            else{
                $status = 1;
            }
            
            News::where('id',$data['news_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'news_id'=>$data['news_id']]);


        }
        
    }

     public function updateLatestNewsStatus(Request $request){
       
        if($request->ajax()){
            $data = $request->all();
           // echo "<pre>"; print_r($data); die;
            if($data['status']=="Active"){
                $status = 0;
            }
            else{
                $status = 1;
            }
            
            News::where('id',$data['latest_id'])->update(['latest_news'=>$status]);
            return response()->json(['lastest_status'=>$status,'latest_id'=>$data['latest_id']]);
        }
    }

    public function updateBannerStatus(Request $request){
       
        if($request->ajax()){
            $data = $request->all();
           // echo "<pre>"; print_r($data); die;
            if($data['status']=="Active"){
                $status = 0;
            }
            else{
                $status = 1;
            }
            
            News::where('id',$data['banner_id'])->update(['banner_news'=>$status]);
            return response()->json(['banner_status'=>$status,'banner_id'=>$data['banner_id']]);
        }
     
    }

    public function updatePopularStatus(Request $request){
       
        if($request->ajax()){
            $data = $request->all();
           // echo "<pre>"; print_r($data); die;
            if($data['status']=="Active"){
                $status = 0;
            }
            else{
                $status = 1;
            }
            
            News::where('id',$data['popular_id'])->update(['popular'=>$status]);
            return response()->json(['popular_status'=>$status,'popular_id'=>$data['popular_id']]);
        }
     
    }

    public function updateTrendingStatus(Request $request){
       
        if($request->ajax()){
            $data = $request->all();
           // echo "<pre>"; print_r($data); die;
            if($data['status']=="Active"){
                $status = 0;
            }
            else{
                $status = 1;
            }
            
            News::where('id',$data['trending_id'])->update(['trending'=>$status]);
            return response()->json(['trending_status'=>$status,'trending_id'=>$data['trending_id']]);
        }
     
    }

    
    
   
  
    public function deleteNews($id){
        //delete brand
        News::where('id',$id)->delete();
        $notification = array(
            'message' => 'News Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect('admin/all-news')->with($notification); 
    }
    
    /***************************** videos start************************/
    
    public function allVideo(){
      $title = "All Video";
      $video = Video::paginate(10);
      return view('admin.video.all_video',compact('video','title'));
   }

   public function addVideo(){
       $title = "Add Video";
       return view('admin.video.add_video',compact('title'));
   }
   
   public function storeVideo(Request $request){
       
        Video::insert([
            'video_title' => $request->video_title,
            'video_url' => $request->video_url,
            'status' => '1',    
            'created_at' => Carbon::now(), 
        ]);

       $notification = array(
            'message' => 'Video Details Inserted Successfully',
            'alert-type' => 'success'
        );
       
       return redirect('admin/all-video')->with($notification); 

   }
   
   public function editVideo($id){
       $title = "Edit Video";
       $video = Video::findOrFail($id);
       return view('admin.video.edit_video',compact('video','title'));
   }

   public function updateVideo(Request $request){
        $video_id = $request->id; 

       Video::findOrFail($video_id)->update([
            'video_title' => $request->video_title,
            'video_url' => $request->video_url,
            'updated_at' => Carbon::now(), 
        ]);
        
        $notification = array(
            'message' => 'Video Details Updated Successfully',
            'alert-type' => 'success'
        );
       
        return redirect('admin/all-video')->with($notification);
       
   }

   public function updateVideoStatus(Request $request){
       
        if($request->ajax()){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            if($data['status']=="Active")
            {
                $status = 0;
            }
            else
            {
                $status = 1;
            }
            Video::where('id',$data['video_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'video_id'=>$data['video_id']]);
        }
        
    }

  

   public function deleteVideo($id){
        //delete brand
        Video::where('id',$id)->delete();
      
        $notification = array(
            'message' => 'Video Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect('admin/all-video')->with($notification); 
       }
  

    /***************************** videos end************************/
    
    
}
