@extends('layouts.app')
@section('content')

      
    <div class="col-md-9 col-lg-9 col-sm-9 pull-left">

      <!-- Example row of columns -->
    <div class="row" style="background:white; margin:10px;">
    <div class="col-mid-11 col-lg-11 col-sm-11">
    <form method="POST" action="{{route('companies.store')}}">
            {{csrf_field()}}
        <input type="hidden" name="_method" value="POST">
        <div class="form-group">
        <label for="company name">Name<span class="required">*</span></label>
        <input 
            type="text" 
            class="form-control"
            name="name" 
            id="companyname"
            required 
            placeholder="Enter Name" 
            >
        </div>
        <div class="form-group">
            <label for="company content">Description</label>
            <textarea class="form-control" id="formGroupExampleInput2" name="description" placeholder="Description" rows="5"></textarea>
        </div>
        <div class="form-group">
        <input type="submit" value="Submit" class="btn btn-primary"></div>
    </form>
    </div>
    </div>
    </div>
      <div class="col-sm-3 col-md-3 col-lg-3  blog-sidebar">
          <!-- <div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
          </div> -->
          <div class="sidebar-module">
            <h4>Action</h4>
            <ol class="list-unstyled">
            <li><a href="/companies">All Companies</a></li>
            </ol>
          </div>
     
          <!-- <div class="sidebar-module">
            <h4>Members</h4>
            <ol class="list-unstyled">
              <li><a href="#">March 2014</a></li>
            </ol>
          </div> -->
          
        </div>
        
    @endsection