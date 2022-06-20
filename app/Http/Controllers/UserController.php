<?php

namespace App\Http\Controllers;
use App\Models\Categories;
use App\Models\SousCategorie;
use App\Models\User;
use App\Models\Admin;
use App\Models\Plainte;
use App\Models\Resolution;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;



class UserController extends Controller
{
    //

    public function GETDASH()
    {
            $allplainte  =  Plainte::all();
            $alluser =  User::all();
            $allresolution =  Resolution::all();
            $allcategorie= Categories::all();
            $allsoucategorie =SousCategorie::all();
            $id = auth()->user()->id;
            $mesplaintes = Plainte::where('plaintes.user_id',$id);
            return view('dashboard.dashboard',[
                'allplainte'=>$allplainte,
                'alluser'=>$alluser,
                'allresolution'=>$allresolution,
                'allcategorie'=>$allcategorie,
                'allsoucategorie'=>$allsoucategorie,
                'mesplaintes'=>$mesplaintes
            ]);
    }

    Public function GETPAGEADDUSER()
    {
        return view('user.adduser');
    }

    /*** function qui permet d'ajouter un user */

    public function ADDUSER(Request $request)

    {
            $request->validate([
                    'nomuser'=>['required'],
                    'emailuser'=>['required'],
                    'phoneuser'=>['required'],
                    'roleuser'=>['required'],
                    'passworduser'=>['required']
            ]);

            $user = User::create([
                'name'=>$request->nomuser,
                'email'=>$request->emailuser,
                'telephone'=>$request->phoneuser,
                'role'=>$request->roleuser,
                'password'=>Hash::make($request->passworduser)
            ]);

            if($user->role ==='admin')
            {
                Admin::create([
                        'user_id'=>$user->id
                ]);
            }
            session()->flash('notification.message','Utilisateur créé avec success');
            session()->flash('notification.type','success');
            return redirect()->route('GETPAGEADDUSER');
    }

    /*** function qui renvoie la liste des users */

    public function GETLISTEUSER()
    {
        $alluser = User::all();
        $row =1 ;
        return view('user.listeuser',[
            'alluser'=>$alluser,
            'row'=>$row
        ]);
    }
    /*** function qui renvoie a la page de creation du user */


    public function GETPAGEUPDATEUSER()
    {
        $id = $_GET['id'];
        $user =  User::where('id',$id)->get();
        return view('user.updateuser',[
            'user'=>$user
        ]);
    }

    /** FUNCTION QUI UPDATE UN USER */

    public function UPDATEUSER(Request $request,$id)

    {
            $user =  User::find($id);
            $request->validate([
                'nomuser'=>['required'],
                'emailuser'=>['required'],
                'phoneuser'=>['required'],
                'roleuser'=>['required'],
                'passworduser'=>['required']
        ]);


        $user->update([
            'name'=>$request->nomuser,
            'email'=>$request->emailuser,
            'telephone'=>$request->phoneuser,
            'role'=>$request->roleuser,
            'password'=>Hash::make($request->passworduser)
        ]);

        session()->flash('notification.message','Utilisateur modifié avec success');
        session()->flash('notification.type','success');
        return redirect()->route('GETLISTEUSER');
    }


    /*** function d'authentificartion */

    public function AUTHENTIFICATION(Request $request)
    {
            $request->validate([
                'email'=>['required'],
                'password'=>['required'],
            ]);

            if(auth()->attempt($request->only('email','password')))

                {
                        return redirect()->route('GETDASH');
                }
            return redirect()->back()->WithErrors('Les identifiants ne correspondent pas');
    }

        public function GOCONNECT(){
                return view('welcome');
        }
            /*
                    function de deconnexion
            */
            public function LOGOUT()
            {
                        Session::flush();
                        Auth::logout();
                        return redirect()->route('GOCONNECT');
            }

            /** function qui renvoie la page de modification des infos par chaque user */

            public function GETPAGEUPDATEMESINFO()
            {
                return view('user.updatemyinfo');
            }


            /** function qui permet de mettre a jour ses informations */

            public function UPDATEMYINFO(Request $request)
            {
                $id = auth()->user()->id;

                $request->validate([
                    'nomuser'=>['required'],
                    'emailuser'=>['required'],
                    'phoneuser'=>['required'],
                    'passworduser'=>['required']
            ]);
            $user  =  User::find($id);
            $user->update([
                'name'=>$request->nomuser,
                'email'=>$request->emailuser,
                'telephone'=>$request->phoneuser,
                'password'=>Hash::make($request->passworduser)
            ]);

                  session()->flash('notification.message','Informations modifié avec success');
                  session()->flash('notification.type','success');
                   return redirect()->route('GETPAGEUPDATEMESINFO');
            }
}
