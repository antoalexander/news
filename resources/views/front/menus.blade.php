@extends('front.layout.layout')
@section('content')
<main>
<!-- About US Start -->
<div class="about-area2 gray-bg pt-60 pb-60">
<div class="container">
<div class="row">
<div class="col-lg-8">
<div class="whats-news-wrapper">

<div class="row">
    <div class="col-12">
        <!-- Nav Card -->
            
        <div class="row">
	         @foreach($allnews as $an)
	            <div class="col-xl-6 col-lg-6 col-md-6">
	                <div class="whats-news-single mb-40 mb-40">
	                    <div class="whates-img">
	                        <img src="{{ asset('upload/small/'.$an['news_image']) }}"
	                        alt="{{ $an['news_title']  }}">

	                    </div>
	                    <div class="whates-caption whates-caption2">
	                        <h4><a href="{{ url('news/'.$an['news_slug'])}}">{{ $an['news_title']}}</a></h4>
	                        <span>{{  date('d-m-Y', strtotime($an['created_at'])); }}</span>
	                        <p>{{ substr(strip_tags($an['full_news']), 0, 250)}}</p>
	                    </div>
	                </div>
	            </div>
	        @endforeach
        </div>
        
    </div>
</div>
</div>
</div>
<div class="col-lg-4">
<!-- Flow Socail -->
<div class="single-follow mb-45">
<div class="single-box">
    <div class="follow-us d-flex align-items-center">
        <div class="follow-social">
            <a href="https://www.facebook.com/Newsnow4tamil/"><img src="{{ asset('assets/img/news/icon-fb.png') }}" alt=""></a>
        </div>
        <div class="follow-count">  
            <span>8,045</span>
            <p>Fans</p>
        </div>
    </div> 
    <div class="follow-us d-flex align-items-center">
        <div class="follow-social">
            <a href="#"><img src="{{ asset('assets/img/news/icon-tw.png') }}" alt=""></a>
        </div>
        <div class="follow-count">
            <span>8,045</span>
            <p>Fans</p>
        </div>
    </div>
        <div class="follow-us d-flex align-items-center">
        <div class="follow-social">
            <a href="#"><img src="{{ asset('assets/img/news/icon-ins.png') }}" alt=""></a>
        </div>
        <div class="follow-count">
            <span>8,045</span>
            <p>Fans</p>
        </div>
    </div>
    <div class="follow-us d-flex align-items-center">
        <div class="follow-social">
            <a href="#"><img src="{{ asset('assets/img/news/icon-yo.png') }}" alt=""></a>
        </div>
        <div class="follow-count">
            <span>8,045</span>
            <p>Fans</p>
        </div>
    </div>
</div>
</div>
<!-- New Poster -->
<div class="news-poster d-none d-lg-block">
<img src="{{ asset('assets/img/news/news_card.jpg')}}" alt="">
</div>
</div>
</div>
</div>
</div>
<!-- About US End -->
<!--Start pagination -->
<div class="pagination-area  gray-bg pb-45">
<div class="container">
<div class="row">
<div class="col-xl-12">
<div class="single-wrap">
<nav aria-label="Page navigation example">
<ul class="pagination justify-content-start">
<li class="page-item">
	
    <!-- SVG icon -->
      {!! $allnews->links() !!}
</a>
</li>
</ul>
</nav>
</div>
</div>
</div>
</div>
</div>
<!-- End pagination  -->
</main>
@endsection