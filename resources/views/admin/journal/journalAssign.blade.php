@extends('layouts.appAdmin')
  @section('content')

<link href="{{ asset('css/styles.css') }}" rel="stylesheet">
  <div id="sidebar-collapse" class="col-sm-2 col-lg-2 sidebar">
      <ul class="nav menu">
        <li><a href="{{route('admin.dashboard')}}"> Dashboard</a></li>
        <li><a href="{{url('admin/newsletters')}}"> Newsletters</a></li>
        <li class="active"><a href="{{url('admin/journals')}}"> Journals</a></li>
        <li><a href="{{url('admin/assigns')}}">Assigns</a></li>
        <li><a href="{{url('admin/reviewers')}}"> Reviewers</a></li>
        <li><a href="{{url('admin/users')}}"> Users</a></li>
        <li><a href="{{url('admin/emails')}}">Emsils</a></li>
    </ul>
  </div>

<h1 align="center">Assign {{$journal->id}} journal to Reviewer</h1> <br><br>
<div class="container">
  <div class="container">
    <div class="col-md-8 col-md-offset-2">
  @include('layouts.messages')
    <form action="assigns" method="POST">
      {{ csrf_field() }}

    <input type="hidden" class="form-control" value="{{$journal->id}}" name="jid" hidden>>

    <div class="form-group">
      <label for="exampleFormControlInput1">Reviewers</label>
          @if(count($reviewer) > 0)
            <select class="form-control" name="rid">
            @foreach ($reviewer as $reviewers)
              <option value="{{$reviewers->id}}">{{$reviewers->email}}</option>
            @endforeach
            </select>
          @endif
    </div>

    <input type="submit" value="Assign" class="btn btn-primary">
    </form>
</div>
</div>
  @endsection
