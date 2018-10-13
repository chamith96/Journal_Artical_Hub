 @extends('layouts.appAdmin')
 @section('content')
 <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item active">
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
            <li class="breadcrumb-item active">Overview</li>
          </ol>

          <!-- Icon Cards-->
          <div class="row">
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-users"></i>
                  </div>
                  <div class="mr-5">{{ $userShow }} Users</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{{url('admin/users')}}">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-users"></i>
                  </div>
                  <div class="mr-5">{{ $reviewerShow }} Reviewers</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{{url('admin/reviewers')}}">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-newspaper"></i>
                  </div>
                  <div class="mr-5">{{ $journalShow }} Journals</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{{url('admin/journals')}}">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-danger o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-newspaper"></i>
                  </div>
                  <div class="mr-5">{{ $newsletterShow }} Newsletters</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{{url('admin/newsletters')}}">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
          </div>

          <!-- Content goes here -->

          </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

  @endsection
