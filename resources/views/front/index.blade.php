
@extends('front.layout.layout')
@section('content')

<main>
<!-- Trending Area Start -->
<div class="trending-area fix pt-25 gray-bg">
<div class="container">
<div class="trending-main">
<div class="row">

<div class="col-lg-8">
<!-- Trending Top -->
<div class="slider-active">
<!-- Single -->
@foreach($banner as $b)
<div class="single-slider">
    <div class="trending-top mb-30">
        <div class="trend-top-img">
            <img src="upload/large/{{ $b['news_image']}}" alt="">
            <div class="trend-top-cap">
                <span class="bgr" data-animation="fadeInUp" data-delay=".2s" data-duration="1000ms"></span>
                <h2><a href="{{ url('news/'.$b['news_slug'])}}" data-animation="fadeInUp" data-delay=".4s" data-duration="1000ms">{{ $b['news_title']}}</a></h2>
                <p data-animation="fadeInUp" data-delay=".6s" data-duration="1000ms">{{  date('d-m-Y', strtotime($b['created_at'])); }}</p>
            </div>
        </div>
    </div>
</div>
@endforeach

</div>
</div>
<!-- Right content -->
<div class="col-lg-4">
<!-- Trending Top -->
<div class="row">
@foreach($sidebanner  as $key => $sb)

@if($key==3)
<div class="col-lg-12 col-md-6 col-sm-6">
    <div class="trending-top mb-30">
        <div class="trend-top-img">
            <img src="upload/medium/{{ $sb['news_image']}}" alt="">
            <div class="trend-top-cap trend-top-cap2">
                <span class="bgb">FASHION</span>
                <h2><a href="latest_news.html">Secretart for Economic Air
                    plane that looks like</a></h2>
                <p>by Alice cloe   -   Jun 19, 2020</p>
            </div>
        </div>
    </div>
</div>
@endif

@if($key==4)
<div class="col-lg-12 col-md-6 col-sm-6">
    <div class="trending-top mb-30">
        <div class="trend-top-img">
            <img src="upload/small/{{ $sb['news_image']}}" width="370" height="238" alt="">
            <div class="trend-top-cap trend-top-cap2">
                <span class="bgg">TECH </span>
                <h2><a href="latest_news.html">Secretart for Economic Air plane that looks like</a></h2>
                <p>by Alice cloe   -   Jun 19, 2020</p>
            </div>
        </div>
    </div>
</div>
@endif

@endforeach
</div>
</div>
</div>
</div>
</div>
</div>
<!-- Trending Area End -->
<!-- Whats New Start -->
<section class="whats-news-area pt-50 pb-20 gray-bg">
<div class="container">
<div class="row">
<div class="col-lg-8">
<div class="whats-news-wrapper">
<!-- Heading & Nav Button -->
<div class="row justify-content-between align-items-end mb-15">
<div class="col-xl-4">
<div class="section-tittle mb-30">
    <h3>Whats New</h3>
</div>
</div>
<div class="col-xl-8 col-md-9">
<div class="properties__button">
    <!--Nav Button  -->                                            
  
    <!--End Nav Button  -->
</div>
</div>
</div>
<!-- Tab content -->
<div class="row">
<div class="col-12">
<!-- Nav Card -->
<div class="tab-content" id="nav-tabContent">
    <!-- card one -->
    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">       
        <div class="row">
            <!-- Left Details Caption -->
            @foreach($whatsNew as $key => $wn) 
            @if($key==0)
            <div class="col-xl-6 col-lg-12">
             
              
                <div class="whats-news-single mb-40 mb-40">
                    <div class="whates-img">
                        <img src="upload/small/{{ $wn['news_image']}}" alt="">
                    </div>
                    <div class="whates-caption">
                        <h4><a href="{{ url('news/'.$wn['news_slug'])}}">{{ $wn['news_title']}}</a></h4>
                        <span>{{  date('d-m-Y', strtotime($wn['created_at'])); }}</span>
                        <p>{{ substr(strip_tags($wn['full_news']), 0, 250)}}...</p>
                        
                    </div>
                </div>
             
            </div>
            @endif
            @endforeach
             
            <!-- Right single caption -->
            
            <div class="col-xl-6 col-lg-12">
                <div class="row">
                    <!-- single -->
                @foreach($whatsNew as $key => $wn) 
                    @if($key>0)
                            <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                <div class="whats-right-single mb-20">
                                    <div class="whats-right-img">
                                        <img src="upload/small/{{ $wn['news_image']}}" width="124" height="104" alt="">
                                    </div>
                                    <div class="whats-right-cap">
                                        <span class="colorb">FASHION</span>
                                        <h4><a href="{{ url('news/'.$wn['news_slug'])}}" >{{ $wn['news_title']}}</a></h4>
                                        <p>{{  date('d-m-Y', strtotime($wn['created_at'])); }}</p> 
                                    </div>
                                </div>
                            </div>
                            @endif
                  @endforeach
                </div>
            </div>
           
          
        </div>
    </div>
 
</div>
<!-- End Nav Card -->
</div>
</div>
</div>
<!-- Banner -->
<div class="banner-one mt-20 mb-30">
<img src="assets/img/gallery/body_card1.png" alt="">
</div>
</div>
<div class="col-lg-4">
<!-- Flow Socail -->
<div class="single-follow mb-45">
<div class="single-box">
<div class="follow-us d-flex align-items-center">
    <div class="follow-social">
        <a href="#"><img src="assets/img/news/icon-fb.png" alt=""></a>
    </div>
    <div class="follow-count">  
        <span>8,045</span>
        <p>Fans</p>
    </div>
</div> 
<div class="follow-us d-flex align-items-center">
    <div class="follow-social">
        <a href="#"><img src="assets/img/news/icon-tw.png" alt=""></a>
    </div>
    <div class="follow-count">
        <span>8,045</span>
        <p>Fans</p>
    </div>
</div>
    <div class="follow-us d-flex align-items-center">
    <div class="follow-social">
        <a href="#"><img src="assets/img/news/icon-ins.png" alt=""></a>
    </div>
    <div class="follow-count">
        <span>8,045</span>
        <p>Fans</p>
    </div>
</div>
<div class="follow-us d-flex align-items-center">
    <div class="follow-social">
        <a href="#"><img src="assets/img/news/icon-yo.png" alt=""></a>
    </div>
    <div class="follow-count">
        <span>8,045</span>
        <p>Fans</p>
    </div>
</div>
</div>
</div>
<!-- Most Recent Area -->


<div class="home-banner2 d-none d-lg-block">
<img src="assets/img/gallery/body_card2.png" alt="">
</div>
</div>
</div>
</div>
</section>
<!-- Whats New End -->
<!--   Weekly2-News start -->
<div class="weekly2-news-area pt-50 pb-30 gray-bg">
<div class="container">
<div class="weekly2-wrapper">
<div class="row">
<!-- Banner -->
<div class="col-lg-3">
<div class="home-banner2 d-none d-lg-block">
<img src="assets/img/gallery/body_card2.png" alt="">
</div>
</div>
<div class="col-lg-9">
<div class="slider-wrapper">
<!-- section Tittle -->
<div class="row">
    <div class="col-lg-12">
        <div class="small-tittle mb-30">
            <h4>Most Popular</h4>
        </div>
    </div>
</div>
<!-- Slider -->
<div class="row">
    <div class="col-lg-12">
        <div class="weekly2-news-active d-flex">
            <!-- Single -->
            @foreach($popular as $pop)
            <div class="weekly2-single">
                <div class="weekly2-img">
                    <img src="upload/small/{{ $pop['news_image']}}" alt="">
                </div>
                <div class="weekly2-caption">
                    <h4><a href="{{ url('news/'.$pop['news_slug'])}}">{{ $pop['news_title']}}</a></h4>
                    <p>{{  date('d-m-Y', strtotime($pop['created_at'])); }}</p>
                </div>
            </div> 
          @endforeach
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>           
<!-- End Weekly-News -->
<!--  Recent Articles start -->
<div class="recent-articles pt-80 pb-80">
<div class="container">
<div class="recent-wrapper">
<!-- section Tittle -->
<div class="row">
<div class="col-lg-12">
<div class="section-tittle mb-30">
<h3>Trending  News</h3>
</div>
</div>
</div>
<div class="row">
<div class="col-12">
<div class="recent-active dot-style d-flex dot-style">
<!-- Single -->
@foreach($trending as $tr)
<div class="single-recent">
    <div class="what-img">
        <img src="upload/medium/{{ $tr['news_image']}}" alt="">
    </div>
    <div class="what-cap">
  <h4><a href="{{ url('news/'.$tr['news_slug'])}}">
  {{ $tr['news_title']}}</a></h4>
        <P>{{  date('d-m-Y', strtotime($pop['created_at'])); }}</P>
        
    </div>
</div>
@endforeach
</div>
</div>
</div>
</div>
</div>
</div>           
<!--Recent Articles End -->
<!-- Start Video Area -->
<div class="youtube-area video-padding d-none d-sm-block">
<div class="container">
<div class="row">
<div class="col-12">
<div class="video-items-active">
<div class="video-items text-center">
<video controls>
    <source src="assets/video/news2.mp4" type="video/mp4">
    Your browser does not support the video tag.
</video>
</div>
<div class="video-items text-center">
<video controls>
    <source src="assets/video/news1.mp4" type="video/mp4">
    Your browser does not support the video tag.
</video>
</div>
<div class="video-items text-center">
<video controls>
    <source src="assets/video/news3.mp4" type="video/mp4">
    Your browser does not support the video tag.
</video>
</div>
<div class="video-items text-center">
<video controls>
    <source src="assets/video/news1.mp4" type="video/mp4">
    Your browser does not support the video tag.
</video>
</div>
<div class="video-items text-center">
<video controls>
    <source src="assets/video/news3.mp4" type="video/mp4">
    Your browser does not support the video tag.
</video>
</div>
</div>
</div>
</div>
<div class="video-info">
<div class="row">
<div class="col-12">
<div class="testmonial-nav text-center">
<div class="single-video">
    <video controls>
        <source src="assets/video/news2.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <div class="video-intro">
            <h4>Old Spondon News - 2020 </h4>
    </div>
</div>
<div class="single-video">
    <video controls>
        <source src="assets/video/news1.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <div class="video-intro">
        <h4>Banglades News Video </h4>
    </div>
</div>
<div class="single-video">
    <video controls>
        <source src="assets/video/news3.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <div class="video-intro">
        <h4>Latest Video - 2020 </h4>
    </div>
</div>
<div class="single-video">
    <video controls>
        <source src="assets/video/news1.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <div class="video-intro">
        <h4>Spondon News -2019 </h4>
    </div>
</div>
<div class="single-video">
    <video controls>
        <source src="assets/video/news3.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <div class="video-intro">
        <h4>Latest Video - 2020</h4>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div> 
<!-- End Start Video area-->
<!--   Weekly3-News start -->
<div class="weekly3-news-area pt-80 pb-130">
<div class="container">
<div class="weekly3-wrapper">
<div class="row">
<div class="col-lg-12">
<div class="slider-wrapper">
<!-- Slider -->
<div class="row">
    <div class="col-lg-12">
        <div class="weekly3-news-active dot-style d-flex">
           
        @foreach($news as $n)
           <div class="weekly3-single">
                <div class="weekly3-img">
                    <img src="upload/medium/{{ $n['news_image']}}" alt="">
                </div>
                <div class="weekly3-caption">
                    <a href="{{ url('news/'.$tr['news_slug'])}}">
                    <h4><a href="{{ url('news/'.$n['news_slug'])}}">{{ $n['news_title']}}</a></h4>
                    <p>{{  date('d-m-Y', strtotime($pop['created_at'])); }}</p>
                </div>
            </div> 
        @endforeach  
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>           
<!-- End Weekly-News -->
<!-- banner-last Start -->
<div class="banner-area gray-bg pt-90 pb-90">
<div class="container">
<div class="row justify-content-center">
<div class="col-lg-10 col-md-10">
<div class="banner-one">
<img src="assets/img/gallery/body_card3.png" alt="">
</div>
</div>
</div>
</div>
</div>
<!-- banner-last End -->
</main>


@endsection