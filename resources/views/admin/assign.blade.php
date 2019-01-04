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

       <li class="nav-item active">
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
           <li class="breadcrumb-item active">Assigns</li>
         </ol>

         <!-- Content goes here -->
         <form action="{{ url('/admin/assigns') }}" method="POST">
           {{ csrf_field() }}
         <div class="input-group">
           <input type="text" name="search" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
           <div class="input-group-append">
             <input class="btn btn-primary" type="submit" value="search">
           </div>
         </div>
         </form>
         <br>

         @if(isset($assign))
           <div class="table-responsive">
           <table class="table table-bordered" width="100%" cellspacing="0">
             @if(count($assign) > 0)
             <tr>
               <th>Lead Author Name</th>
               <th>Reviewer Name</th>
               <th>Journal Title</th>
               <th>Assign Date</th>
               <th>Status</th>
               <th>Action</th>
             </tr>
             @foreach ($assign as $assigns)
             <tr>
               <td>{{$assigns->uname}}</td>
               <td>{{$assigns->rname}}</td>
               <td>{{$assigns ->jtitle}}</td>
               <td>{{$assigns ->createdAt}}</td>
               <td>
                 @if($assigns ->status == 0)
                   <div style="color: red;">Pending respond email.</div>
                 @else
                   <div style="color: green">Received respond emil.</div>
                 @endif
               </td>
               <th>
                 <form action="{{url('admin/assigns', [$assigns->assignid])}}" method="POST">
                    {{ csrf_field() }}
                   <input type="hideen" name="status" value="1" hidden>
                  <input type="submit" value="update" class="btn btn-link">
                 </form>
               </th>
               @endforeach
             </tr>

           @else
             Not found
           @endif
           </table>
           </div>

         @else

           <div class="table-responsive">
           <table class="table table-bordered" width="100%" cellspacing="0">
             @if(count($assign1) > 0)
             <tr>
               <th>Lead Author Name</th>
               <th>Reviewer Name</th>
               <th>Journal Title</th>
               <th>Assign Date</th>
               <th>Status</th>
               <th>Action</th>
             </tr>
             @foreach ($assign1 as $assigns1)
             <tr>
               <td>{{$assigns1->uname}}</td>
               <td>{{$assigns1->rname}}</td>
               <td>{{$assigns1 ->jtitle}}</td>
               <td>{{$assigns1 ->createdAt}}</td>
               <td>
                 @if($assigns1 ->status == 0)
                   <div style="color: red;">Pending respond email.</div>
                 @else
                   <div style="color: green">Received respond emil.</div>
                 @endif
               </td>
               <th>
                 <form action="{{url('admin/assigns', [$assigns1->assignid])}}" method="POST">
                    {{ csrf_field() }}
                   <input type="hideen" name="status" value="1" hidden>
                  <input type="submit" value="update" class="btn btn-link">
                 </form>
               </th>
               @endforeach
             </tr>
           @endif
           </table>
           {{$assign1->links()}}
           </div>
       @endif


       </div>
       <!-- /.container-fluid -->

     </div>
     <!-- /.content-wrapper -->

   </div>
   <!-- /#wrapper -->

 @endsection
