@extends('layouts.app')
    @section('content')
    <div class="container">
      <br>

      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{url('dashboard')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Journal assign details</li>
      </ol>

  <li class="list-group-item">
    @if(count($status) > 0)
      <ul>
      @foreach ($status as $statuss)
        <li>
          @if($statuss->action == 0)
            <p>We sent your journal to <i>{{$statuss->reviewer}}</i>. We will emil when reviewer respond</i></h4>
          @else
            <h4><i>{{$statuss->reviewer}}</i> reviewed your journal. Please check your emails</i></h4>
          @endif
        </li>
      @endforeach
      </ul>
    @else
      <h4><i>Do not assign to reviewer yet</i></h4>
    @endif

  </ul>
</div>
<br>
    @endsection
