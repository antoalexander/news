@extends('admin.layout.layout')
@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>All News</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item">
          	<a href="{{ url('admin/dashboard') }}">Home</a>
            </li>
            <li class="breadcrumb-item active">
            	<a href="{{ url('admin/add-news') }}">Add News</a>
            </li>
        </ol>
      </div>
    </div>
  </div><!-- 
  	/.container-fluid -->
</section>

<section class="content">
<div class="container-fluid">
    <div class="row">
      <div class="col-md-12">

         <div class="card">
              <div class="card-header">
                <h3 class="card-title">All News</h3>
              </div>
              
              <!-- /.card-header -->
              <div class="card-body">
                @if(Session::has('error_message'))
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error: </strong> {{ Session::get('error_message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              @endif

               @if(Session::has('success_message'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ Session::get('success_message') }}</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              @endif
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Image</th>
                      <th>Title</th>
                      <th>Status</th>
                      <th>Banner</th>
                      <th>Latest</th>
                      <th>Plr</th>
                      <th>Trdg</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($allnews as $key => $al_news)
                    <tr>
                      <td>{{ $key+1 }}</td>
                      <td class="all_news_image">
                        <img alt="{{ $al_news->news_title }}"  src="{{ asset('upload/small/'.$al_news->news_image) }}">
                       </td>
                      <td>{{ $al_news->news_title }}</td>
                      <td>
                        
                         @if($al_news->status)
                          <a  class="updateNewsStatus" id="news-{{ $al_news->id }}"
                            news_id="{{ $al_news->id }}" href="javascript:void(0)">
                          <i title="Active" class="fas fa-check text-success" status="Active"></i></a>
                         @else
                          <a class="updateNewsStatus" id="news-{{ $al_news->id }}" 
                            news_id="{{ $al_news->id }}" href="javascript:void(0)">
                            <i title="InActive" class="fas fa-check text-danger"
                            status="InActive"></i>
                          </a>
                         @endif
                        </td>
                        <td>
                         @if($al_news->banner_news)
                          <a title="Banner" class="updateBannerNewsStatus"
                          id="banner-{{ $al_news->id }}"
                          banner_id="{{ $al_news->id }}"
                          href="javascript:void(0)">
                          <i title="Banner" class="fas fa-check text-success" status="Active"></i></a>
                         @else
                          <a title="Banner" class="updateBannerNewsStatus"
                          id="banner-{{ $al_news->id }}" 
                          banner_id="{{ $al_news->id }}"
                          href="javascript:void(0)">
                          <i title="Banner" class="fas fa-check text-danger"
                          status="InActive"></i></a>
                         @endif

                      </td>
                      <td>
                      @if($al_news->latest_news)
                          <a title="Latest News" class="updateLatestNewsStatus" id="latest-{{ $al_news->id }}"
                            latest_id="{{ $al_news->id }}" href="javascript:void(0)">
                          <i title="Latest News"  class="fas fa-check text-success" status="Active"></i></a>
                         @else
                          <a title="Latest News" class="updateLatestNewsStatus" id="latest-{{ $al_news->id }}" 
                          latest_id="{{ $al_news->id }}" href="javascript:void(0)">
                          <i title="Latest News" class="fas fa-check text-danger"
                          status="InActive"></i></a>
                         @endif

                       
                       </td>

                       <td>
                       @if($al_news->popular)
                          <a title="Popular News" class="updatePopularNewsStatus" id="popular-{{ $al_news->id }}"
                          popular_id="{{ $al_news->id }}" href="javascript:void(0)">
                          <i title="Popular News"  class="fas fa-check text-success" status="Active"></i></a>
                         @else
                          <a title="Popular News" class="updatePopularNewsStatus" id="popular-{{ $al_news->id }}" 
                          popular_id="{{ $al_news->id }}" href="javascript:void(0)">
                          <i title="Popular News" class="fas fa-check text-danger"
                          status="InActive"></i></a>
                         @endif
                       </td>

                       <td>
                         @if($al_news->trending)
                          <a title="Trending News" class="updateTrendingNewsStatus" id="trending-{{ $al_news->id }}"
                          trending_id="{{ $al_news->id }}" href="javascript:void(0)">
                          <i title="Trending News"  class="fas fa-check text-success" status="Active"></i></a>
                         @else
                          <a title="Trending News" class="updateTrendingNewsStatus" id="trending-{{ $al_news->id }}" 
                          trending_id="{{ $al_news->id }}" href="javascript:void(0)">
                          <i title="Trending News" class="fas fa-check text-danger"
                          status="InActive"></i></a>
                         @endif
                       </td>
                     
                       <td>
                          <a href="{{ url('admin/edit-news/'.$al_news->id) }}">
                              <i class="fas fa-edit"></i>
                          </a> &nbsp;&nbsp;
                         <a title="news delete" class="confirmDelete" module="news"
                             moduleid="{{ $al_news->id }}" href="javascript:void(0)" >
                            <i class="fa fa-trash" aria-hidden="true"></i>
                         </a> &nbsp;&nbsp;
                      </td>
                    </tr>
                     @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  {!! $allnews->links() !!}
                </ul>
              </div>
            </div>
      </div>
    </div>
</div>
</section>
@endsection