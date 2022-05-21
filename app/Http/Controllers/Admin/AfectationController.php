<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAffectationRequest;
use App\Models\Employe;
use App\Models\Affectation;
use App\Models\Site;
use Illuminate\Http\Request;


class AfectationController extends Controller
{


public function index(){
   // $employes = Employe::find(0);

    //var_dump($employes->statut);
   // $employes = Employe::all();
   $employes = Employe::where('status','=', '0')->get();
   $sites = Site::all();

   //$affectations = new Affectation();


   //$affectations->employe_id = "/";
   //$affectations->chantier_id = "/";
   //$affectations->date_affectation = "2020-05-16";

   //$affectations->save();

       //  })->get();
return view('admin.afectation.index', ['employes'=>$employes] ,['sites'=>$sites] );//['affectations'=>$afectations] );

}


    public function store(Request $request)
    {
          $chantier_id =$request->get('chantier_id');

         $emps = $request->get('emp');

         $keys = array_keys($emps);
         foreach($keys as $emp){
            $aff= new Affectation();

            $aff->employe_id=$emp;
            $aff->chantier_id=$chantier_id;

            $aff->save();

         }








        //
        }


}

