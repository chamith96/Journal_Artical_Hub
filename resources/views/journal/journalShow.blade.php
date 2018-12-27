@extends('layouts.app')
    @section('content')
    <div class="container">
      <br>

      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{url('dashboard')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Journal details</li>
      </ol>

    </li>
    <li class="list-group-item"><p>Article Title: {{$journal->title}}</p></li>
    <li class="list-group-item"><p>Abstract: {{$journal->abstract}}</p></li>
    <li class="list-group-item"><p>Keywords: {{$journal->keywords}}</p></li>
    <br>
    <li class="list-group-item"><p>Author 1 First Name: {{$journal->a1fname}}</p></li>
    <li class="list-group-item"><p>Author 1 Last Name: {{$journal->a1lname}}</p></li>
    <li class="list-group-item"><p>Author 1 Affiliation: {{$journal->a1affiliation}}</p></li>
    <li class="list-group-item"><p>Author 1 Email: {{$journal->a1email}}</p></li>
    <br>
    @if($journal->a2email!= null)
      <li class="list-group-item"><p>Author 2 First Name: {{$journal->a2fname}}</p></li>
      <li class="list-group-item"><p>Author 2 Last Name: {{$journal->a2lname}}</p></li>
      <li class="list-group-item"><p>Author 2 Affiliation: {{$journal->a2affiliation}}</p></li>
      <li class="list-group-item"><p>Author 2 Email: {{$journal->a2email}}</p></li>
    @endif
    <br>
    @if($journal->a3email!= null)
      <li class="list-group-item"><p>Author 3 First Name: {{$journal->a3fname}}</p></li>
      <li class="list-group-item"><p>Author 3 Last Name: {{$journal->a3lname}}</p></li>
      <li class="list-group-item"><p>Author 3 Affiliation: {{$journal->a3affiliation}}</p></li>
      <li class="list-group-item"><p>Author 3 Email: {{$journal->a3email}}</p></li>
    @endif
    <br>
    @if($journal->a4email!= null)
      <li class="list-group-item"><p>Author 4 First Name: {{$journal->a4fname}}</p></li>
      <li class="list-group-item"><p>Author 4 Last Name: {{$journal->a4lname}}</p></li>
      <li class="list-group-item"><p>Author 4 Affiliation: {{$journal->a4affiliation}}</p></li>
      <li class="list-group-item"><p>Author 4 Email: {{$journal->a4email}}</p></li>
    @endif
    <br>

  </ul>
</div>
<br>
    @endsection
