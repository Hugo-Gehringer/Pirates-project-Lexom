<?php

namespace App\Http\Controllers;

use App\Models\Part;
use App\Models\PartShip;
use App\Models\Ressource;
use App\Models\Ship;
use Illuminate\Http\Request;

class ShipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Ship.newShip');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,)
    {
        $parts = Part::select('id','name')->get();
        $validatedData = $request->validate([
            'name' => 'required',
            'woodType' => 'required',
        ], [
            'name.required' => 'Veuillez entrer un nom de bateau',
            'type.required' => 'Veuillez choisir un type de bois.',
        ]);
        $ship = Ship::create($validatedData);
        foreach ($parts as $part){
            $ship->parts()->attach($part, ['condition'=>rand(50,100)]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Ship $ship)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ship $ship)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ship $ship)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ship $ship)
    {
        //
    }
}
