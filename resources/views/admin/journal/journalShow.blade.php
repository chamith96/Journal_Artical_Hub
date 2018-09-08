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
           <li class="list-group-item"><p>Journsl Id: {{$journal->id}}</p></li>
           <li class="list-group-item"><p>Author name: {{$journal->name}}</p></li>
           <li class="list-group-item"><p>Administration: {{$journal->administration}}</p></li>
           <li class="list-group-item"><p>Department: {{$journal->department}}</p></li>
           <li class="list-group-item"><p>Journal Title: {{$journal->title}}</p></li>
           <li class="list-group-item"><p>Journal Description: {{$journal->description}}</p></li>
           <li class="list-group-item"><p>Journal release date: {{$journal->journal_date}}</p></li>
           <li class="list-group-item"><p>Journal Created date: {{$journal->created_at}}</p></li>
         </ul> <br>
           <a class="btn btn-primary" href="{{route('pdfShowJournal', [$journal->id])}}">Download details pdf</a>
           <a class="btn btn-primary" href="{{route('downloadFilesJournal', [$journal->id])}}">Download Zip</a>
           <a class="btn btn-primary" href="{{$journal->id}}/assigns">Assign to Reviewer</a>


       </div>
       <!-- /.container-fluid -->

     </div>
     <!-- /.content-wrapper -->

   </div>
   <!-- /#wrapper -->

 @endsection
