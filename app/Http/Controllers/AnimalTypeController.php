<?php

namespace App\Http\Controllers;

use App\Models\AnimalType;
use Illuminate\Http\Request;

class AnimalTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $animalTypes = AnimalType::paginate(10);
        return view('animal_types.index', compact('animalTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('animal_types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required',
        ]);
        AnimalType::create($request->only('type'));
        return redirect()->route('animal-types.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $animalType = AnimalType::findOrFail($id);
        return view('animal_types.show', compact('animalType'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
