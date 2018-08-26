@extends('layouts.app')
    @section('content')
      <div class="container">
        <h1>Journal</h1> <br>
        @include('layouts.messages')
      <form action="{{url('journals')}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
      <div class="form-group">
        <label for="exampleFormControlInput1">Full Name</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="name">
      </div>

      <div class="form-group">
        <label for="exampleFormControlSelect1">Faculty/Center</label>
        <select class="form-control" id="exampleFormControlSelect1" name="administration">
          <optgroup label="Faculty">
            <option>Faculty of Agricultural Sciences</option>
            <option>Faculty of Applied Sciences</option>
            <option>Faculty of Geomatics</option>
            <option>Faculty of Management Studies</option>
            <option>Faculty of Social Sciences and Languages</option>
            <option>Faculty of Medicine</option>
            <option>Faculty of Technology</option>
            <option>Faculty of Graduate Studies</option>
          <optgroup label="Center">
            <option>Centre for Computer Studies</option>
            <option>Staff Development Centre</option>
            <option>Center for Research and Knowledge Dissemination</option>
            <option>The Career Guidance Unit</option>
            <option>Centre for Open and Distance Learning</option>
            <option>Centre for Indigenous Knowledge and Community Studies (CIKCS)</option>
            <option>Center for GEE</option>
            <option>Internal Quality Assurance Unit</option>
        </select>
      </div>

      <div class="form-group">
        <label for="exampleFormControlSelect1">Select Department</label>
        <select class="form-control" id="exampleFormControlSelect1" name="department">
          <option>Not from faculty</option>
          <optgroup label="Faculty of Agricultural Sciences">
            <option>Department of Export Agriculture</option>
            <option>Department of Livestock Production</option>
            <option>Deparment of Agribusiness Management</option>
          <optgroup label="Faculty of Applied Sciences">
            <option>Department of Computing and Information Systems</option>
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
            <option>Department ofsocial sciences</option>
            <option>Department of languages</option>
            <option>Department of Geography & Environmental Management</option>
            <option>Department of Economics & Statistics</option>
            <option>Department of English Language Teaching</option>
          <optgroup label="Faculty of Medicine">
            <option>Department of Anatomy</option>
            <option>Department of Physiology</option>
            <option>Department of Biochemistry</option>
          <optgroup label="Faculty of Technology">
            <option>Department of Biosystems Technology</option>
            <option>Department of Engineering Technology</option>
        </select>
      </div>

      <div class="form-group">
        <label for="exampleFormControlInput1">Journal Title</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="title">
      </div>

      <div class="form-group">
        <label for="exampleFormControlTextarea1">Journal Description</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
      </div>

      <div class="form-group">
        <label for="exampleFormControlInput1">Journal Date</label>
        <input type="date" class="form-control" id="exampleFormControlInput1" name="journal_date">
      </div>

      <div class="form-group">
        <label for="exampleFormControlInput1">Insert pdf files</label>
        <input type="file" name="pdf">
      </div>

      <div class="form-group">
        <label for="exampleFormControlInput1">Insert doc files</label>
        <input type="file" name="doc">
      </div>

      <input type="submit" value="Submit" class="btn btn-primary">
    </form>
    </div>

    <br>
  @endsection
