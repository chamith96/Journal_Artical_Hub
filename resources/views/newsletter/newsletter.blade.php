<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Newsletter</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>
      <h1 align="center">Newsletters</h1>

      @if(count($newsletter) > 0)
          <div class="container">
            @include('messages')
          <div class="list-group">
        @foreach ($newsletter as $newsletters)
          <h1><a href="/newsletters/{{$newsletters->id}}" class="list-group-item">{{$newsletters->title}}</a></h1>
        @endforeach
        </div>
        </div>
        @else
          <div class="col-md-8 col-md-offset-2">
            <div class="panel-heading"><h3>Don't have any Newsletters yet.</h3>
            <a href="newsletters/create" class="btn btn-primary">create now</a>
            </div>
          </div>
      @endif
  </body>
</html>
