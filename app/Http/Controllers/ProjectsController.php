<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Company;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (Auth::check()){
            $projects =Project::where('user_id',Auth::user()->id)->get();
            return view('projects.index',['projects'=>$projects]);
        }
        return view('auth.login');
        
    }

    public function adduser(Request $request)
    {
        //To add user to project
        $project=Project::where('id',$project->id)->get();
        $user=User::find($request->input('email'));
        
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($company_id= null)
    {
        //
        $companies=NULL;
        if($company_id==null)
        {
            $companies= Company::where('user_id',Auth::user()->id)->get();
        }
        return view('projects.create',['company_id'=>$company_id,'companies'=>$companies]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if(Auth::check()){
            $project = Project::create([
                'name'=>$request->input('name'),
                'description'=>$request->input('description'),
                'company_id'=>$request->input('company_id'),
                'days'=>$request->input('days'),
                'user_id'=>Auth::user()->id
            ]);
            if($project){
                return redirect()->route('projects.show',['project'=>$project->id])->
                with('success','project created successfully');
             }
        }
        return back()->withInput()->with('errors','Error in creating project');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
       // $project=Project::where('id',$project->id)->first();
       $project=Project::find($project->id);
       $comments=$project->comments;
        return view('projects.show',['project'=>$project,'comments'=>$comments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
        $project=Project::find($project->id);
        return view('projects.edit',['project'=>$project]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //save data
        $projectUpadte = Project::where('id',$project->id)
                                ->update([
                                    'name'=>$request->input('name'),
                                    'description'=>$request->input('description'),
                                ]);
        if($projectUpadte){
            return redirect()->route('projects.show',['project'=>$project->id])
                            ->with('success','project updated successfully');
        }
        //redirect
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
        $findproject = Project::find($project->id);
        if($findproject->delete()){
            return redirect()->route('projects.index')->with('success','project deleted successfully');
        }
        return back()->withInput()->with('error','Compay could not be deleted');
    }
}
