<table border="1">
  <tr>
    <th>ID</th>
    <th>Author name</th>
    <th>Administration</th>
    <th>Department</th>
    <th>Journal Title</th>
    <th>Journal Description</th>
    <th>Journal release date</th>
  </tr>
  <tr>
    <td>{{$journal->id}}</td>
    <td>{{$journal->name}}</td>
    <td>{{$journal->administration}}</td>
    <td>{{$journal->department}}</td>
    <td>{{$journal->title}}</td>
    <td>{{$journal->description}}</td>
    <td>{{$journal->journal_date}}</td>
  </tr>
</table>
