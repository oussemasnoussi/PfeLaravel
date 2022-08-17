<?php

namespace App\Http\Controllers;

use App\Models\clients;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    function AddClient(Request $request){
       if( $request->isMethod('post')){
           $client=clients::insert();
            $client->save();
        };


    }
    function ListClient(){
        $clients = clients::all();
         return ($clients);
    }
    function ListClientOptIn(){
        $clients = clients::where('statut', 'opt-in')->get();
            return ($clients);
    }
    function ListClientOptOut(){
        $clientsout = clients::where('statut', 'opt-out')->get();
            return ($clientsout);
    }

    function updateclient(Request $request , $id){


        $client = clients::find($id);
        if ($request->isMethod('post')){
            $parametres = $request->except(['_token']);

            $client->nom = $parametres['nom'];
            $client->prenom = $parametres['prenom'];
            $client->cin = $parametres['cin'];
            $client->email = $parametres['email'];
            $client->tel = $parametres['tel'];
            $client->date_naiss = $parametres['date_naiss'];
            $client->save();
            return redirect()->route('ListCLient')->with('success' , 'Item was updated');

        }

        // return View('client/updateclient')->with('client', $client);
    }
    //
}
