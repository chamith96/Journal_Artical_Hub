@extends('layouts.app')
    @section('content')
    <div class="container">
 @include('layouts.messages')
        <form  method="POST" action="{{url('newsletters')}}" enctype="multipart/form-data" class="form-horizontal" id="newsletter_form">
          {{ csrf_field() }}

      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label">Full Name</label>
        <div class="col-md-4 inputGroupContainer">
          <input  name="name" placeholder="Full Name" class="form-control"  type="text">
          </div>
      </div>

      <!-- Text input-->
              <div class="form-group">
                <label class="col-md-4 control-label">Email</label>
                <div class="col-md-4 inputGroupContainer">
              <input  name="email" placeholder="Email" class="form-control"  type="text">
                </div>
              </div>

      <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" >Newsletter title</label>
                <div class="col-md-4 inputGroupContainer">
              <input name="title" placeholder="Newsletter title" class="form-control"  type="text">
              </div>
            </div>

      <!-- Text input-->
              <div class="form-group">
              <label class="col-md-4 control-label">Faculty/Center</label>
              <div class="col-md-4 inputGroupContainer">
              <select class="form-control" name="administration">
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
            </div>

      	<!-- Text input-->
            <div class="form-group">
            <label class="col-md-4 control-label">Select Deparment</label>
            <div class="col-md-4 inputGroupContainer">
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
            </div>

      	<!-- Text input-->
            <div class="form-group">
            <label class="col-md-4 control-label">Newsletter Description</label>
            <div class="col-md-4 inputGroupContainer">
             <textarea name="description" rows="6" cols="80" class="form-control" placeholder="Write short description about your project."></textarea>
            </div>
            </div>

      <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" >Newsletter Date</label>
                <div class="col-md-4 inputGroupContainer">
              <input name="newsletter_date" placeholder="Newsletter Date" class="form-control"  type="date">
                </div>
              </div>

      	<!-- Text input-->
              <div class="form-group">
              <label class="col-md-4 control-label" >Insert images 1</label>
                <div class="col-md-4 inputGroupContainer">
                <div class="input-group">
              <input type="file" name="image1">
                </div>
              </div>
            </div>

      	<!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" >Insert images 2</label>
                <div class="col-md-4 inputGroupContainer">
                <div class="input-group">
              <input type="file" name="image2">
                </div>
              </div>
            </div>

      	<!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" >Insert images 3</label>
                <div class="col-md-4 inputGroupContainer">
                <div class="input-group">
              <input type="file" name="image3">
                </div>
              </div>
            </div>

      	<!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" >Insert images 4</label>
                <div class="col-md-4 inputGroupContainer">
                <div class="input-group">
              <input type="file" name="image4">
                </div>
              </div>
            </div>

      <!-- Button -->
      <div class="form-group">
        <label class="col-md-4 control-label"></label>
          <div class="col-md-4 inputGroupContainer">

      <input type="submit" Value="Submit" class="btn btn-primary">
        </div>
      </div>

      </form>
</div>
    @endsection
