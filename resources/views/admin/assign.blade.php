@extends('layouts.appAdmin')
  @section('content')
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
      <div id="sidebar-collapse" class="col-sm-2 col-lg-2 sidebar">
          <ul class="nav menu">
            <li><a href="{{route('admin.dashboard')}}"> Dashboard</a></li>
            <li><a href="{{url('admin/newsletters')}}"> Newsletters</a></li>
            <li><a href="{{url('admin/journals')}}"> Journals</a></li>
            <li class="active"><a href="{{url('admin/assigns')}}">Assigns</a></li>
            <li><a href="{{url('admin/reviewers')}}"> Reviewers</a></li>
            <li><a href="{{url('admin/users')}}"> Users</a></li>
            <li><a href="{{url('admin/emails')}}">Emsils</a></li>
        </ul>
      </div>


<h1 align="center">Assigns</h1>
<div class="container">
  <div class="col-md-8 col-md-offset-2">
    @if(count($assign) > 0)

      <table class="table table-striped">
        <tr>
          <th>Reviewer Name</th>
          <th>User Name</th>
          <th>Journal Name</th>
        </tr>
        @foreach ($assign as $assigns)
        <tr>

            <td>
              <h3>{{$assigns->rname}}</h3>
            </td>
          </td>
          <td>
        <h3>{{$assigns->uname}}</h3>
          </td>
            <td>
              <h3>{{$assigns ->jname}}</h3>
          @endforeach
        </tr>
      </table>
    @endif

  </div>
</div>

  @endsection
