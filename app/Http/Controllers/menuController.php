<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;

class menuController extends Controller
{

    public function __construct()
    {   

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(Request $request, $mesa)
    {   
        $mesa = $mesa;
        return view('client.nome', compact('mesa')) ;
    }

    public function show(Request $request, $mesa)
    {   
        $mesa = $mesa;
        $categories = \App\Models\Category::all(['category_name', 'category_id']);
        $foods = \App\Models\Food::get();
        return view('client.menu', compact('categories','foods', 'mesa'));
    }

    public function busca(Request $request, $mesa)
    {   
        $busca = $_GET['busca'];
        $mesa = $mesa;
        $foods = \App\Models\Food::where('food_description', 'like', '%' .$busca. '%')->get();
        $categories = \App\Models\Category::all(['category_name', 'category_id']);
        return view('client.busca', compact('foods', 'mesa', 'categories'));
    }


    public function category(Request $request, $categoria, $mesa) {
        $mesa = $mesa;
        $categoria = $categoria;
        $categories = \App\Models\Category::all(['category_name', 'category_id']);
        $categoria_atual = \App\Models\Category::where('category_id', $categoria)->get('category_name');
        $foods = \App\Models\Food::all();
        return view('client.categoria', compact('categories','foods', 'categoria', 'categoria_atual', 'mesa')) ;
    }

}
