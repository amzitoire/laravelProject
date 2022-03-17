<?php

namespace App\Http\Controllers;

use App\Models\Correction;
use App\Models\Epreuve;
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
        $epreuves = Epreuve::all();
        $corrections = Correction::all();
        return view('users.index')->with('epreuves', $epreuves)->with('corrections', $corrections);
    }



    /**
     * Display the specified Correction.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function showCorrections(request $request , $id)
    {

        $corrections = Correction::all()->where('id_epreuve','=', $id);
        $epreuve = Epreuve::find($id);
        if (empty($corrections)) {
            Flash::error('Correction not found');

            return redirect(route('home'));
        }

        return view('users.corrections')->with('corrections', $corrections)->with('epreuve', $epreuve);
    }
}
