<?php

namespace App\Http\Controllers;

use App\Models\Consultants;
use Illuminate\Http\Request;

class ConsultController extends Controller
{
    function AddConsult(Request $request){
        
        return $request;
    }

    function ListConsult(){
        $consultants = Consultants::all();

        return ($consultants);
    }

    function updateconsultant(Request $request , $id){


        $consultant = Consultants::find($id);
        if ($request->isMethod('post')){
            $parametres = $request->except(['_token']);
            $consultant->matricule = $parametres['matricule'];
            $consultant->nom = $parametres['nom'];
            $consultant->prenom = $parametres['prenom'];
            $consultant->cin = $parametres['cin'];
            $consultant->email = $parametres['email'];
            $consultant->tel = $parametres['tel'];
            $consultant->date_naiss = $parametres['date_naiss'];
            $consultant->save();
            return redirect()->route('ListConsult')->with('success' , 'Item was updated');

        }

        // return View('consultant/updateconsultant')->with('consultant', $consultant);
    }
    public function destroy($id){

        Consultants::find($id)->delete();
    }
    //
}
