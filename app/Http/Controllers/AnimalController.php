<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\AnimalType;
use App\Models\Contact;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $animals = Animal::with(['animalType', 'breeder', 'owner'])
            ->paginate(15);
        return view('animals.index', compact('animals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $animalTypes = AnimalType::all();
        $animals = Animal::all();
        $contacts = Contact::all();

        return view('animals.create', compact(
            'animalTypes',
            'animals',
            'contacts'
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'animal_type_id' => 'required|exists:animal_types,id',
            'tag' => 'nullable|string|max:64',
            'name' => 'nullable|string|max:100',
            'sex' => 'required|in:male,female',
            'date_of_birth' => 'nullable|date',
            'date_of_death' => 'nullable|date',
            'maternal_id' => 'nullable|exists:animals,id',
            'paternal_id' => 'nullable|exists:animals,id',
            'breeder_id' => 'nullable|exists:contacts,id',
            'owner_id' => 'nullable|exists:contacts,id',
            'num_of_siblings_at_birth' => 'nullable|integer|min:0|max:255',
            'birth_weight' => 'nullable|numeric',
            'color_pattern' => 'nullable|string|max:255',
            'photo' => 'nullable|image|max:5120',
            'breed_composition' => 'required|json',
            'attributes' => 'nullable|json',
        ]);

        // Handle file upload if exists
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('animals/photos', 'public');
            $validated['photo'] = $photoPath;
        }

        // Decode JSON fields
        $validated['breed_composition'] = json_decode(
            $validated['breed_composition'],
            true
        );
        if (!empty($validated['attributes'])) {
            $validated['attributes'] = json_decode(
                $validated['attributes'],
                true
            );
        }

        Animal::create($validated);

        return redirect()->route('animals.index')->with('success', 'Animal created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $animal = Animal::with([
            'animalType',
            'maternal',
            'paternal',
        ])->findOrFail($id);

        return view('animals.show', compact('animal'));
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
