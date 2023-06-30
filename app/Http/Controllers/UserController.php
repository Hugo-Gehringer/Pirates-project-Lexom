<?php

namespace App\Http\Controllers;

use App\Exports\ExportUsers;
use App\Models\Ship;
use App\Models\Treasure;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function create(Ship $ship = null)
    {
        return view('Users.newUser')->with("ship",$ship);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:2', 'confirmed'],
            'physicalDescription' => ['required', 'string'],
            'age' => ['required', 'numeric'],
            'pseudo' => ['required', 'string'],
            'firstname' => ['required', 'string'],
            'specialty' => ['required', 'numeric'],
            'ship_id' => ['required', 'numeric'],
        ]);
        $user = User::create($validatedData)->assignRole('sailor');
        $user->save();
        flash()->addSuccess("Création réussie");
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     */
    public function show(Treasure $treasure)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $ships = Ship::select('id','name')->get()->pluck('name','id');
        return view('Users.editUser')
            ->with('user', $user)
            ->with('ships',$ships)
            ->with('ship',$user->ship);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'pseudo' => 'required',
            'firstname' => 'required',
            'email' => 'required',
            'physicalDescription' => 'required',
            'ship_id' => 'required',
            'specialty' => 'required',
            'age' => 'required'
        ], [
            'name.required' => 'Veuillez entrer un nom',
            'firstname.required' => 'Veuillez entrer un prénom',
            'email.required' => 'Veuillez entrer un email',
            'physicalDescription.required' => 'Veuillez entrer une decription.',
            'specialty.required' => 'Veuillez choisir une spécialité.',
            'age.required' => 'Veuillez entrer un age.',
            'ship_id.required' => 'Veuillez choisir un navire.'
        ]);
        User::where('id',$user->id)->update($validatedData);
        flash()->addSuccess("mise à jour réussi");
        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        flash()->addSuccess("Utilisateur supprimé");
        return redirect()->route('home');
    }

    public function export(Ship $ship)
    {
        return Excel::download(new ExportUsers($ship), 'users.xlsx');
    }
}
