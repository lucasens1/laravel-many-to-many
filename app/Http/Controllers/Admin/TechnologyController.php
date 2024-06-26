<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use Illuminate\Http\Request;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $techList = Technology::all();

        return view('admin.technologies.index', compact('techList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.technologies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $newTechnology = new Technology();
        $newTechnology->name = $data['name'];
        $newTechnology->color = $data['color'];

        $newTechnology->save();
        return redirect()->route('admin.technologies.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Technology $technology)
    {
        return view('admin.technologies.show', compact('technology'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Technology $technology)
    {
        return view('admin.technologies.edit', compact('technology'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Technology $technology)
    {
        $data = $request->all();
        $technology->name = $data['name'];
        $technology->version = $data['version'];
        $technology->description = $data['description'];
        $technology->docs = $data['docs'];
        $technology->save();
        return redirect()->route('admin.technologies.index')->with('message', 'Il tipo : '.$technology->name.' è stato aggiornato con successo');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Technology $technology)
    {   
        $technology->projects()->detach();
        $technology->delete();
        return redirect()->route('admin.technologies.index')->with('message', 'Il tipo : '.$technology->name.' è stato cancellato correttamente.');
    }
}