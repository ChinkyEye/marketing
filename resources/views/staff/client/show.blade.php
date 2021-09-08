@extends('staff.main.app')
@push('style')
<link rel="stylesheet" type="text/css" href="{{URL::to('/')}}/backend/css/nepali.datepicker.v2.2.min.css" />
@endpush
@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">
        <!-- Profile Image -->
        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <span><h4>{{$clients->fullname}}<h4></span>
            </div>
            <h3 class="profile-username text-center"></h3>

            <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item">
                <b>Address</b> <a class="float-right">{{$clients->address}}</a>
              </li>
              <li class="list-group-item">
                <b>Contact No</b> <a class="float-right">{{$clients->phone}}</a>
              </li>
              <li class="list-group-item">
                <b>Email</b> <a class="float-right">{{$clients->email}}</a>
              </li>
            </ul>
            <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
          </div>
        </div>
        <!-- /.card -->

        <!-- About Me Box -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">About Mediator</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <strong><i class="fas fa-user-tie mr-1"></i>Name</strong>
            <p class="text-muted">{{$clients->getInformation->getMediator->name}}</p>
            <hr>
            <strong><i class="fas fa-phone-volume mr-1"></i>Number</strong>
            <p class="text-muted">{{$clients->getInformation->getMediator->phone}}</p>
            <hr>
            {{-- <strong><i class="fas fa-envelope mr-1"></i> Email</strong>
            <p class="text-muted">
              {{$clients->getInformation->getMediator->email}}
            </p>
            <hr>
            <strong><i class="far fa-file-alt mr-1"></i> Post</strong>
            <p class="text-muted">
              {{$clients->getInformation->getMediator->post}}
            </p> --}}
          </div>
        </div>

        {{-- <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <span>Contact Person Detail</span>
            </div>
            <h3 class="profile-username text-center"></h3>

            <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item">
                <b>Full Name</b> <a class="float-right">{{$clients->getInformation->c_name}}</a>
              </li>
              <li class="list-group-item">
                <b>Contact No</b> <a class="float-right">{{$clients->getInformation->c_phone}}</a>
              </li>
              <li class="list-group-item">
                <b>Email</b> <a class="float-right">{{$clients->getInformation->c_gmail}}</a>
              </li>
              <li class="list-group-item">
                <b>Post</b> <a class="float-right">{{$clients->getInformation->c_post}}</a>
              </li>
            </ul>
          </div>
        </div> --}}
      </div>
      <!-- /.col -->
      <div class="col-md-9">
        <div class="card">
          <div class="card-header p-2">
            <ul class="nav nav-pills">
              <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Next Meeting</a></li>
              <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Contact Person</a></li>
              <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">New Schedule</a></li>
            </ul>
          </div><!-- /.card-header -->
          <div class="card-body">
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <form role="form" method="POST" action="{{route('staff.client.storeinformation')}}" class="validate" id="validate">
                  <div class="card-body">
                    {{ csrf_field() }}
                    <div class="row">
                      <input type="hidden" name="client_id" value="{{$clients->id}}">
                      <fieldset class="border border-info container-fluid col-md-12 p-2 mb-2">
                        <legend  class="w-auto"><small class="mx-2 text-info">Mediator.</small></legend>
                        <div class="row">
                          <div class="form-group col-md-6">
                            <label for="name_data" class="control-label">Full Name<span class="text-danger">*</span></label>
                            <select class="form-control" name="mediator_name" id="name_data">
                              <option value="">Select Mediator</option>
                              @foreach ($mediators as $key => $mediator)
                              <option value="{{ $mediator->id }}" >
                                {{$mediator->name}}
                              </option>
                              @endforeach
                            </select>
                          </div>
                          {{-- <div class="form-group col">
                            <label for="phone_data" class="control-label ">Phone No:</label>
                            <input type="text"  class="form-control max" id="phone_data" placeholder="Enter phone no" name="mediator_phone" readonly="true">
                          </div> --}}
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
                      {{-- <fieldset class="border border-info container-fluid col-md-12 p-2 mb-2">
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
                      </fieldset> --}}
                      <div class="form-group col-md-12">
                        <label for="name">Conclusion</label>
                        <textarea  class="form-control max" id="description" name="description" rows="4" cols="50">
                        </textarea>
                      </div>
                      <div class="form-group col-md-12">
                        <label>Priority</label>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="checkbox" value="1">
                          <label class="form-check-label">High</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="checkbox" value="2">
                          <label class="form-check-label">Medium</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="checkbox" value="3">
                          <label class="form-check-label">Low</label>
                        </div> 
                      </div>
                  </div>
                  </div>
                  <div class="card-footer justify-content-between">
                    <button type="submit" class="btn btn-info text-capitalize">Save</button>
                  </div>
                </form>

                <!-- Post -->
                
                <!-- /.post -->

                <!-- Post -->
                <div class="post clearfix">
                  
                  <!-- /.user-block -->
                  

                  
                </div>
                <!-- /.post -->

                <!-- Post -->
                
                <!-- /.post -->
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="timeline">
                <div class="">
                {{-- <div class="timeline timeline-inverse"> --}}
                  <div class="time-label">
                    <span class="text-info">
                      Contact Person Detail
                    </span>
                  </div>
                  <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                      <b>Full Name</b> <a class="float-right">{{$clients->getInformation->c_name}}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Contact No</b> <a class="float-right">{{$clients->getInformation->c_phone}}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Email</b> <a class="float-right">{{$clients->getInformation->c_gmail}}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Post</b> <a class="float-right">{{$clients->getInformation->c_post}}</a>
                    </li>
                  </ul>
                </div>
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="settings">
                <form class="form-horizontal" role="form" method="POST" action="{{route('staff.schedule.store')}}" class="validate" id="validate">
                  {{ csrf_field() }}
                  <input type="hidden" name="client_id" value="{{$clients->id}}">
                  <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Conclusion</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" id="conclusion" rows="2" cols="20" id="conclusion" name="conclusion"></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Schedule Date</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="date" name="date" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Schedule Time</label>
                    <div class="col-sm-10">
                      <input type="time" class="form-control" id="time" name="time" placeholder="Time">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputName2" class="col-sm-2 col-form-label">Next Meeting Date</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="next_date" name="next_date" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div><!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>
</section>
@endsection
@push('javascript')
<script type="text/javascript" src="{{URL::to('/')}}/backend/js/nepali.datepicker.v2.2.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  var currentDate = NepaliFunctions.ConvertDateFormat(NepaliFunctions.GetCurrentBsDate(), "YYYY-MM-DD");
  $('#date').val(currentDate);
  $('#next_date').val(currentDate);
  $('#date').nepaliDatePicker({
    ndpYear: true,
    ndpMonth: true,
    disableAfter: currentDate,
    });
  $('#next_date').nepaliDatePicker({
    ndpYear: true,
    ndpMonth: true,
    ndpYearCount: 10,
    // disableAfter: currentDate,
    });
  });
</script>
<script src="{{URL::to('/')}}/backend/js/jquery.validate.js"></script>
<script>
$().ready(function() {
  $("#validate").validate({
    rules: {
      fullname: "required",
    },
    messages: {
      fullname: "name field is required",
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
<script type="text/javascript">
  $("body").on("change","#name_data", function(event){
    Pace.start();
    var m_name_id = $('#name_data').val(),
        token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
      type:"POST",
      dataType:"JSON",
      url:"{{route('staff.getMediatorList')}}",
      data:{
        _token: token,
        m_name_id: m_name_id
      },
      success: function(response){
        console.log(response);
        $.each( response, function( i, val ) {
             $('#phone_data').val(val.phone);
        });
     
      },
      error: function(event){
        alert("Sorry");
      }
    });
        Pace.stop();
  });
</script>
@endpush
