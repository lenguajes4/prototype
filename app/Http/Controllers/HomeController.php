<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

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
        $user = Auth::user();

        if ($user->hasRole('manager')) {
            return redirect()->route('gestor.dashboard');
        }

        $registro = $user->registro;
        $informes = $registro->informes->sortByDesc('updated_at')->take(5);
        $consultas = $registro->consultas->sortByDesc('updated_at')->take(5);

        return view('dashboard', compact('user', 'registro', 'informes', 'consultas'));
    }
}
