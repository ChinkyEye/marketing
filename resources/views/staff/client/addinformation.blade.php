@extends('staff.main.app')
@push('style')
<link rel="stylesheet" type="text/css" href="{{URL::to('/')}}/backend/css/nepali.datepicker.v2.2.min.css" />
@endpush
@section('content')
<?php $page = substr((Route::currentRouteName()), 6, strpos(str_replace('admin.','',Route::currentRouteName()), ".")); ?>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6 pl-1">

        <label for="student_id" class="control-label">Client Name</label>
        <span> : {{$clients->fullname}}</span> 
        <label></label>
        <b> Phone:</b> {{$clients->phone}} | 
        <b> Email:</b> {{$clients->email}} 

      </div>
      {{-- <div class="col-sm-6 pl-1">
        <h1 class="text-capitalize">Add Information</h1>
      </div> --}}
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('staff.home')}}">Home</a></li>
          <li class="breadcrumb-item active text-capitalize">{{ $page }} Page</li>
        </ol>
      </div>
    </div>
  </div>
</section>
<section class="content">
  <div class="card card-info">
    <form role="form" method="POST" action="{{route('staff.client.storeinformation')}}" class="validate" id="validate">
      <div class="card-body">
        {{ csrf_field() }}
        <div class="row">
          <input type="hidden" name="client_id" value="{{$clients->id}}">
          <fieldset class="border border-info container-fluid col-md-12 p-2 mb-2">
            <legend  class="w-auto"><small class="mx-2 text-info">Mediator.</small></legend>
            <div class="row">
              <div class="form-group col">
                <label for="dob">Full Name<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="mediator_name" name="mediator_name" autocomplete="off" value="{{ old('mediator_name') }}">
              </div>
              <div class="form-group col">
                <label for="dob">Phone No:</label>
                <input type="text" class="form-control" id="mediator_phone" name="mediator_phone" autocomplete="off" value="{{ old('mediator_phone') }}">
              </div>
            </div>
          </fieldset>
          <div class="form-group col-md-6">
            <label for="name">First Meeting<span class="text-danger">*</span></label>
            <input type="text"  class="form-control max" id="first_meeting" placeholder="Enter the phone" name="first_meeting" autocomplete="off" autofocus>
          </div>
          <div class="form-group col-md-6">
            <label for="name">Next Meeting</label>
            <input type="text"  class="form-control max" id="next_meeting" placeholder="Enter the address" name="next_meeting" autocomplete="off" autofocus>
          </div>
          <fieldset class="border border-info container-fluid col-md-12 p-2 mb-2">
            <legend  class="w-auto"><small class="mx-2 text-info">Contact Person</small></legend>
            <div class="row">
              <div class="form-group col">
                <label for="dob">Full Name<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="c_name" name="c_name" autocomplete="off" value="{{ old('c_name') }}">
              </div>
              <div class="form-group col">
                <label for="dob">Phone No:</label>
                <input type="text" class="form-control" id="c_phone" name="c_phone" autocomplete="off" value="{{ old('c_phone') }}">
              </div>
              <div class="form-group col">
                <label for="dob">Gmail:</label>
                <input type="text" class="form-control" id="c_gmail" name="c_gmail" autocomplete="off" value="{{ old('c_gmail') }}">
              </div>
              <div class="form-group col">
                <label for="dob">Post:</label>
                <input type="text" class="form-control" id="c_post" name="c_post" autocomplete="off" value="{{ old('c_post') }}">
              </div>
            </div>
          </fieldset>
          <div class="form-group col-md-12">
            <label for="name">Client Point of view</label>
            <textarea  class="form-control max" id="description" name="description" rows="4" cols="50">
            </textarea>
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
<script type="text/javascript" src="{{URL::to('/')}}/backend/js/nepali.datepicker.v2.2.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  var currentDate = NepaliFunctions.ConvertDateFormat(NepaliFunctions.GetCurrentBsDate(), "YYYY-MM-DD");
  $('#first_meeting').val(currentDate);
  $('#next_meeting').val(currentDate);
  $('#first_meeting').nepaliDatePicker({
    ndpYear: true,
    ndpMonth: true,
    disableAfter: currentDate,
    });
  $('#next_meeting').nepaliDatePicker({
    ndpYear: true,
    ndpMonth: true,
    ndpYearCount: 10,
    // disableAfter: currentDate,
    });
  });
</script>
@endpush