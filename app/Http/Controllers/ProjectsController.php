<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Http\Requests\StoreProjects;
use App\Http\Requests\UpdateProjectRequest;

class ProjectsController extends Controller
{   
    // User authentication
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $projects = Project::where('owner_id', auth()->id())->get();
        
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function show(Project $project)
    {

        // if($project->owner_id !== auth()->id()){
        //     abort(403);
        // }
       // dd($project->owner_id);
        
        $this->authorize('update',$project);
        return view('projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        
        $this->authorize('update',$project);
        return view('projects.edit', compact('project'));
    }

    public function update(UpdateProjectRequest $request, Project $project)
    {

        $this->authorize('update',$project);

        $validated = $request->validated();       
        $project->update(request(['title','description']));

        return redirect('/projects');
    }

    public function destroy(Project $project)
    {
        $this->authorize('update',$project);
        $project->delete();

        return redirect('/projects');
    }

    public function store(StoreProjects $request)
    {
        $validated = $request->validated();
        $validated['owner_id'] = auth()->id();
        
        Project::create($validated);
        return redirect('/projects');
    }
}