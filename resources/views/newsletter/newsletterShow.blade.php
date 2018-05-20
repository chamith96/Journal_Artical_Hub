<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>{{$newsletter->title}}</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>
    <div class="container">
      <ul class="list-group">
        <li class="list-group-item active"><h1>{{$newsletter->title}}</h1></li>
        <li class="list-group-item"><p>{{$newsletter->body}}</p></li>
      </ul>
        <a href="/newsletters" class="btn btn-default">Back to Newsletter</a>
    </div>
  </body>
</html>
