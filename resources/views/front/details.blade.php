<?php 
  use App\Models\Menu;
  $menu = Menu::orderBy('sort_id','Asc')->where('status',1)->get()->toArray();
?>

@extends('front.layout.layout')
@section('content')
<?php 
use Illuminate\Support\Carbon;
?>
  <!--================Blog Area =================-->
  <section class="blog_area single-post-area section-padding">
      <div class="container">
         <div class="row">
            <div class="col-lg-8 posts-list">
               <div class="single-post">
                  <div class="feature-img">
                   
                  <img class="img-fluid" src="{{ asset('upload/large/'.$details['news_image']) }}" alt="">

                  </div>
                  <div class="blog_details">
                     <h2>{{ $details['news_title'] }}
                     </h2>
                     <ul class="blog-info-link mt-3 mb-4">
                          <?php 
                         $createdAt = Carbon::parse($details['created_at']);
              
                         ?>
                        <li><a href="#"><i class="fa fa-user"></i>{{ $createdAt->format('M d Y H:i' ); }}</a></li>
                        
                     </ul>
                     <p class="excert">
                        {{ strip_tags($details['full_news']) }}
                     </p>
                    
                    
                  </div>
               </div>
               <div class="navigation-top">
                  <div class="d-sm-flex justify-content-between text-center">
                   <?php 
                    $url = url('news/'.$details['news_slug']);
                    $shareComponent = \Share::page(
                        $url,
                        $details['news_title'],
                     )
                  ->facebook()
                  ->twitter()
                  ->linkedin()
                  ->telegram()
                  ->whatsapp()        
                  ->reddit();
                   ?>
                     <ul class="social-icons">
                        {!! $shareComponent !!}
                     </ul>
                  </div>
                  <div class="navigation-area">
                     <div class="row">
                        <div
                           class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                           <div class="thumb">
                              <a href="#">
                                 <img class="img-fluid" src="assets/img/post/preview.png" alt="">
                              </a>
                           </div>
                           <div class="">
                              <a href="#">
                                 <span class="lnr text-white ti-arrow-left"></span>
                              </a>
                           </div>
                           <div class="detials">
                             @if(isset($previous_record))
                               <a href="{{ url('news/'.$previous_record['news_slug'])}}">
                                  <p>Prev Post</p>
                               </a>
                              @endif
                           </div>
                        </div>
                        <div
                           class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                           <div class="detials">
                           @if (isset($next_record))

                             <a href="{{ url('news/'.$next_record['news_slug'])}}">
                               <p>Next Post</p>
                              </a>
                            @endif
                           </div>
                        
                        </div>
                     </div>
                  </div>
               </div>
            
               
            </div>
            <div class="col-lg-4">
               <div class="blog_right_sidebar">
                 
                  <aside class="single_sidebar_widget post_category_widget">
                     <h4 class="widget_title">Category</h4>
                     <ul class="list cat-list">
                      @foreach($menu as $m)
                        <li>
                           <a href="{{ url('category/'.$m['slug'])}}" class="d-flex">
                              <p>{{ $m['name'] }}</p>
                              <!-- <p>(37)</p> -->
                           </a>
                        </li>
                       @endforeach
                     </ul>
             
                  </aside>
                  <aside class="single_sidebar_widget popular_post_widget">
                   <div class="news-poster d-none d-lg-block">
                    <img src="{{ asset('assets/img/news/news_card.jpg')}}" alt="">
                  </div>
                  </aside>
              
               </div>
            </div>
         </div>
      </div>


   </section>
   <!--================ Blog Area end =================-->

   @endsection 