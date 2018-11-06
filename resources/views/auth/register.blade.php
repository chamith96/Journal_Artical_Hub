@extends('layouts.app')

@section('content')
<div class="container">
  <br> <br>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}" name="classic">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                        <label class="col-md-4 control-label">Faculty/Center</label>
                        <div class="col-md-6">
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

                      <div class="form-group">
                      <label class="col-md-4 control-label">Select Deparment</label>
                      <div class="col-md-6">
                        <select class="form-control" id="exampleFormControlSelect1" name="department" onClick="this.options[this.options.selectedIndex].value">
                        </select>
                      </div>
                      </div>

                      <div class="form-group">
                        <label class="col-md-4 control-label">Author</label>
                          <div class="col-md-6">
                            <div class="row">
                              <div class="col-md-4"><input name="author" type="radio" value="Student"> Student</div>
                              <div class="col-md-4"><input name="author" type="radio" value="Lecturer"> Lecturer</div>
                              <div class="col-md-4"><input name="author" type="radio" value="Other"> Other</div>
                            </div>
                          </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

var administrationlist=document.classic.administration
var departmentlist=document.classic.department

var department=new Array()
department[0]=[""]
department[1]=["Department of Export Agriculture", "Department of Livestock Production", "Deparment of Agribusiness Management"]
department[2]=["Department of Computing and Information Systems" ,"Department of Food Science and Technolog","Department of Natural Resource" ,"Department of Physical Sciences and Technologie" ,"Department of Sport Sciences and Physical Education"]
department[3]=["Department of Remote Sensing and GIS", "Department of Surveying and Geodesy"]
department[4]=["Department of Tourism Management", "Department of Business Management", "Department of Marketing Management", "Department of Accountancy and Finance"]
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


function updatedepartment(selectedusergroup){
    departmentlist.options.length=0
    if (selectedusergroup>0){
        for (i=0; i<department[selectedusergroup].length; i++)
            departmentlist.options[departmentlist.options.length]=new Option(department[selectedusergroup][i].split("|")[0], department[selectedusergroup][i].split("|")[1])
    }
}

</script>
@endsection
