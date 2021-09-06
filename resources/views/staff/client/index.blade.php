@extends('staff.main.app')
@section('content')
<?php $page = substr((Route::currentRouteName()), 6, strpos(str_replace('admin.','',Route::currentRouteName()), ".")); ?>
<section class="content-header"></section>
<section class="content">
  <div class="card">
    <div class="card-header">
      <a href="{{route('staff.client.create')}}" class="btn btn-sm btn-info text-capitalize rounded-0">Add Client </a>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="card-refresh" data-source="{{request()->url()}}" data-source-selector="#card-refresh-content"><i class="fas fa-sync-alt"></i></button>
        <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-bordered table-hover my-0 table-sm">
        <thead class="bg-dark">
          <tr class="text-center">
            <th width="5%">SN</th>
            <th>Full Name</th>
            <th>Phone No</th>
            <th>Address</th>
            <th>Email</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead> 
        @foreach($clients as $key=>$data)             
        <tr class="text-center">
          <td>{{$key+1}}</td>
          <td>{{$data->fullname}}</td>
          <td>{{$data->phone}}</td>
          <td>{{$data->address}}</td>
          <td>{{$data->email}}</td>
          <td>
            
          </td>
          <td>
            
          </td>
        </tr>
        @endforeach
      </table>
    </div>
  </div>
</section>
@endsection
