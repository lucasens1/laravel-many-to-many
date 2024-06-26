<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projectsList = Project::all();
        $typeList = Type::all();

        return view('admin.project.index', compact('projectsList', 'typeList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $typeList = Type::all();
        $technologies = Technology::all();
        // Restituisco la view per aggiungere dati
        return view('admin.project.create', compact('typeList','technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Salvo i dati
        $data = $request->all();
        $newProject = new Project();
        $newProject->title = $data['title'];
        /* Inserisco il nuovo campo preso dalla tabella */
        $newProject->type_id = $data['type_id'];
        $newProject->description = $data['description'];
        // Generiamo lo slug
        $newProject->slug = Str::slug($newProject->title);
        $newProject->save();
        if($request->has('technologies')){
            $newProject->technologies()->attach($request->technologies);
        }

        return redirect()->route('admin.projects.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        $typeList = Type::all();
        return view('admin.project.show', compact('project','typeList'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $typeList = Type::all();
        $technologies = Technology::all();
        return view('admin.project.edit', compact('project','typeList', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
       /*  $data = $request->all(); */
       $data = $request->all();
       $project->title = $data['title'];
       $project->type_id = $data['type_id'];
       $project->description = $data['description'];
       $project->slug = Str::slug($project->title);
       $project->save();
       $project->technologies()->sync($request->technologies);

       return redirect()->route('admin.projects.index')->with('message', 'Progetto : '.$project->title.' aggiornato con successo'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->technologies()->detach();
        $project->delete();
        return redirect()->route('admin.projects.index')->with('message', 'Il post : '.$project->title.' è stato cancellato');
    }
}
