<?php

namespace App\Http\Controllers;
use App\Models\Catalogo;
use Illuminate\Http\Request;




class PortafolioController extends Controller
{
    
public function index()
{
    $catalogos = Catalogo::paginate();
    

    return view('welcome', compact('catalogos'));
}


}
