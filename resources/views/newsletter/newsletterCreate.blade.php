@extends('layouts.app')
    @section('content')
      <div class="container">
        <h1>Newsletter</h1> <br>
        @include('layouts.messages')
      <form action="{{url('newsletters')}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
      <div class="form-group">
        <label for="exampleFormControlInput1">Full Name</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="name">
      </div>

      <div class="form-group">
        <label for="exampleFormControlInput1">Email</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="email">
      </div>

      <div class="form-group">
        <label for="exampleFormControlSelect1">Faculty/Center</label>
        <select class="form-control" id="exampleFormControlSelect1" name="department">
          <optgroup label="Faculty">
            <option>Faculty of Agricultural Sciences</option>
            <option>Faculty of Applied Sciences</option>
            <option>Faculty of Geomatics</option>
            <option>Faculty of Management Studies</option>
            <option>Faculty of Social Sciences and Languages</option>
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
        <label for="exampleFormControlInput1">Title</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="title">
      </div>

      <div class="form-group">
        <label for="exampleFormControlTextarea1">Description</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
      </div>

      <div class="form-group">
        <label for="exampleFormControlInput1">Insert images 1</label>
        <input type="file" name="image1">
      </div>

      <div class="form-group">
        <label for="exampleFormControlInput1">Insert images 2</label>
        <input type="file" name="image2">
      </div>

      <div class="form-group">
        <label for="exampleFormControlInput1">Insert images 3</label>
        <input type="file" name="image3">
      </div>

      <div class="form-group">
        <label for="exampleFormControlInput1">Insert images 4</label>
        <input type="file" name="image4">
      </div>

      <input type="submit" value="Submit" class="btn btn-primary">
    </form>
    </div>

    <br>
  @endsection
