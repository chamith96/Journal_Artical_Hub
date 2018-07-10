
  <ul>
    <li><b>Full Name:</b> {{$newsletter->name}}</li>
    <li><b>Faculty:</b> {{$newsletter->faculty}}</li>
    <li><b>Department:</b> {{$newsletter->department}}</li>
    <li><b>Register Number:</b> {{$newsletter->register_num}}</li>
    <li><b>Title:</b> {{$newsletter->title}}</li>
    <li><b>Content:</b> {{$newsletter->body}}</li>
    <img src="storage/{{$newsletter->register_num}}/{{$newsletter->image1}}" style="width:100%">
  </ul>
