<style>
#newsletter {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#newsletter td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
}

#newsletter tr:nth-child(even){background-color: #f2f2f2;}

#newsletter tr:hover {background-color: #ddd;}

#newsletter th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}
</style>

<table id="newsletter">
  <tr>
    <th>ID</th>
    <th>Title</th>
    <th>Publisher</th>
    <th>Publisher Full Name</th>
    <th>Publisher Email</th>
    <th>Faculty/Center</th>
    <th>Department</th>
    <th>Description</th>
    <th>Created at</th>
  </tr>
  <tr>
    <td>{{$newsletter->id}}</td>
    <td>{{$newsletter->title}}</td>
    <td>{{$newsletter->author}}</td>
    <td>{{$newsletter->name}}</td>
    <td>{{$newsletter->email}}</td>
    <td>{{$newsletter->administration}}</td>
    <td>{{$newsletter->department}}</td>
    <td>{{$newsletter->description}}</td>
    <td>{{$newsletter->newsletter_date}}</td>
  </tr>
</table>
