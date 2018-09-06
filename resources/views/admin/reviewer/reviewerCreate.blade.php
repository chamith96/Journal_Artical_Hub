@extends('layouts.app')
    @section('content')

      <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
        <div id="sidebar-collapse" class="col-sm-2 col-lg-2 sidebar">
            <ul class="nav menu">
              <li><a href="{{route('admin.dashboard')}}"> Dashboard</a></li>
              <li><a href="{{url('admin/newsletters')}}"> Newsletters</a></li>
              <li><a href="{{url('admin/journals')}}"> Journals</a></li>
              <li><a href="{{url('admin/assigns')}}">Assigns</a></li>
              <li class="active"><a href="{{url('admin/reviewers')}}"> Reviewers</a></li>
              <li><a href="{{url('admin/users')}}"> Users</a></li>
              <li><a href="{{url('admin/emails')}}">Emsils</a></li>
          </ul>
        </div>

        <div class="container">
        <div class="col-md-8 col-md-offset-2">
        <h1>Reviewers Create</h1> <br>
        @include('layouts.messages')
      <form action="{{url('admin/reviewers')}}" method="POST">
        {{ csrf_field() }}
      <div class="form-group">
        <label for="exampleFormControlInput1">Full Name</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="name">
      </div>

      <div class="form-group">
        <label for="exampleFormControlInput1">Email</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="email">
      </div>

      <div class="form-group">
        <label for="exampleFormControlInput1">Organization</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="organization">
      </div>

      <div class="form-group">
        <label for="exampleFormControlInput1">Position</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="position">
      </div>

      <input type="submit" value="Submit" class="btn btn-primary">
    </form>
    </div>
  </div>

    <br>
  @endsection
