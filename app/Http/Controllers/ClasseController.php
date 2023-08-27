<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Classe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ClasseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = Classe::all();
        $Categories = Categorie::all();

        $test = "Abdi";

        return view('classes.index', compact('classes', 'Categories', 'test'));
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
        // Validate the incoming request data
        $validatedData = $request->validate([
            'nom_classe' => 'required|string|max:255',
            'effectif' => 'required|string',
        ]);
        $classe = new Classe();

        $classe->nom_classe = $request->nom_classe;
        $classe->effectif = $request->effectif;
        $classe->categorie_id = $request->categorie;
        
        
        $classe->save();
        Session::flash('success', 'classe created successfully');
        return redirect()->route('classes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $classe = Classe::find($id);
        // Vérifier si la classe existe
        if ($classe) {
            return view('etudiants.show', ['classe' => $classe]);
        } else {
            return abort(404); // Classe non trouvée
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Classe $classe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Classe $classe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classe $classe)
    {
        //
    }
}
