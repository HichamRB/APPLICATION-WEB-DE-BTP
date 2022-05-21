<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCategoryRequest;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Employe;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class PointageController extends Controller
{


public function index(){
$employes = Employe::all();
return view('admin.pointages.index', ['employes'=>$employes]);
}
}
