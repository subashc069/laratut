<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectsController extends Controller
{   
    // User authentication
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){

        $projects = Project::where('owner_id', auth()->id())->get();
        
        return view('projects.index', compact('projects'));
    }

    public function create(){
        return view('projects.create');
    }

    public function show(Project $project){

        // if($project->owner_id !== auth()->id()){
        //     abort(403);
        // }
        
        $this->authorize('update',$project);
        return view('projects.show', compact('project'));
    }

    public function edit(Project $project){
        
        $this->authorize('update',$project);
        return view('projects.edit', compact('project'));
    }

    public function update(Project $project){

        $this->authorize('update',$project);
        request()->validate([
            'title' =>'required|min:3|max:225',
            'description'=> 'required|min:3',
        ]);
        
        $project->update(request(['title','description']));

        return redirect('/projects');
    }

    public function destroy(Project $project){
        $this->authorize('update',$project);
        $project->delete();

        return redirect('/projects');
    }

    public function store(){
        $this->authorize('update',$project);
        $validated = request()->validate([
            'title' =>'required|min:3|max:255',
            'description'=> 'required',
        ]);

        $validated['owner_id'] = auth()->id();

        
        Project::create($validated);


        return redirect('/projects');
    }
}
