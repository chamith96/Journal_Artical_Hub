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
         <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           <i class="fas fa-fw fa-envelope"></i>
           <span>Emails</span>
         </a>
         <div class="dropdown-menu" aria-labelledby="pagesDropdown">
           <a class="dropdown-item" href="{{url('admin/emails/user')}}">User Emails</a>
           <a class="dropdown-item" href="{{url('admin/emails/reviewer')}}">Reviewers Emails</a>
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
           <li class="breadcrumb-item active">{{$journal->name}}</li>
         </ol>

         <!-- Content goes here -->
         <ul class="list-group">
           <li class="list-group-item"><b><p>Article Title:</b> {{$journal->title}}</p></li>
           <li class="list-group-item"><b><p>Abstract:</b> {{$journal->abstract}}</p></li>
           <li class="list-group-item"><b><p>Keywords:</b> {{$journal->keywords}}</p></li>
        </ul>
           <br>
           <b>Author 1</b>
           <ul class="list-group">
           <li class="list-group-item"><b><p>Author 1 First Name:</b> {{$journal->a1fname}}</p></li>
           <li class="list-group-item"><b><p>Author 1 Last Name:</b> {{$journal->a1lname}}</p></li>
           <li class="list-group-item"><b><p>Author 1 Affiliation:</b> {{$journal->a1affiliation}}</p></li>
           <li class="list-group-item"><b><p>Author 1 Email:</b>{{$journal->a1email}}</p></li>
         </ul>
         <br>

           @if($journal->a2email!= null)
             <b>Author 2</b>
             <ul class="list-group">
             <li class="list-group-item"><b><p>Author 2 First Name:</b> {{$journal->a2fname}}</p></li>
             <li class="list-group-item"><b><p>Author 2 Last Name:</b> {{$journal->a2lname}}</p></li>
             <li class="list-group-item"><b><p>Author 2 Affiliation:</b> {{$journal->a2affiliation}}</p></li>
             <li class="list-group-item"><b><p>Author 2 Email:</b> {{$journal->a2email}}</p></li>
             </ul>
           @endif
           <br>

           @if($journal->a3email!= null)
             <b>Author 3</b>
             <ul class="list-group">
             <li class="list-group-item"><b><p>Author 3 First Name:</b> {{$journal->a3fname}}</p></li>
             <li class="list-group-item"><b><p>Author 3 Last Name:</b> {{$journal->a3lname}}</p></li>
             <li class="list-group-item"><b><p>Author 3 Affiliation:</b> {{$journal->a3affiliation}}</p></li>
             <li class="list-group-item"><b><p>Author 3 Email:</b> {{$journal->a3email}}</p></li>
           </ul>
           @endif
           <br>

           @if($journal->a4email!= null)
             <b>Author 4</b>
             <ul class="list-group">
             <li class="list-group-item"><b><p>Author 4 First Name:</b> {{$journal->a4fname}}</p></li>
             <li class="list-group-item"><b><p>Author 4 Last Name:</b> {{$journal->a4lname}}</p></li>
             <li class="list-group-item"><b><p>Author 4 Affiliation:</b> {{$journal->a4affiliation}}</p></li>
             <li class="list-group-item"><b><p>Author 4 Email: </b>{{$journal->a4email}}</p></li>
            </ul>
           @endif


         <ul class="list-group">
           <li class="list-group-item"><b>Assigns</b></li>
         @if(count($assign) > 0)
             @foreach ($assign as $assigns)
               <li class="list-group-item">{{$assigns->rname}}</li>
             @endforeach
        @else
            <li class="list-group-item">Reviewers are not assigned yet</li>
        @endif
      </li>
       </ul>


       </div>
       <!-- /.container-fluid -->

     </div>
     <!-- /.content-wrapper -->

   </div>
   <!-- /#wrapper -->

 @endsection
