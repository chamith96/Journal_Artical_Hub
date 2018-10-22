@extends('layouts.app')
    @section('content')
    <div class="container">
 @include('layouts.messages')
        <form  method="POST" action="{{url('newsletters')}}" enctype="multipart/form-data" class="form-horizontal" id="newsletter_form" name="classic">
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
              <select class="form-control" name="administration" onChange="updatedepartment(this.selectedIndex)">
                <optgroup label="Faculty">
                  <option>Select</option>
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
            <label class="col-md-4 control-label">Select Department</label>
            <div class="col-md-4 inputGroupContainer">
              <select class="form-control" id="exampleFormControlSelect1" name="department" onClick="this.options[this.options.selectedIndex].value">
              </select>
            </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label">Publisher</label>
                <div class="col-md-4 inputGroupContainer">
                  <div class="row">
                    <div class="col-md-4"><input name="author" type="radio" value="Student"> Student</div>
                    <div class="col-md-4"><input name="author" type="radio" value="Lecturer"> Lecturer</div>
                    <div class="col-md-4"><input name="author" type="radio" value="Other"> Other</div>
                  </div>
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
<script>

var administrationlist=document.classic.administration
var departmentlist=document.classic.department

var department=new Array()
department[0]=[""]
department[1]=["Department of Export Agriculture", "Department of Livestock Production", "Deparment of Agribusiness Management"]
department[2]=["Department of Computing and Information Systems" ,"Department of Food Science and Technolog","Department of Natural Resource" ,"Department of Physical Sciences and Technologie" ,"Department of Sport Sciences and Physical Education"]
department[3]=["Department of Remote Sensing and GIS", "Department of Surveying and Geodesy"]
department[4]=["Department of Tourism Management", "Department of Business Management", "Department of Marketing Management","Department of Accountancy and Finance"]
department[5]=["Department of Social sciences" ,"Department of languages" ,"Department of Geography & Environmental Management" ,"Department of Economics & Statistics" ,"Department of English Language Teaching"]
department[6]=["Department of Anatomy" ,"Department of Physiology" ,"Department of Biochemistry"]
department[7]=["Department of Biosystems Technology" ,"Department of Engineering Technology"]
department[8]=["Faculty of Graduate Studies"]
department[9]=["Not from faculty"]
department[10]=["Not from faculty"]
department[11]=["Not from faculty"]
department[12]=["Not from faculty"]
department[13]=["Not from faculty"]
department[14]=["Not from faculty"]
department[15]=["Not from faculty"]
department[16]=["Not from faculty"]


function updatedepartment(selectedcitygroup){
    departmentlist.options.length=0
    if (selectedcitygroup>0){
        for (i=0; i<department[selectedcitygroup].length; i++)
            departmentlist.options[departmentlist.options.length]=new Option(department[selectedcitygroup][i].split("|")[0], department[selectedcitygroup][i].split("|")[1])
    }
}

</script>
    @endsection
