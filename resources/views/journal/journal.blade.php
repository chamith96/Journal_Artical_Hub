@extends('layouts.app')
    @section('content')
  @if(count($journal) > 0)
      <div class="container">
      <div class="list-group">
    @foreach ($journal as $journals)
      <h1><a href="/journals/{{$journals->id}}" class="list-group-item">{{$journals->title}}</a></h1>
    @endforeach
    </div>
    </div>
    @else
      <div class="col-md-8 col-md-offset-2">
        <div class="panel-heading"><h3>You don't have any Journal yet.</h3>
        <a href="journals/create" class="btn btn-primary">create now</a>
        </div>
      </div>
  @endif
    @endsection
