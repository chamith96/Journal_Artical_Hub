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
           <li class="breadcrumb-item active">Reviewer</li>
         </ol>

         <!-- Content goes here -->

         <a href="reviewers/create" class="btn btn-info">
           <i class="fa fa-user-plus"></i> Add Reviewer</a>

             @include('layouts.messages')
             @if(count($reviewer) > 0)
               <br> <br>
               <div class="card-header" align="center"><b>Reviewers</b></div>
               <div class="table-responsive">
               <table class="table table-bordered" width="100%" cellspacing="0">
                 <tr>
                   <th>Name</th>
                   <th>Details</th>
                   <th>Send Emails</th>
                   <th>Edit User</th>
                   <th>Delete User</th>
                 </tr>
                 @foreach ($reviewer as $reviewers)
                 <tr>
                     <td>
                       {{$reviewers->name}}
                     </td>
                     <td>
                       <a href="reviewers/{{$reviewers->id}}">content</a>
                     </td>
                     <td>
                       <a href="/admin/reviewers/email/{{$reviewers->id}}">
                         <span class="fas fa-fw fa-envelope"></span> email
                       </a>
                     </td>
                     <td>
                       <a href="/admin/reviewers/{{$reviewers->id}}/edit">
                         <span class="fas fa-fw fa-edit"></span> edit
                       </a>
                     </td>
                     <td>
                       <a href="#" data-toggle="modal" data-target="#myModal" class="text-danger">
                         <span class="fas fa-fw fa-trash"></span> delete
                       </a>

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
                              <p>Sure to delete {{$reviewers->name}} ?</p>
                            </div>
                            <div class="modal-footer">
                                      <form action="{{url('admin/reviewers', [$reviewers->id])}}" method="POST">
                                        {{csrf_field()}}
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="submit" class="btn btn-danger" value="Delete" data-toggle="modal" data-target="#myModal">
                                      </form>
                            </div>
                          </div>
                     </td>
                   @endforeach
                 </tr>
               </table>
             </div>
            {{$reviewer->links()}}
             </div>
               @else
                   <div class="panel-heading"><h3>Don't have registered any Reviewer yet.</h3>
                   </div>
             @endif

       </div>

       <!-- /.container-fluid -->

     </div>
     <!-- /.content-wrapper -->

   </div>
   <!-- /#wrapper -->

 @endsection
