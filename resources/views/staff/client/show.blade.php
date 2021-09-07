@extends('staff.main.app')
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

        <div class="card card-primary card-outline">
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
        </div>
      </div>
      <!-- /.col -->
      <div class="col-md-9">
        <div class="card">
          <div class="card-header p-2">
            <ul class="nav nav-pills">
              <li class="nav-item ml-auto"><a class="nav-link text-primary" href=""><i class="far fa-edit">Add New Schedule</i></a></li>
            </ul>
          </div>
          <div class="card-body">
            
          </div>
         {{--  @if($counts > 0)
          <div class="card-body">
            @php
            foreach($client->getScheduleCountLatest()->get() as $data){
            $date=$data->a_date;
            $detail=$data->result;
            $count_days = now()->diffInDays(Carbon\Carbon::parse($data->en_date), false);
          }
          @endphp
            <div class="post clearfix">
              <div class="user-block">
                <img class="img-circle img-bordered-sm" src="{{URL::to('/')}}/images/person2.jpg" alt="User Image">
                <span class="username">
                  <a href="#"></a>
                </span>
                <span class="description">{{$client->c_address}} - {{$date}} | {{$count_days}} Days</span>
              </div>
              <p class="text-center">
                {{$detail}}     
              </p>
            </div>
          </div>
          @endif --}}
         {{--  <div class="card-footer">
            <div class="row">
              <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>SN</th>
                      <th>Conclusion</th>
                      <th>Schedule</th>
                      <!-- <th class="text-center">Action</th> -->
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($notifications as $key => $notification)
                    <tr>
                      <td>{{$key+ 1}}</td>
                      <td>{{$notification->result}}</td>
                      <td>{{$notification->a_date}} | {{$notification->a_time}}</td>
                      <!-- <td class="text-center"><a href="" ><i class="fa fa-trash"></i></a></td> -->
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div> --}}
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
