<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateMyUserRequest;
use App\Models\Correction;
use App\Models\Epreuve;
use App\Models\User;
use Illuminate\Http\Request;
use Flash;

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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function profil()
    {

        return view('users.profil');
    }

    /**
     * Show the form for editing the specified MyUser.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $myUser = User::findorFail($id);

        if (empty($myUser)) {
            Flash::error('My User not found');

            return redirect(route('welcome'));
        }

        return view('users.edit')->with('myUser', $myUser);
    }

    /**
     * Update the specified MyUser in storage.
     *
     * @param int $id
     * @param UpdateMyUserRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMyUserRequest $request)
    {
        $myUser = User::findorFail($id);

        if (empty($myUser)) {
            Flash::error('My User not found');

            return redirect(route('welcome'));
        }
        $data = $request->all();
        $myUser->is_fromEsmt = $data['is_fromEsmt'];
        $myUser->is_newsletter = $data['is_newsletter'];
        $myUser->save();

        Flash::success('My User updated successfully.');

        return redirect(route('profil'));
    }



    /**
     * Display the specified Correction.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function showCorrections(request $request, $id)
    {

        $corrections = Correction::all()->where('id_epreuve', '=', $id);
        $epreuve = Epreuve::find($id);
        if (empty($corrections)) {
            Flash::error('Correction not found');

            return redirect(route('home'));
        }

        return view('users.corrections')->with('corrections', $corrections)->with('epreuve', $epreuve);
    }


}
