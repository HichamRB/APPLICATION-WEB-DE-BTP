<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Site;

class AffsiteController extends Controller
{

    public function index(){
        // $employes = Employe::find(0);

         //var_dump($employes->statut);
        // $employes = Employe::all();
        $sites = Site::all();

        //$affectations = new Affectation();


        //$affectations->employe_id = "/";
        //$affectations->chantier_id = "/";
        //$affectations->date_affectation = "2020-05-16";

        //$affectations->save();

            //  })->get();
     return view('admin.afectation.indexsite', ['sites'=>$sites] );//['affectations'=>$afectations] );

     }
}
