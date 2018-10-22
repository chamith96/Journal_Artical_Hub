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

       <li class="nav-item">
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

       <li class="nav-item active">
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
           <li class="breadcrumb-item active">Users</li>
         </ol>

         <!-- Content goes here -->
         @include('layouts.messages')
           @if(count($user) > 0)
             <div class="card-header" align="center"><b>Users</b></div>
             <div class="table-responsive">
             <table class="table table-bordered" width="100%" cellspacing="0">
               <tr>
                 <th>Name</th>
                 <th>Type</th>
                 <th>details</th>
                 <th>Send Emails</th>
               </tr>
               @foreach ($user as $users)
               <tr>
                   <td>
                     {{$users->name}}
                   </td>
                   <td>
                     {{$users->author}}
                   </td>
                   <td>
                     <a href="{{url('/admin/users', [$users->id])}}">content</a>
                   </td>
                   <td>
                     <a href="{{url('/admin/users/email', [$users->id])}}">
                       <span class="fas fa-fw fa-envelope"></span> Send mail
                     </a>
                   </td>
                 @endforeach
               </tr>
             </table>
             </div>
           {{$user->links()}}
           @endif

       </div>
       <!-- /.container-fluid -->

     </div>
     <!-- /.content-wrapper -->

   </div>
   <!-- /#wrapper -->

 @endsection
