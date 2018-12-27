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
           <li class="list-group-item"><p>Article Title: {{$journal->title}}</p></li>
           <li class="list-group-item"><p>Abstract: {{$journal->abstract}}</p></li>
           <li class="list-group-item"><p>Keywords: {{$journal->keywords}}</p></li>
           <br>
           <li class="list-group-item"><p>Author 1 First Name: {{$journal->a1fname}}</p></li>
           <li class="list-group-item"><p>Author 1 Last Name: {{$journal->a1lname}}</p></li>
           <li class="list-group-item"><p>Author 1 Affiliation: {{$journal->a1affiliation}}</p></li>
           <li class="list-group-item"><p>Author 1 Country: {{$journal->a1country}}</p></li>
           <li class="list-group-item"><p>Author 1 Email: {{$journal->a1email}}</p></li>
           <br>
           @if($journal->a2email!= null)
             <li class="list-group-item"><p>Author 2 First Name: {{$journal->a2fname}}</p></li>
             <li class="list-group-item"><p>Author 2 Last Name: {{$journal->a2lname}}</p></li>
             <li class="list-group-item"><p>Author 2 Affiliation: {{$journal->a2affiliation}}</p></li>
             <li class="list-group-item"><p>Author 2 Country: {{$journal->a2country}}</p></li>
             <li class="list-group-item"><p>Author 2 Email: {{$journal->a2email}}</p></li>
           @endif
           <br>
           @if($journal->a3email!= null)
             <li class="list-group-item"><p>Author 3 First Name: {{$journal->a3fname}}</p></li>
             <li class="list-group-item"><p>Author 3 Last Name: {{$journal->a3lname}}</p></li>
             <li class="list-group-item"><p>Author 3 Affiliation: {{$journal->a3affiliation}}</p></li>
             <li class="list-group-item"><p>Author 3 Country: {{$journal->a3country}}</p></li>
             <li class="list-group-item"><p>Author 3 Email: {{$journal->a3email}}</p></li>
           @endif
           <br>
           @if($journal->a4email!= null)
             <li class="list-group-item"><p>Author 4 First Name: {{$journal->a4fname}}</p></li>
             <li class="list-group-item"><p>Author 4 Last Name: {{$journal->a4lname}}</p></li>
             <li class="list-group-item"><p>Author 4 Affiliation: {{$journal->a4affiliation}}</p></li>
             <li class="list-group-item"><p>Author 4 Country: {{$journal->a4country}}</p></li>
             <li class="list-group-item"><p>Author 4 Email: {{$journal->a4email}}</p></li>
           @endif
           <br>
           @if($journal->a5email!= null)
             <li class="list-group-item"><p>Author 5 First Name: {{$journal->a5fname}}</p></li>
             <li class="list-group-item"><p>Author 5 Last Name: {{$journal->a5lname}}</p></li>
             <li class="list-group-item"><p>Author 5 Affiliation: {{$journal->a5affiliation}}</p></li>
             <li class="list-group-item"><p>Author 5 Country: {{$journal->a5country}}</p></li>
             <li class="list-group-item"><p>Author 5 Email: {{$journal->a5email}}</p></li>
           @endif
           <br>
           @if($journal->a6email!= null)
             <li class="list-group-item"><p>Author 6 First Name: {{$journal->a6fname}}</p></li>
             <li class="list-group-item"><p>Author 6 Last Name: {{$journal->a6lname}}</p></li>
             <li class="list-group-item"><p>Author 6 Affiliation: {{$journal->a6affiliation}}</p></li>
             <li class="list-group-item"><p>Author 6 Country: {{$journal->a6country}}</p></li>
             <li class="list-group-item"><p>Author 6 Email: {{$journal->a6email}}</p></li>
           @endif
         </ul> <br>

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
