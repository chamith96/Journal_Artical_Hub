@extends('layouts.app')
    @section('content')
    <div class="container">
  <ul class="list-group">
    <li class="list-group-item active"><h1>{{$status->status}}</h1></li>
    <li class="list-group-item"><p>Author name: {{$journal->name}}</p></li>
    <li class="list-group-item"><p>Administration: {{$journal->administration}}</p></li>
    <li class="list-group-item"><p>Department: {{$journal->department}}</p></li>
    <li class="list-group-item"><p>Journal Title: {{$journal->title}}</p></li>
    <li class="list-group-item"><p>Journal Description: {{$journal->description}}</p></li>
    <li class="list-group-item"><p>Journal release date: {{$journal->journal_date}}</p></li>
  </ul>
    <a href="/dashboard" class="btn btn-default">Back to Dashboard</a>
</div>
    @endsection
