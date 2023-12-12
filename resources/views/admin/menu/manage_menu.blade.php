@extends('admin.layout.layout')
@section('content')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage Menu</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manage Menu</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<div class="container">
    <div class="row">
        <div class="col-md-4">

            <ul class="sort_menu list-group">
                @foreach ($menu as $row)
                <li class="list-group-item" data-id="{{$row['id']}}">
                    <span class="handle"></span> {{$row['name']}}
                    &nbsp;&nbsp; |  &nbsp;&nbsp;
                    <span><a href="{{ url('admin/edit-menu/'.$row['id']) }}"><i class="fas fa-edit"></i></a></span>
                    
                     &nbsp;&nbsp; |  &nbsp;&nbsp;
                    <span>
                        
                       @if($row['status'])
                          <a class="updateMenuStatus" id="menu-{{ $row['id'] }}" menu_id="{{ $row['id'] }}" href="javascript:void(0)">
                          <i class="fas fa-check text-success" status="Active"></i></a>
                        @else
                           <a class="updateMenuStatus" id="menu-{{ $row['id'] }}" 
                          menu_id="{{ $row['id'] }}" href="javascript:void(0)">
                          <i class="fas fa-check text-danger"
                          status="InActive"></i></a>
                        @endif

                   </span>
                    &nbsp;&nbsp; |  &nbsp;&nbsp;
                    <span><a title="menu" class="confirmDelete" module="menu"
                             moduleid="{{ $row['id'] }}" href="javascript:void(0)"><i class="fa fa-trash"></i></a>
                    </span>

               
                </li>
                @endforeach
            </ul>

        </div>
    </div>
</div>
<style>
    .list-group-item {
        display: flex;
        align-items: center;
    }

    .highlight {
        background: #f7e7d3;
        min-height: 30px;
        list-style-type: none;
    }

    .handle {
        min-width: 18px;
        background: #607D8B;
        height: 15px;
        display: inline-block;
        cursor: move;
        margin-right: 10px;
    }
</style>
@endsection