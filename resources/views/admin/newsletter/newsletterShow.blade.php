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

       <li class="nav-item active">
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
             <a href="{{url('admin/newsletters')}}">Newsletters</a>
           </li>
           <li class="breadcrumb-item active">{{$newsletter->title}}</li>
         </ol>

         <!-- Content goes here -->
           <ul class="list-group">
             <li class="list-group-item"><b>ID:</b> {{$newsletter->id}}</li>
             <li class="list-group-item"><b>Title:</b> {{$newsletter->title}}</li>
             <li class="list-group-item"><b>Full Name:</b> {{$newsletter->name}}</li>
             <li class="list-group-item"><b>Email:</b> {{$newsletter->email}}</li>
             <li class="list-group-item"><b>Faculty/Center:</b> {{$newsletter->administration}}</li>
             <li class="list-group-item"><b>Department:</b> {{$newsletter->department}}</li>
             <li class="list-group-item"><b>Description:</b> {{$newsletter->description}}</li>
             <li class="list-group-item"><b>Created at:</b> {{$newsletter->created_at}}</li>
           </ul> <br>
             <button class="btn btn-danger" data-toggle="modal" data-target="#myModal">Delete</button>


             <!-- Modal -->
             <div class="modal fade" id="myModal" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Delete Warning !!</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                    <p>Sure to delete {{$newsletter->title}} ?</p>
                  </div>
                  <div class="modal-footer">
                            <form action="{{url('admin/newsletters', [$newsletter->id])}}" method="POST">
                              {{csrf_field()}}
                              <input type="hidden" name="_method" value="DELETE">
                              <input type="submit" class="btn btn-danger" value="Delete" data-toggle="modal" data-target="#myModal">
                            </form>
                  </div>
                </div>

              </div>
              </div>

       </div>
       <!-- /.container-fluid -->

     </div>
     <!-- /.content-wrapper -->

   </div>
   <!-- /#wrapper -->

 @endsection
