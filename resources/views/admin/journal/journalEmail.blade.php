@extends('layouts.appAdmin')
@section('content')
<div id="wrapper">

     <!-- Sidebar -->
     <ul class="sidebar navbar-nav">
       <li class="nav-item">
         <a class="nav-link" href="{{route('admin.dashboard')}}">
           <i class="fas fa-fw fa-tachometer-alt"></i>
           <span>Dashboard</span>
         </a>
       </li>

       <li class="nav-item">
         <a class="nav-link" href="{{url('admin/newsletters')}}">
           <i class="fas fa-fw fa-newspaper"></i>
           <span>Newsletters</span></a>
       </li>

       <li class="nav-item active">
         <a class="nav-link" href="{{url('admin/journals')}}">
           <i class="fas fa-fw fa-newspaper"></i>
           <span>Journals</span></a>
       </li>

       <li class="nav-item">
         <a class="nav-link" href="{{url('admin/assigns')}}">
           <i class="fas fa-fw fa-tasks"></i>
           <span>Assigns</span></a>
       </li>

       <li class="nav-item">
         <a class="nav-link" href="{{url('admin/reviewers')}}">
           <i class="fas fa-fw fa-user"></i>
           <span>Reviewers</span></a>
       </li>

       <li class="nav-item">
         <a class="nav-link" href="{{url('admin/users')}}">
           <i class="fas fa-fw fa-user"></i>
           <span>Users</span></a>
       </li>

       <li class="nav-item dropdown">
         <a class="nav-link dropdown-toggle" href="{{url('admin/emails')}}" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           <i class="fas fa-fw fa-envelope"></i>
           <span>Emails</span>
         </a>
         <div class="dropdown-menu" aria-labelledby="pagesDropdown">
           <a class="dropdown-item" href="emails/user">User Emails</a>
           <a class="dropdown-item" href="emails/reviewer">Reviewers Emails</a>
         </div>
       </li>
     </ul>

     <div id="content-wrapper">

       <div class="container-fluid">

         <!-- Breadcrumbs-->
         <ol class="breadcrumb">
           <li class="breadcrumb-item">
             <a href="{{route('admin.dashboard')}}">Dashboard</a>
           </li>
           <li class="breadcrumb-item">
             <a href="{{url('admin/journals')}}">Journal</a>
           </li>
           <li class="breadcrumb-item active">Send Email to reviewer</li>
         </ol>

         <!-- Content goes here -->

         @include('layouts.messages')
         <div class="card mb-3">
         <div class="card-body">
           <form action="{{url('admin/journals/email')}}" method="POST"  enctype="multipart/form-data">
             {{ csrf_field() }}
           <div class="form-group">
             <label for="exampleFormControlInput1">Reviewers</label>
             @if(count($reviewer) > 0)
               @foreach ($reviewer as $reviewers)
             <input type="text" class="form-control" id="exampleFormControlInput1" name="reviewer" value="{{$reviewers->remail}}">
           </div>

           <div class="form-group">
             <label for="exampleFormControlInput1">Subject</label>
             <input type="text" class="form-control" id="exampleFormControlInput1" name="subject" value="Submission review request.">
           </div>

           <div class="form-group">
             <label for="exampleFormControlTextarea1">Body</label>
             <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" name="body">
Dear {{$reviewers->rname}},
        @endforeach
        @endif

This is Sabaragamuwa University Journal Administration. Could you please erite a review for us on the following paper submission.

---------------------------------------------------
Journal Id: {{$journal->id}}
Journal Title: {{$journal->title}}
Journal Author: {{$journal->name}}
---------------------------------------------------

The instructions on how to access the submission, accept or decline this review request, and submit your rewiew can be found at <br>the bottom of this paper.

If you cannot review this paper, could you please suggest names, oranizations and email address of possible rewiewers.

Best regards,
SUSL Journal Administration.
             </textarea>
           </div>

           <div class="form-group">
             <label for="exampleFormControlInput1">File to send</label> <br>
             <input type="file" name="file">
           </div>

           <input type="submit" value="Send" class="btn btn-primary">
           </form>

           </div>
           </div>

       </div>
       <!-- /.container-fluid -->

     </div>
     <!-- /.content-wrapper -->

   </div>
   <!-- /#wrapper -->

 @endsection
