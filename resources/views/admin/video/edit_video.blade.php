@extends('admin.layout.layout')
@section('content')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit video</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit video</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
         

            <!-- Horizontal Form -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Edit Video</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="{{ url('admin/update-video') }}" method="post">@csrf
                <div class="card-body">

                	<input type="hidden" name="id" value="{{ $video->id }}">

                  <div class="form-group row">
                    <label for="video_name" class="col-sm-2 col-form-label">Video Name</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="video_title"  name="video_title" placeholder="Enter Video Name" value="{{ $video->video_title }}" required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="video_url" class="col-sm-2 col-form-label">Video URL</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="video_url"  name="video_url" placeholder="Enter Video Name" value="{{ $video->video_url }}" required>
                    </div>
                  </div>


                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Submit</button>
                 
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
            <!-- /.card -->

          </div>
          <!--/.col (left) -->
        
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>


    @endsection