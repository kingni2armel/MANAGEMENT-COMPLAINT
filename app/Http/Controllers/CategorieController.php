<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Fcades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Categories;

class CategorieController extends Controller
{
    //

    public function GETPAGEADDCATEGORY()
    {
        return view('categorie.addcategorie');
    }

    /**  function qui permet l'ajout de la categorie */

    public function ADDCATEGORY(Request $request)
    {
        $request->validate([
            'nomcategorie'=>['required'],
            'commentairecategorie'=>['required'],
            
        ]);

        $categorie = Categories::create([
            'nom_categorie'=>$request->nomcategorie,
            'commentaire_categorie'=>$request->commentairecategorie
        ]);

        session()->flash('notification.message','Catégoreie créé avec success');
        session()->flash('notification.type','success');
        return redirect()->route('GETPAGEADDCATEGORY');
    }

    /** function qui permet de renvoyer la liste des categories */


    public function GETLISTECATEGORY()
    {
            $row =1 ;
            $listecategorie =  Categories::all();

            return view('categorie.listecategorie',[
                'row'=>$row,
                'listecategorie'=>$listecategorie
            ]);
    }

    /** funtion qui renvoie a la page de modification de categorie */


    public function GETPAGEUPDATECATEGORY()
    {
        $id = $_GET['id'];

        $categorie  =  Categories::where('id',$id)->get();

        return view('categorie.updatecategorie',[
            'infocategorie'=>$categorie
        ]);
    }

    /** FUNCTION DE MODIFICATIONDE LA CATEGORIE */

    public function UPDATECATEGORY(Request $request,$id)
    {
            $categorie = Categories::find($id);

            $request->validate([
                'nomcategorie'=>['required'],
                'commentairecategorie'=>['required']
            ]);

            $categorie->update([
                'nom_categorie'=>$request->nomcategorie,
                'commentaire_categorie'=>$request->commentairecategorie
            ]);

            session()->flash('notification.message','Catégoreie modifié avec success');
            session()->flash('notification.type','success');
            return redirect()->route('GETLISTECATEGORY');
    }

    /** function qui permet de supprimer une categorie */

    public function DELETECATEGORY(Request $request,$id)
    {
        $categorie = Categories::find($id);
        $categorie->delete();
        session()->flash('notification.message','Catégoreie supprimé avec success');
        session()->flash('notification.type','danger');
        return redirect()->route('GETLISTECATEGORY');

    }
}
