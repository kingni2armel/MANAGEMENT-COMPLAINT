<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Fcades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Categories;
use App\Models\SousCategorie;

class SousCategorieController extends Controller
{
    public function GETPAGEADDSOUSCATEGORY()
    {
        $allcategorie =  Categories::All();

        return view('souscategorie.addsouscategorie',[
            'allcategorie'=>$allcategorie
        ]);
    }

    /**  function qui permet l'ajout de la sous categorie */

    public function ADDSOUSCATEGORY(Request $request)
    {
        $request->validate([
            'categorie'=>['required'],
            'nomsouscategorie'=>['required'],
            'commentairesouscategorie'=>['required']
        ]);

        $categorie = SousCategorie::create([
            'categorie_id'=>$request->categorie,
            'nom_souscategorie'=>$request->nomsouscategorie,
            'commentaire_souscategorie'=>$request->commentairesouscategorie
        ]);

        session()->flash('notification.message',' Sous Catégoreie créé avec success');
        session()->flash('notification.type','success');
        return redirect()->route('GETPAGEADDSOUSCATEGORY');
    }

    /** function qui permet de renvoyer la liste des sous categories */


    public function GETLISTESOUSCATEGORY()
    {
            $row =1 ;
            $listesouscategorie = DB::table('sous_categories')
            ->join('categories','sous_categories.categorie_id','=','categories.id')
            ->select('sous_categories.*','categories.nom_categorie')
            ->orderBy('sous_categories.id','DESC')
            ->get();
            ;

            return view('souscategorie.listesouscategorie',[
                'row'=>$row,
                'listecategorie'=>$listesouscategorie
            ]);
    }

    /** funtion qui renvoie a la page de modification de sous  categorie */


    public function GETPAGEUPDATSOUSCATEGORY()
    {
        $id = $_GET['id'];

        $categorie  =  SousCategorie::where('id',$id)->get();
        $allcategorie =  Categories::all();
        return view('souscategorie.updatesouscategorie',[
            'infosouscategorie'=>$categorie,
            'allcategorie'=>$allcategorie
        ]);
    }

    /** FUNCTION DE MODIFICATIONDE LA sous CATEGORIE */

    public function UPDATESOUSCATEGORY(Request $request,$id)
    {
            $souscategorie = SousCategorie::find($id);

            $request->validate([
                'categorie'=>['required'],
                'nomsouscategorie'=>['required'],
                'commentairesouscategorie'=>['required']
            ]);

            $souscategorie->update([
                'categorie_id'=>$request->categorie,
                'nom_souscategorie'=>$request->nomsouscategorie,
                'commentaire_souscategorie'=>$request->commentairesouscategorie
            ]);

            session()->flash('notification.message',' Sous Catégorie modifié avec success');
            session()->flash('notification.type','success');
            return redirect()->route('GETLISTECATEGORY');
    }

    /** function qui permet de supprimer une sous categorie */

    public function DELETESOUSCATEGORY(Request $request,$id)
    {
        $souscategorie = SousCategorie::find($id);
        $souscategorie->delete();
        session()->flash('notification.message',' Sous Catégorie supprimé avec success');
        session()->flash('notification.type','danger');
        return redirect()->route('GETLISTESOUSCATEGORY');

    }
}
