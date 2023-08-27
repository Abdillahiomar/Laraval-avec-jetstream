<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Categorie;
use App\Models\Enseignant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EnseignantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = Classe::all();
        $categories = Categorie::all();
        $enseignants = Enseignant::all();
        return view('enseignants.index',compact('enseignants','classes','categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'nom' => 'required',
            'prenom' => 'required',
            'tel' => 'required',
            'email' => 'required',
            'sexe' => 'required',
            'date_naissance' => 'required',
            'photo' => 'required|image|max:2048',
        ));


        $enseignant = new Enseignant;

        $enseignant->nom = $request->nom;
        $enseignant->prenom = $request->prenom;
        $enseignant->tel = $request->tel;
        $enseignant->email = $request->email;
        $enseignant->sexe = $request->sexe;
        $enseignant->diplome = $request->diplome;
        $enseignant->date_naissance = $request->date_naissance;
        
        // Store the photo
        $photoPath = $request->file('photo')->store('public/photos/enseignants');
        $photoUrl = Storage::url($photoPath);

        $enseignant->photo = $photoUrl;

        //dd($etudiant);

        $enseignant->save();

        //Eleve::create($validated);
        return redirect()->route('enseignants.index')->with('success', __('Enseignant created  with success'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Enseignant $enseignant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Enseignant $enseignant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Enseignant $enseignant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Enseignant $enseignant)
    {
        //
    }
}
