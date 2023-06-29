<?php

namespace App\Http\Controllers;

use App\Models\Ressource;
use App\Models\Ship;
use Illuminate\Http\Request;

class RessourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ressources = Ressource::all();
        return view('Ressources.ressources')->with('ressources', $ressources);
    }

    public function showRessourcesFromShip(Ship $ship)
    {
        $ressources = $ship->ressources();
        return view('Ressources.ressourcesPerShip')->with('ressources', $ressources)
            ->with('ship', $ship);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Ship $ship = null)
    {
        $ships = Ship::select('id','name')->get()->pluck('name','id');
        return view('Ressources.newRessource')->with('ships', $ships)->with("ship",$ship);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'quantity' => 'required|min:1',
            'type' => 'required',
            'ship_id' => 'required'
        ], [
            'name.required' => 'Veuillez entrer un nom de ressource',
            'quantity.required' => 'Veuillez entrer une quantité',
            'type.required' => 'Veuillez choisir un type de ressource.',
            'ship_id.required' => 'Veuillez choisir un navire.'
        ]);
        Ressource::create($validatedData);

        return back()->with('success', '');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ressource $ressource)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ressource $ressource)
    {
        $ships = Ship::select('id','name')->get()->pluck('name','id');
        return view('Ressources.editRessource')
            ->with('ressource', $ressource)
            ->with('ships',$ships)
            ->with('ship',$ressource->ship)
            ;
    }

    public function cookEdit(Ressource $ressource)
    {
        $ships = Ship::select('id','name')->get()->pluck('name','id');
        return view('Ressources.editRessource')
            ->with('ressource', $ressource)
            ->with('ships',$ships)
            ->with('isCookEdit', true)
            ->with('ship',$ressource->ship)
            ;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ressource $ressource)
    {
        $validated = $request->validate([
            'name' => 'required',
            'quantity' => 'required|min:1',
            'type' => 'required',
            'ship_id' => 'required'
        ],[
        'name.required' => 'Veuillez entrer un nom de ressource',
            'quantity.required' => 'Veuillez entrer une quantité',
            'type.required' => 'Veuillez choisir un type de ressource.',
            'ship_id.required' => 'Veuillez choisir un navire.'
        ]);
        Ressource::where('id',$ressource->id)->update($validated);
        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ressource $ressource)
    {
        $ressource->delete();
        return redirect()->route('home')->with('success','Product deleted successfully');
    }
}
