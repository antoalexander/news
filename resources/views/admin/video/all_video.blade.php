@extends('admin.layout.layout')
@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>All Video</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item">
            <a href="{{ url('admin/dashboard') }}">Home</a>
            </li>
            <li class="breadcrumb-item active">
                <a href="{{ url('admin/add-video') }}">Add Video</a>
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
                <h3 class="card-title">All Video</h3>
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
                      <th>Title</th>
                      <th style="width: 110px">Status</th>
                      <th style="width: 100px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($video as $key => $al_video)
                    <tr>
                      <td>{{ $key+1 }}</td>
                      <td>{{ $al_video->video_title }}</td>
                      <td>
                        
                         @if($al_video->status)
                          <a  class="updateVideoStatus" id="video-{{ $al_video->id }}"
                            video_id="{{ $al_video->id }}" href="javascript:void(0)">
                          <i title="Active" class="fas fa-check text-success" status="Active"></i></a>
                         @else
                          <a class="updateVideoStatus" id="video-{{ $al_video->id }}" 
                            video_id="{{ $al_video->id }}" href="javascript:void(0)">
                            <i title="InActive" class="fas fa-check text-danger"
                            status="InActive"></i>
                          </a>
                         @endif
                        
                      </td>
                      <td>
                         
                        <a href="{{ url('admin/edit-video/'.$al_video->id) }}">
                              <i class="fas fa-edit"></i>
                          </a> &nbsp;&nbsp;

                         <a title="video delete" class="confirmDelete" module="video"
                             moduleid="{{ $al_video->id }}" href="javascript:void(0)" >
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
                  {!! $video->links() !!}
                </ul>
              </div>
            </div>
      </div>
    </div>
</div>
</section>
@endsection