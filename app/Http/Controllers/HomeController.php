<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Array da lista de breadcrumbers
        $listaMigalhas = json_encode([
            ['titulo' => 'Início', "url" => '']
        ]);

        return view('home', compact('listaMigalhas'));
    }
}

