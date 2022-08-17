<?php

namespace App\Http\Controllers;

use App\Models\Admins;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function AddAdmin(Request $request){
        return $request;
    }

    function ListAdmin(){
        $Admin = Admins::all();

        return ($Admin);
    }

    function updateAdmin(Request $request , $id){


        $Admin = Admins::find($id);
        if ($request->isMethod('post')){
            $parametres = $request->except(['_token']);
            $Admin->matricule = $parametres['matricule'];
            $Admin->nom = $parametres['nom'];
            $Admin->prenom = $parametres['prenom'];
            $Admin->cin = $parametres['cin'];
            $Admin->email = $parametres['email'];
            $Admin->tel = $parametres['tel'];
            $Admin->date_naiss = $parametres['date_naiss'];
            $Admin->save();
            return redirect()->route('ListAdmin')->with('success' , 'Item was updated');

        }

        // return View('Admin/updateAdmin')->with('Admin', $Admin);
    }
    public function destroy($id){

        Admins::find($id)->delete();
    }
    //
}
