@extends('layouts.appAdmin')
  @section('content')

<link href="{{ asset('css/styles.css') }}" rel="stylesheet">
  <div id="sidebar-collapse" class="col-sm-2 col-lg-2 sidebar">
      <ul class="nav menu">
        <li><a href="{{route('admin.dashboard')}}"> Dashboard</a></li>
        <li><a href="{{url('admin/newsletters')}}"> Newsletters</a></li>
        <li><a href="{{url('admin/journals')}}"> Journals</a></li>
        <li><a href="{{url('admin/reviewers')}}"> Reviewers</a></li>
        <li><a href="{{url('admin/users')}}">Users</a></li>
        <li class="active"><a href="{{url('admin/emails')}}">Emails</a></li>
    </ul>
  </div>

<h1 align="center">User Emails</h1>
<div class="container">
  <div class="col-md-8 col-md-offset-2">
      @include('layouts.messages')
    @if(count($emailUser) > 0)

      <table class="table table-striped">
        <tr>
          <th>Id</th>
          <th>Email</th>
          <th>Subject</th>
          <th>Body</th>
        </tr>
        @foreach ($emailUser as $emailUsers)
        <tr>
            <td>
              <h3>{{$emailUsers->id}}</h3>
            </td>
            <td>
              <h3>{{$emailUsers->user_email}}</h3>
            </td>
            <td>
              <h3>{{$emailUsers->subject}}</h3>
            </td>
            <td>
              <h4><i><a href="/admin/emails/user/{{$emailUsers->id}}">See content</a></i></h4>
            </td>
          @endforeach
        </tr>
      </table>
{{$emailUser->links()}}
</div>
</div>
    @endif
  @endsection
