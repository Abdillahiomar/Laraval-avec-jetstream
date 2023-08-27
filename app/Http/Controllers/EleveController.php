<?php

namespace App\Http\Controllers;

use App\Models\Eleve;
use App\Models\Classe;
use App\Models\Module;
use App\Models\Categorie;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EleveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = Classe::all();
        $categories = Categorie::all();
        $etudiants = Eleve::all();
        return view('etudiants.index',compact('etudiants','classes','categories'));
    }

    // ClasseController.php
public function getClasses($categorieId)
{
    $classes = Classe::where('categorie_id', $categorieId)->get();
    return response()->json($classes);
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    } 
    public function storeFile(Request $request, $id)
    {
        $this->validate($request, array(
            'nom_fichier' => 'required',
            'fichier' => 'required',
        ));

        $eleve = ELeve::find($id);
        $eleve_id = $eleve->id;

        $document = new Document ;

        $document->nom_document = $request->nom_fichier;

        if($request->has('fichier')){
            foreach ($request->file('attachment') as $file){
                $fileName = auth()->id() . '-taskfiles-' . time() . rand(1, 99999) . '.' . $file->getClientOriginalName();
                $fileNom = $file->getClientOriginalName();
                $fileSize = $file->getSize();
                $fileType = $file->guessClientExtension();
                $file->move(public_path('projectfiles/'), $fileName);
            }

            }
        $document->type_document = $fileType;
        $document->fichier_document = $request->fichier;
        $document->eleve_id =$eleve_id;
            dd($document);
        $document->save();

        return view('etudiants.show');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'nom' => 'required',
            'nom_pere' => 'required',
            'nom_mere' => 'required',
            'tel_pere' => 'required',
            'tel_mere' => 'required',
            'email_pere' => 'required',
            'email_mere' => 'required',
            'sexe' => 'required',
            'date_naissance' => 'required',
            'classe_id' => '',
            'photo' => 'required|image|max:2048',
        ));


        $etudiant = new Eleve;

        $etudiant->Nom = $request->nom;
        $etudiant->Nom_pere = $request->nom_pere;
        $etudiant->Nom_mere = $request->nom_mere;
        $etudiant->tel_pere = $request->tel_pere;
        $etudiant->tel_mere = $request->tel_mere;
        $etudiant->email_pere = $request->email_pere;
        $etudiant->email_mere = $request->email_mere;
        $etudiant->sexe = $request->sexe;
        $etudiant->date_naissance = $request->date_naissance;
        $etudiant->classe_id = $request->classe_id;

        // Store the photo
        $photoPath = $request->file('photo')->store('public/photos/eleves');
        $photoUrl = Storage::url($photoPath);

        $etudiant->photo = $photoUrl;

        //dd($etudiant);

        $etudiant->save();

        //Eleve::create($validated);
        return redirect()->route('etudiant.index')->with('success', __('Eleve created  with success'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $eleve = ELeve::find($id);

        $modules = $eleve->classe->modules;

        $matieres = [];

        foreach ($modules as $module) {
            $matieres = array_merge($matieres, $module->matieres()->get()->all());
        }



       // dd($matieres);
        // Vérifier si la classe existe
        if ($eleve) {
            return view('etudiants.show', ['eleve' => $eleve, 'modules'=> $modules, 'matieres' => $matieres]);
        } else {
            return abort(404); // Classe non trouvée
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $eleve = ELeve::find($id);

        if ($eleve) {
            return view('etudiants.edit', ['eleve' => $eleve]);
        } else {
            return abort(404); // Classe non trouvée
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Eleve $eleve)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Eleve $eleve)
    {
        //
    }
}
