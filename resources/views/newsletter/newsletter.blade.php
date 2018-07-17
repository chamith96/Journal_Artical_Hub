@extends('layouts.app')
  @section('content')
    @include('layouts.admin')
      <h1 align="center">Newsletters</h1>
<div class="container">
  <div class="col-md-8 col-md-offset-2">
    @if(count($newsletter) > 0)

      @foreach ($newsletter as $newsletters)
        <div class="well">
        <h1><a href="/newsletters/{{$newsletters->id}}">{{$newsletters->title}}</a></h1>
              </div>
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
