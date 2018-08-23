@extends('layouts.appAdmin')
  @section('content')

    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
      <div id="sidebar-collapse" class="col-sm-2 col-lg-2 sidebar">
          <ul class="nav menu">
            <li><a href="{{route('admin.dashboard')}}"> Dashboard</a></li>
            <li><a href="{{url('admin/newsletters')}}"> Newsletters</a></li>
            <li class="active"><a href="{{url('admin/journals')}}"> Journals</a></li>
            <li><a href="{{url('admin/reviewers')}}"> Reviewers</a></li>
        </ul>
      </div>

    <div class="container">
      <div class="col-md-8 col-md-offset-2">
      <ul class="list-group">
        <li class="list-group-item active"><h1>{{$journal->title}}</h1></li>
        <li class="list-group-item"><p>Author name: {{$journal->name}}</p></li>
        <li class="list-group-item"><p>Administration: {{$journal->administration}}</p></li>
        <li class="list-group-item"><p>Department: {{$journal->department}}</p></li>
        <li class="list-group-item"><p>Journal Title: {{$journal->title}}</p></li>
        <li class="list-group-item"><p>Journal Description: {{$journal->description}}</p></li>
        <li class="list-group-item"><p>Journal release date: {{$journal->journal_date}}</p></li>
        <li class="list-group-item"><p>Journal Created date: {{$journal->created_at}}</p></li>
        <li class="list-group-item"><p>Journal updated date: {{$journal->updated_at}}</p></li>
      </ul>
        <a class="btn btn-default" href="{{route('pdfShowJournal', [$journal->id])}}">Download pdf file</a>

    </div>
@endsection
