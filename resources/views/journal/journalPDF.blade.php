<style>
#journal {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#journal td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
}

#journal tr:nth-child(even){background-color: #f2f2f2;}

#journal tr:hover {background-color: #ddd;}

#journal th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}
</style>

<table id="journal">
  <tr>
    <th>ID</th>
    <th>Author name</th>
    <th>Administration</th>
    <th>Department</th>
    <th>Author</th>
    <th>Journal Title</th>
    <th>Journal Description</th>
    <th>Journal release date</th>
  </tr>
  <tr>
    <td>{{$journal->id}}</td>
    <td>{{$journal->name}}</td>
    <td>{{$journal->administration}}</td>
    <td>{{$journal->department}}</td>
    <td>{{$journal->author}}</td>
    <td>{{$journal->title}}</td>
    <td>{{$journal->description}}</td>
    <td>{{$journal->journal_date}}</td>
  </tr>
</table>
