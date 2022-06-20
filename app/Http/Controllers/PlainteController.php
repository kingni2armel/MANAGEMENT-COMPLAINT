<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\SousCategorie;
use App\Models\Plainte;
use App\Models\Resolution;
use Illuminate\Support\Fcades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
class PlainteController extends Controller
{
    //
    public function GETPAGEADDPLAINTE()
    {
        $allsouscategorie = SousCategorie::all();
        return view ('plainte.addplainte',[
            'allsouscategorie'=>$allsouscategorie
        ]);
    }

    /** function qui permet de creer une plainte */

    public function ADDPLAINTE(Request $request)
    {
        $request->validate([
            'souscategorie'=>['required'],
            'pays'=>['required'],
            'commentaire'=>['required'],
            'piece'=>['required']

        ]);
        $userid =  auth()->user()->id;

        $filename =time().'.'.$request->piece->extension();
        $path = $request->file('piece')->storeAs(
            'avatars',
             $filename,
            'public'
        );
        $plainte = Plainte::create([
            'user_id'=>$userid,
            'souscategorie_id'=>$request->souscategorie,
            'pays'=>$request->pays,
            'detail_plainte'=>$request->commentaire,
            'statut_plainte'=>0,
            'file'=>$filename
        ]);

        session()->flash('notification.message','Plainte créé avec success');
        session()->flash('notification.type','success');
        return redirect()->route('GETPAGEADDPLAINTE');


    }

    /** function qui renvoie la liste des plaintes de l'utilisateur connecte */


    public function GETLISTEPLAINTEBYID()
    {
        $user =  auth()->user()->id;
        $row = 1;

        $listeplainte =  DB::table('sous_categories')
        ->join('plaintes','sous_categories.id','=','plaintes.souscategorie_id')
        ->select('sous_categories.nom_souscategorie','plaintes.*')
        ->orderBy('plaintes.id','DESC')
        ->get();
            return view('plainte.listemesplainte',[
                'row'=>$row,
                'listeplainte'=>$listeplainte
            ]);
        }

        /*** function qui renvoie la page de modification de sa plainte */

        public function GETPAGEUPDATEMAPLAINTE()
        {
            $id = $_GET['id'];
            $allsouscategorie =  SousCategorie::All();
            $maplainte = Plainte::where('plaintes.id',$id)->get();
            return view('plainte.updateplainte',[
                'maplainte'=>$maplainte,
                'allsouscategorie'=>$allsouscategorie
            ]);
        }


        /** FUNCTION QUI PERMET DE MODIFIER UNE PLAINTE */

        public function UPDATEPLAINTE(Request $request,$id)
        {
            $plainte =  Plainte::find($id);
            $request->validate([
                'souscategorie'=>['required'],
                'pays'=>['required'],
                'commentaire'=>['required'],
                'piece'=>['required']

            ]);
            $userid =  auth()->user()->id;

            $filename =time().'.'.$request->piece->extension();
            $path = $request->file('piece')->storeAs(
                'avatars',
                 $filename,
                'public'
            );

            $plainte->update([
                'souscategorie_id'=>$request->souscategorie,
                'pays'=>$request->pays,
                'detail_plainte'=>$request->commentaire,
                'file'=>$filename
            ]);

            session()->flash('notification.message','Plainte modifié avec success');
            session()->flash('notification.type','success');
            return redirect()->route('GETLISTEPLAINTEBYID');
        }

        /*** function qui renvoie la liste des plaintes non traites  */

        public function GETPAGELISTEPLAINTENONTRAITE()
        {
            $row = 1;
            $listeplainte =  DB::table('sous_categories')
            ->join('plaintes','sous_categories.id','=','plaintes.souscategorie_id')
            ->join('users','plaintes.user_id','=','users.id')
            ->select('sous_categories.nom_souscategorie','plaintes.*','users.name','users.email','users.telephone')
            ->where('plaintes.statut_plainte',0)
            ->orderBy('plaintes.id','DESC')
            ->get();
            return  view('plainte.listeplaintenontraite',[
                'row'=>$row,
                'listeplainte'=>$listeplainte
            ]);
        }

               /*** function qui renvoie la liste des plaintes non traites  */

               public function GETPAGELISTEPLAINTETRAITE()
               {
                   $row = 1;
                   $listeplainte =  DB::table('sous_categories')
                   ->join('plaintes','sous_categories.id','=','plaintes.souscategorie_id')
                   ->join('users','plaintes.user_id','=','users.id')
                   ->select('sous_categories.nom_souscategorie','plaintes.*','users.name','users.email','users.telephone')
                   ->where('plaintes.statut_plainte',1)
                   ->orderBy('plaintes.id','DESC')
                   ->get();
                   return  view('plainte.listeplaintetraite',[
                       'row'=>$row,
                       'listeplainte'=>$listeplainte
                   ]);
               }


               /** FUNCTION QUI RENVOIE A LA PAGE DE TRAITEMENT D'UNE PLAINTE */

               public function GETPAGETRAITEPLAINTE()

               {
                        $id = $_GET['id'];
                        $plainte  = Plainte::where('id',$id)->get();
                        return view('plainte.traiteplainte',[
                            'plainte'=>$plainte
                        ]);
               }
               /**  function qui permet de traiter une plainte */


               public function TRAITEPLAINTE(Request $request,$id)

               {
                        $request->validate([
                            'commentaire_traitement'=>['required']
                        ]);

                        $resoultion =  Resolution::create([
                            'plaintes_id'=>$id,
                            'commentaire_resolution'=>$request->commentaire_traitement
                        ]);
                          $plainte =  Plainte::find($id);

                        $plainte->update([
                            'statut_plainte'=>1,
                        ]);
                        session()->flash('notification.message','Plainte traité avec success');
                        session()->flash('notification.type','success');
                        return redirect()->route('GETPAGELISTEPLAINTENONTRAITE');
               }

               /*** FUNCTION QUI PERMET A UN USER DE VOIR LA REPONSE DES SES PLAINTES */


               public function GETPAGESEEREPONSE()
               {
                    $id = $_GET['id'];
                    $resolution = Resolution::where('resolutions.plaintes_id',$id)->get();
                    return view('plainte.reponse',[
                        'resolution'=>$resolution
                    ]);
               }
    }

