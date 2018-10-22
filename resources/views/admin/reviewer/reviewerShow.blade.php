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

       <li class="nav-item active">
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
           <li class="breadcrumb-item">
             <a href="{{url('admin/reviewers')}}">Reviewers</a>
           </li>
           <li class="breadcrumb-item active">{{$reviewer->name}}</li>
         </ol>

         <!-- Content goes here -->
         <ul class="list-group">
           <li class="list-group-item"><p>Reviewer name: {{$reviewer->name}}</p></li>
           <li class="list-group-item"><p>Reviewer email: {{$reviewer->email}}</p></li>
           <li class="list-group-item"><p>Reviewer Organization: {{$reviewer->organization}}</p></li>
           <li class="list-group-item"><p>Reviewer Position: {{$reviewer->position}}</p></li>
           <li class="list-group-item"><a href="#" data-toggle="modal" data-target="#myModal">View Assigns</a></li>
         </ul> <br>

         <!-- Modal -->
         <div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Assigns</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <ul class="list-group">
                    @if(count($details) > 0)
                      @foreach ($details as $detail)
                        <li class="list-group-item">
                          <ul>
                            <li>Journal Name: {{$detail->jtitle}}</li>
                            <li>Author Name: {{$detail->uname}}</li>

                          @if($detail ->status == 0)
                            <li>Journal Status: respond email sended to reviewer</li>
                          @else
                            <li>Journal Status: respond emil received from reviewer</li>
                          @endif
                          </ul>
                        </li>
                      @endforeach
                    @else
                       <li class="list-group-item">Journals are not assigned yet</li>
                   @endif
                 </li>
               </ul>
              </div>
            </div>

       </div>
       <!-- /.container-fluid -->

     </div>
     <!-- /.content-wrapper -->

   </div>
   <!-- /#wrapper -->

 @endsection
