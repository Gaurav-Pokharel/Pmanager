@extends('layouts.app')
@section('content')

      <!-- Jumbotron -->
    <div class="jumbotron">
        <h1>{{$project->name}}!</h1>
        <p class="lead">{{$project->description}}</p>
        <!-- <p><a class="btn btn-lg btn-success" href="#" role="button">Get started today</a></p> -->
    </div>
    
    <div class="row" >
    <div class="col-md-9 col-lg-9 col-sm-9 pull-left"style="background:white; margin-bottom:0px margin-top:10px; margin-left:10px margin-right:10px">

      <!-- Example row of columns -->
      <!-- <div>
        <a href="/projects/create" class="btn btn-default btn-sm pull-right">Add Project</a>
      </div> -->

      
        <form method="POST" action="{{route('comments.store')}}">
              {{csrf_field()}}
              <input type="hidden" name="commentable_id" value="{{$project->id}}">
              <input type="hidden" name="commentable_type" value="App\Project">
        
              <div class="form-group">
                  <label for="Comment">Comment</label>
                  <textarea 
                    class="form-control"  
                    name="body" 
                    placeholder="Enter Comment"
                    cols="100" 
                    rows="5">
                  </textarea>
              
              <div class="form-group">
                  <label for="comment content">Proof of work done(URL/Screenshot)</label>
                  <textarea 
                    class="form-control" 
                    name="url" 
                    placeholder="Enter URL/Screenshot" 
                    cols="100"
                    rows="3">
                  </textarea>
              </div>
          
              <div class="form-group">
                  <input type="submit" value="Submit" class="btn btn-primary">
              </div>
        </form>
        @include('partial.comments')
      </div> 
      </div> 
	
      

      <!--<div class="row" style="background:white; margin-bottom:10px margin-top:0px; margin-left:10px margin-right:10px;">
         {{--@foreach($project->projects as $project)
        <div class="col-lg-4 col-sm-4 col-md-4">
          <h2>{{$project->name}}!</h2>
          <p class="text-danger">{{$project->description}} </p>
          <p><a class="btn btn-primary" href="/projects/{{$project->id}}" role="button">View Project »</a></p>
        </div>
        @endforeach--}} 
      </div>-->
    
    
      <div class="col-sm-3 col-md-3 col-lg-3  blog-sidebar ">
          <!-- <div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
          </div> -->
          <div class="sidebar-module">
            <h4>Action</h4>
            <ol class="list-unstyled">
              <li><a href="/projects">My Projects</a></li>
              <li><a href="/projects/create">Add Project</a></li>
              <li><a href="/projects/{{$project->id}}/edit">Edit</a></li>
              <br>

              @if($project->user_id==Auth::user()->id)
                <li><a href="#"
                      onclick="
                      var result= confirm('Are you sure you wish to delete this project');
                      if(result){
                        event.preventDefault();
                        document.getElementById('delete-form').submit();
                      }"
                      >
                Delete
                </a>
                      <form id="delete-form" action="{{route('projects.destroy',[$project->id])}}"
                        method="POST" style="display:none;">
                        <input type="hidden" name="_method" value="delete">
                         {{csrf_field()}}
                         </form>        
                </li>
              @endif
              <!-- <li><a href="#">Add new member</a></li> -->
            </ol>
            <hr/>
          </div>
          <form method="GET" action="{{route('projects.adduser',[$project->id])}}">
            {{csrf_field()}}       
              <div class="form-group">
              <label><h4>Add Member</h4></label>
              <input 
                type="email" 
                class="form-control"
                name="email" 
                id="username"
                required 
                placeholder="Email" 
                >
              </div>
            <div class="form-group">
                <input type="submit" value="Add" class="btn btn-default">
            </div>
          </form>
          <hr/>
           <div class="sidebar-module">
            <h4>Team Members</h4>
            <ol class="list-unstyled">
              <li><a href="#">March 2014</a></li>
            </ol>
          </div> 
          </div>
    
    </div>
          
        
        
    @endsection