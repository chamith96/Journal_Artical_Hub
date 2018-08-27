@extends('layouts.appAdmin')

@section('content')
  <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

        <div id="sidebar-collapse" class="col-sm-2 col-lg-2 sidebar">
      		<ul class="nav menu">
      			<li class="active"><a href="{{route('admin.dashboard')}}"> Dashboard</a></li>
      			<li><a href="{{url('admin/newsletters')}}"> Newsletters</a></li>
            <li><a href="{{url('admin/journals')}}"> Journals</a></li>
            <li><a href="{{url('admin/reviewers')}}"> Reviewers</a></li>
            <li><a href="{{url('admin/users')}}"> Users</a></li>
      		</ul>
      	</div>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in as Admin!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
