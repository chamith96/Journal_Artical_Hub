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
           <li class="breadcrumb-item active">journals</li>
         </ol>

         <!-- Content goes here -->
            @include('layouts.messages')
             @if(count($journal) > 0)
               <div class="card-header" align="center"><b>journals</b></div>
               <div class="table-responsive">
               <table class="table table-bordered" width="100%" cellspacing="0">
                 <tr>
                   <th>Id</th>
                   <th>Title</th>
                   <th>details</th>
                   <th>Date</th>
                   <th>Assign to reviewer</th>
                   <th>Download zip</th>
                   <th>Download Pdf</th>
                 </tr>
               @foreach ($journal as $journals)
                  <tr>
                    <td>
                      {{$journals->id}}
                    </td>
                    <td>
                      {{$journals->title}}
                    </td>
                    <td>
                      <a href="/admin/journals/{{$journals->id}}">content</a>
                    </td>
                    <td>
                      {{$journals->created_at}}
                    </td>
                    <td>
                    <a href="journals/{{$journals->id}}/assigns"><span class="fas fa-tasks"></span> Assign</a>
                    </td>
                    <td>
                    <a href="{{route('downloadFilesJournal', [$journals->id])}}"><span class="far fa-file-archive"></span> Download</a>
                    </td>
                    <td>
                    <a href="{{route('pdfShowJournal', [$journals->id])}}"><span class="far fa-file-pdf"></span> Download</a>
                    </td>

               @endforeach
             </tr>
           </table>
           </div>
               {{$journal->links()}}
               @else
                   <div class="panel-heading"><h3>Don't have any journal yet.</h3>
                   </div>
             @endif


       </div>
       <!-- /.container-fluid -->

     </div>
     <!-- /.content-wrapper -->

   </div>
   <!-- /#wrapper -->

 @endsection
