@extends('layouts.appAdmin')
  @section('content')

    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
      <div id="sidebar-collapse" class="col-sm-2 col-lg-2 sidebar">
          <ul class="nav menu">
            <li><a href="{{route('admin.dashboard')}}"> Dashboard</a></li>
            <li><a href="{{url('admin/newsletters')}}"> Newsletters</a></li>
            <li><a href="{{url('admin/journals')}}"> Journals</a></li>
            <li><a href="{{url('admin/assigns')}}">Assigns</a></li>
            <li class="active"><a href="{{url('admin/reviewers')}}"> Reviewers</a></li>
            <li><a href="{{url('admin/users')}}"> Users</a></li>
            <li><a href="{{url('admin/emails')}}">Emsils</a></li>
        </ul>
      </div>

    <div class="container">
      <div class="col-md-8 col-md-offset-2">
      <ul class="list-group">
        <li class="list-group-item"><p>Reviewer name: {{$reviewer->name}}</p></li>
        <li class="list-group-item"><p>Reviewer email: {{$reviewer->email}}</p></li>
        <li class="list-group-item"><p>Reviewer Organization: {{$reviewer->organization}}</p></li>
        <li class="list-group-item"><p>Reviewer Position: {{$reviewer->position}}</p></li>
      </ul>
      <a class="btn btn-primary" href="{{$reviewer->id}}/edit">Edit</a>

          <button class="btn btn-danger pull-right" data-toggle="modal" data-target="#myModal">Delete</button>

    </div>

 <!-- Modal -->
 <div class="modal fade" id="myModal" role="dialog">
   <div class="modal-dialog">

     <!-- Modal content-->
     <div class="modal-content">
       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title">Delete Warning !!</h4>
       </div>
       <div class="modal-body">
         <p>Sure to delete {{$reviewer->name}} ?</p>
       </div>
       <div class="modal-footer">
                 <form action="{{url('admin/reviewers', [$reviewer->id])}}" method="POST">
                   {{csrf_field()}}
                   <input type="hidden" name="_method" value="DELETE">
                   <input type="submit" class="btn btn-danger" value="Delete" data-toggle="modal" data-target="#myModal">
                 </form>
       </div>
     </div>
   </div>
 </div>
@endsection
