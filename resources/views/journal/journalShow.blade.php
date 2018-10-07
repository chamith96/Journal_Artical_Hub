@extends('layouts.app')
    @section('content')
    <div class="container">
  <li class="list-group-item active">
    @if(count($status) > 0)
      <ul>
      @foreach ($status as $statuss)
        <li>
          @if($statuss->action == 0)
            <p>We sent your journal to <i>{{$statuss->reviewer}}</i>. We will emil when reviewer respond.</p>
          @else
            <p><i>{{$statuss->reviewer}}</i> reviewed your journal. Please check your emails.</p>
          @endif
        </li>
      @endforeach
      </ul>
    @else
      <p>Do not assign to reviewer yet.</p>
    @endif
    
    </li>
    <li class="list-group-item"><p>Author name: {{$journal->name}}</p></li>
    <li class="list-group-item"><p>Administration: {{$journal->administration}}</p></li>
    <li class="list-group-item"><p>Department: {{$journal->department}}</p></li>
    <li class="list-group-item"><p>Journal Title: {{$journal->title}}</p></li>
    <li class="list-group-item"><p>Journal Description: {{$journal->description}}</p></li>
    <li class="list-group-item"><p>Journal release date: {{$journal->journal_date}}</p></li>
  </ul>
    <a href="/dashboard" class="btn btn-default">Back to Dashboard</a>
</div>
    @endsection
