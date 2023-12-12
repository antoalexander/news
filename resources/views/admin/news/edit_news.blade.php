@extends('admin.layout.layout')
@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Edit News</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item">
          	<a href="{{ url('admin/dashboard') }}">Home</a>
            </li>
            <li class="breadcrumb-item active">
            	<a href="{{ url('admin/add-edit-news') }}">Add News</a></li>
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
         
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit News</h3>
              </div>
              <!-- /.card-header -->
                                   
		      @if ($errors->any())
		      <div class="alert alert-danger alert-dismissible fade show" role="alert">
		        @foreach ($errors->all() as $error)
		                      <li>{{ $error }}</li>
		                  @endforeach
		        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		       @endif
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
                <strong>Error: </strong> {{ Session::get('error_message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              @endif
              <!-- form start -->
              <form id="store_image" action="{{ url('admin/update-news') }}" method="post" enctype="multipart/form-data">@csrf
                <div class="card-body">

                  <input type="hidden" name="id" value="{{ $news->id }}">
                  <input type="hidden" name="old_image" value="{{ $news->news_image }}">
                  
                  <div class="form-group">
                    <select class="form-select form-control" name="menu_id" aria-label="Default select example">
                      
                      @foreach($menu as $m)
                      <option value="{{ $m->id }}" {{ $m->id == $news->menu_id ? 'selected': ''}}>{{ $m->name }}</option>
                      @endforeach
                    </select>
                  </div>
                
                  <div class="form-group">
                    <label for="news_title">News Title</label>
                    <input type="text" class="form-control" id="news_title"
                    value="{{ $news->news_title }}" name="news_title" placeholder="News Title">
                  </div>

                  <div class="form-group">
                    <label for="news_title">News Slug</label>
                    <input type="text" class="form-control"
                    value="{{ str_replace('-',' ',$news->news_slug) }}"
                    id="news_slug" name="news_slug" placeholder="News Slug(Should Be in English)" required>
                  </div>
                 
                 
                <div class="form-group">
                   <label for="news_image">News Image</label>
					        <input type="file" name="news_image"  class="form-control"  id="image"
					         value="{{ $news->news_image }}"  />
			        	</div>

			      	<div class="form-group">
                	<img id="showImage" src="{{ asset('upload/small/'.$news->news_image) }}" alt="Admin" style="width:100px;height:100px">
              </div>

              <div class="form-group">
               <textarea id="summernote" name="full_news" placeholder="Enter Full News Here" required>{{ $news->full_news }}</textarea>
              </div>

			        </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </div>
              </form>
            </div> 
      </div>
    </div>
  </div>
</section>



@endsection