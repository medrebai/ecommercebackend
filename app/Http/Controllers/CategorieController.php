<?php

namespace App\Http\Controllers;

use App\Models\categorie;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $categories = categorie::all();
            return response()->json($categories);

        }catch(\Exception $e){  
            return response()->json(['Erreur de connexion à la base de données'], );
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $categorie = new Categorie([
                "nomcategorie" => $request->input('nomcategorie'),
                "imagecategorie" => $request->input('imagecategorie')
            ]);
            $categorie->save();
            return response()->json([$categorie], );


        }catch(\Exception $e){
            return response()->json(['insertion impossible'], );
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try{
            $categorie = categorie::findOrFail($id);
            return response()->json($categorie);
        }catch(\Exception $e){
            return response()->json(['probleme de récupération des données'], );
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id , Request $request)
    {
        try{
            $categorie = categorie::findOrFail($id);
            $categorie->nomcategorie = $request->input('nomcategorie');
            $categorie->imagecategorie = $request->input('imagecategorie');
            $categorie->save();
            return response()->json($categorie);


        }catch(\Exception $e){
            return response()->json(['probleme de récupération des données'], );
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try{
            $categorie = categorie::findOrFail($id);
            $categorie->delete();
            return response()->json(['categorie supprimée'], );
        }catch(\Exception $e){
            return response()->json(['probleme de suppression'], );
        }
        
        //
    }
}
