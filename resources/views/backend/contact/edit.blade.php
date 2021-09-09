@extends('backend.main.app')
@section('content')
<?php $page = substr((Route::currentRouteName()), 6, strpos(str_replace('admin.','',Route::currentRouteName()), ".")); ?>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6 pl-1">
        <h1 class="text-capitalize">Edit Contact</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
          <li class="breadcrumb-item active text-capitalize">{{ $page }} Page</li>
        </ol>
      </div>
    </div>
  </div>
</section>
<section class="content">
  <div class="card card-info">
    <form role="form" method="POST" action="{{route('admin.contact.update',$contacts->id)}}" class="validate" id="validate">
      <div class="card-body">
        {{ method_field('PUT') }}
        {{ csrf_field() }}
        <div class="row">
          <div class="form-group col-md-6">
            <label for="name">Full Name <span class="text-danger">*</span></label>
            <input type="text"  class="form-control max" id="name" placeholder="Enter fullname" name="name" autocomplete="off" value="{{$contacts->name}}">
          </div>
          <div class="form-group col-md-6">
            <label for="phone">Phone No:</label>
            <input type="text"  class="form-control max" id="phone" placeholder="Enter the phone" name="phone" autocomplete="off" value="{{$contacts->phone}}">
          </div>
          <div class="form-group col-md-6">
            <label for="email">Gmail:</label>
            <input type="text"  class="form-control max" id="email" placeholder="Enter the phone" name="email" autocomplete="off" value="{{$contacts->email}}">
          </div>
          <div class="form-group col-md-6">
            <label for="post">Post:</label>
            <input type="text"  class="form-control max" id="post" placeholder="Enter the phone" name="post" autocomplete="off" value="{{$contacts->post}}">
          </div>
      </div>
      </div>
      <div class="card-footer justify-content-between">
        <button type="submit" class="btn btn-info text-capitalize">Save</button>
      </div>
    </form>
  </div>
</section>
@endsection
@push('javascript')
<script src="{{URL::to('/')}}/backend/js/jquery.validate.js"></script>
<script>
$().ready(function() {
  $("#validate").validate({
    rules: {
      name: "required"
    },
    messages: {
      name: " name field is required **"
    },
    highlight: function(element) {
     $(element).css('background', '#ffdddd');
     $(element).css('border-color', 'red');
    },
    unhighlight: function(element) {
     $(element).css('background', '#ffffff');
     $(element).css('border-color', 'green');
    }
  });
});
</script>
@endpush