<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produto;

class SiteController extends Controller
{
    public function index()
    {
        //return "index";
        $produtos = Produto::paginate(3);
        //return dd($produtos);
            
        return view('site.home', compact('produtos'));
    }

    public function details($slug){
        $produto = Produto::where('slug', $slug)->first();

        return view('site.details', compact('produto'));
    }
}
