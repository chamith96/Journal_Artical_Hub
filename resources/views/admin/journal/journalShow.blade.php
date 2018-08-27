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
      <ul class="list-group">
        <li class="list-group-item"><p>Journsl Id: {{$journal->id}}</p></li>
        <li class="list-group-item"><p>Author name: {{$journal->name}}</p></li>
        <li class="list-group-item"><p>Administration: {{$journal->administration}}</p></li>
        <li class="list-group-item"><p>Department: {{$journal->department}}</p></li>
        <li class="list-group-item"><p>Journal Title: {{$journal->title}}</p></li>
        <li class="list-group-item"><p>Journal Description: {{$journal->description}}</p></li>
        <li class="list-group-item"><p>Journal release date: {{$journal->journal_date}}</p></li>
        <li class="list-group-item"><p>Journal Created date: {{$journal->created_at}}</p></li>
      </ul>
        <a class="btn btn-default" href="{{route('pdfShowJournal', [$journal->id])}}">Download details pdf</a>
        <a class="btn btn-default" href="{{route('PDFJournal', [$journal->id])}}">Download pdf file</a>
        <a class="btn btn-default" href="{{route('DOCJournal', [$journal->id])}}">Download doc file</a>
    </div>

@endsection
