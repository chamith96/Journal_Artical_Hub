<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>{{$newsletter->title}}</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>
    <br> <br>
    <div class="container">
      <ul class="list-group">
        <li class="list-group-item active"><h1>{{$newsletter->title}}</h1></li>
        <li class="list-group-item"><b>Full Name:</b> {{$newsletter->name}}</li>
        <li class="list-group-item"><b>Faculty:</b> {{$newsletter->faculty}}</li>
        <li class="list-group-item"><b>Department:</b> {{$newsletter->department}}</li>
        <li class="list-group-item"><b>Register Number:</b> {{$newsletter->register_num}}</li>
        <li class="list-group-item"><b>Content:</b> {{$newsletter->body}}</li>
      </ul>
        <a class="btn btn-default" href="{{route('pdfShow', [$newsletter->id])}}">Download pdf file</a>
    </div>
  </body>
</html>
