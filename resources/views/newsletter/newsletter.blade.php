@extends('layouts.app')
  @section('content')
      <h1 align="center">Newsletters</h1>

      @if(count($newsletter) > 0)
          <div class="container">
          <div class="list-group">
        @foreach ($newsletter as $newsletters)
          <h1><a href="/newsletters/{{$newsletters->id}}" class="list-group-item">{{$newsletters->title}}</a></h1>
        @endforeach
        </div>
        </div>
        @else
          <div class="col-md-8 col-md-offset-2">
            <div class="panel-heading"><h3>Don't have any Newsletters yet.</h3>
            </div>
          </div>
      @endif

  @endsection
