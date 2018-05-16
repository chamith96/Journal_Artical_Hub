<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Newsletter</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>
    <div class="container">
      <h1>Newsletter</h1> <br>
      @include('messages')
    <form action="{{url('newsletter')}}" method="POST" enctype="multipart/form-data">
      {{ csrf_field() }}
    <div class="form-group">
      <label for="exampleFormControlInput1">Full Name</label>
      <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Full Name" name="name">
    </div>

    <div class="form-group">
      <label for="exampleFormControlInput1">Register Number</label>
      <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="14/AC/CI/XX" name="regno">
    </div>

    <div class="form-group">
      <label for="exampleFormControlSelect1">Faculty</label>
      <select class="form-control" id="exampleFormControlSelect1" name="faculty">
        <option>Faculty of Agricultural Sciences</option>
        <option>Faculty of Applied Sciences</option>
        <option>Faculty of Geomatics</option>
        <option>Faculty of Management Studies</option>
        <option>Faculty of Social Sciences and Languages</option>
      </select>
    </div>

    <div class="form-group">
      <label for="exampleFormControlSelect1">Deparment</label>
      <select class="form-control" id="exampleFormControlSelect1" name="deparment">
        <optgroup label="Faculty of Agricultural Sciences">
          <option>Department of Export Agriculture</option>
          <option>Department of Livestock Production</option>
          <option>Deparment of Agribusiness Management</option>
        <optgroup label="Faculty of Applied Sciences">
          <option>Deparment of Computing and Information Systems</option>
          <option>Department of Food Science and Technology</option>
          <option>Department of Natural Resources</option>
          <option>Department of Physical Sciences and Technologies</option>
          <option>Department of Sport Sciences and Physical Education</option>
        <optgroup label="Faculty of Geomatics">
          <option>Department of Remote Sensing and GIS</option>
          <option>Department of Surveying and Geodesy</option>
        <optgroup label="Faculty of Management Studies">
          <option>Department of Tourism Managemen</option>
          <option>Department of Accountancy and Finance</option>
          <option>Department of Business Management</option>
          <option>Department of Marketing Management</option>
        <optgroup label="Faculty of Social Sciences and Languages">
          <option>Department of social sciences</option>
          <option>Department of languages</option>
          <option>Department of Geography & Environmental Management</option>
          <option>Department of Economics & Statistics</option>
          <option>Department of English Language Teaching</option>
      </select>
    </div>

    <div class="form-group">
      <label for="exampleFormControlInput1">Title</label>
      <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Title" name="title">
    </div>

    <div class="form-group">
      <label for="exampleFormControlTextarea1">Body</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="body"></textarea>
    </div>

    <div class="form-group">
      <input type="file" name="images">
    </div>

    <input type="submit" value="Submit" class="btn btn-primary">
  </form>
  </div>
    <br>
  </body>
</html>
