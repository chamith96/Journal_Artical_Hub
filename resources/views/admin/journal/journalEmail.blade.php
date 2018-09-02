@extends('layouts.appAdmin')
  @section('content')

<link href="{{ asset('css/styles.css') }}" rel="stylesheet">
  <div id="sidebar-collapse" class="col-sm-2 col-lg-2 sidebar">
      <ul class="nav menu">
        <li><a href="{{route('admin.dashboard')}}"> Dashboard</a></li>
        <li><a href="{{url('admin/newsletters')}}"> Newsletters</a></li>
        <li class="active"><a href="{{url('admin/journals')}}"> Journals</a></li>
        <li><a href="{{url('admin/reviewers')}}"> Reviewers</a></li>
        <li><a href="{{url('admin/users')}}"> Users</a></li>
        <li><a href="{{url('admin/emails')}}">Emsils</a></li>
    </ul>
  </div>

  <div class="container">
  <div class="col-md-8 col-md-offset-2">
  <h1>Send email to reviewers</h1> <br>
  @include('layouts.messages')
    <form action="{{url('admin/journals/email')}}" method="POST"  enctype="multipart/form-data">
      {{ csrf_field() }}
    <div class="form-group">
      <label for="exampleFormControlInput1">Reviewers</label>
          @if(count($reviewer) > 0)
            <select class="form-control" name="reviewer">
            @foreach ($reviewer as $reviewers)
              <option>{{$reviewers->email}}</option>
            @endforeach
            </select>
          @endif
    </div>

    <div class="form-group">
      <label for="exampleFormControlInput1">Subject</label>
      <input type="text" class="form-control" id="exampleFormControlInput1" name="subject">
    </div>

    <div class="form-group">
      <label for="exampleFormControlTextarea1">Body</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="body"></textarea>
    </div>

    <div class="form-group">
      <label for="exampleFormControlInput1">File to send</label>
      <input type="file" name="file">
    </div>

    <input type="submit" value="Send" class="btn btn-primary">
    </form>
    </div>
    </div>

  @endsection
