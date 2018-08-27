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
    </ul>
  </div>

  <div class="container">
  <div class="col-md-8 col-md-offset-2">
  <h1>Send email to reviewers</h1> <br>
  @include('layouts.messages')
<form action="" method="POST">
  {{ csrf_field() }}
<div class="form-group">
  <label for="exampleFormControlInput1">Reviewers</label>
  <input type="text" class="form-control" id="exampleFormControlInput1" name="author">
</div>

<div class="form-group">
  <label for="exampleFormControlInput1">Subject</label>
  <input type="text" class="form-control" id="exampleFormControlInput1" name="subject">
</div>

<div class="form-group">
  <label for="exampleFormControlTextarea1">Body</label>
  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="body"></textarea>
</div>

<input type="submit" value="Send" class="btn btn-primary">
</form>
</div>
</div>


  @endsection
