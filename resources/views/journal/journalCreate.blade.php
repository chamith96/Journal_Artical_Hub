@extends('layouts.app')
    @section('content')
      <div class="container">
        @include('layouts.messages')
      <form action="{{url('journals')}}" method="POST" enctype="multipart/form-data" class="form-horizontal" id="journal_form">
        {{ csrf_field() }}

  <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" >journal title</label>
            <div class="col-md-4 inputGroupContainer">
          <input name="title" placeholder="Journal title" class="form-control"  type="text">
            </div>
          </div>

    <!-- Text input-->
        <div class="form-group">
        <label class="col-md-4 control-label">journal Description</label>
        <div class="col-md-4 inputGroupContainer">
         <textarea name="description" rows="6" cols="80" class="form-control" placeholder="Write short description about your Journal."></textarea>
        </div>
        </div>

  <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" >journal Date</label>
            <div class="col-md-4 inputGroupContainer">
          <input name="journal_date" placeholder="Newsletter Date" class="form-control"  type="date">
            </div>
          </div>

          <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" >Insert pdf file</label>
            <div class="col-md-4 inputGroupContainer">
          <input type="file" name="pdf">
            </div>
          </div>

          <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" >Insert doc file</label>
            <div class="col-md-4 inputGroupContainer">
          <input type="file" name="doc">
            </div>
          </div>

          <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" >Insert images 1</label>
            <div class="col-md-4 inputGroupContainer">
          <input type="file" name="image1">
            </div>
        </div>

          <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" >Insert images 2</label>
            <div class="col-md-4 inputGroupContainer">
          <input type="file" name="image2">
          </div>
        </div>

          <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" >Insert images 3</label>
            <div class="col-md-4 inputGroupContainer">
          <input type="file" name="image3">
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

    <br>

  @endsection
