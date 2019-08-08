<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectsController extends Controller
{
    public function index(){

        $projects = Project::all();

        //return $projects;
        return view('projects.index', compact('projects'));
        //return view('projects.index', ['projects'=> $projects]);
    }

    public function create(){
        return view('projects.create');
    }

    public function show(Project $project){
        //$project = Project::findOrFail($id);
        //return $project;
        return view('projects.show', compact('project'));
    }

    public function edit(Project $project){
        
        //$project = Project::findOrFail($id);

        return view('projects.edit', compact('project'));
    }

    public function update(Project $project){

        //$project= Project::findOrFail($id);
        $project->title = request('title');
        $project->description = request('description');
        $project->save();

        return redirect('/projects');
    }

    public function destroy(Project $project){
        
        $project->delete();

        return redirect('/projects');
    }

    public function store(){
        // $project = new Project();

        // $project->title = request('title');
        // $project->description = request('description');
        // $project->save();

        Project::create([
            'title'=> request('title'),
            'description'=> request('description'),
        ]);

        return redirect('/projects');
    }
}
