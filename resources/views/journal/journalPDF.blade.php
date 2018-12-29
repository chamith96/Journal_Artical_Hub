<ul>
</li>
<li class="list-group-item"><p><b>Article Title:</b> {{$journal->title}}</p></li>
<li class="list-group-item"><p><b>Abstract:</b> {{$journal->abstract}}</p></li>
<li class="list-group-item"><p><b>Keywords:</b> {{$journal->keywords}}</p></li>
<li class="list-group-item"><p><b>Publish Date:</b> {{$journal->jdate}}</p></li>
<br>
<li class="list-group-item"><p><b>Author 1 Full Name:</b> {{$journal->a1fname}} {{$journal->a1lname}}</p></li>
<li class="list-group-item"><p><b>Author 1 Affiliation:</b> {{$journal->a1affiliation}}</p></li>
<li class="list-group-item"><p><b>Author 1 Email:</b> {{$journal->a1email}}</p></li>
<br>
@if($journal->a2email!= null)
<li class="list-group-item"><p><b>Author 2 Full Name:</b> {{$journal->a2fname}} {{$journal->a2lname}}</p></li>
<li class="list-group-item"><p><b>Author 2 Affiliation:</b> {{$journal->a2affiliation}}</p></li>
<li class="list-group-item"><p><b>Author 2 Email:</b> {{$journal->a2email}}</p></li>
@endif
<br>
@if($journal->a3email!= null)
<li class="list-group-item"><p><b>Author 3 Full Name:</b> {{$journal->a3fname}} {{$journal->a3lname}}</p></li>
<li class="list-group-item"><p><b>Author 3 Affiliation:</b> {{$journal->a3affiliation}}</p></li>
<li class="list-group-item"><p><b>Author 3 Email:</b> {{$journal->a3email}}</p></li>
@endif
<br>
@if($journal->a4email!= null)
<li class="list-group-item"><p><b>Author 4 Full Name:</b> {{$journal->a4fname}} {{$journal->a4lname}}</p></li>
<li class="list-group-item"><p><b>Author 4 Affiliation:</b> {{$journal->a4affiliation}}</p></li>
<li class="list-group-item"><p><b>Author 4 Email:</b> {{$journal->a4email}}</p></li>
@endif
</ul>
