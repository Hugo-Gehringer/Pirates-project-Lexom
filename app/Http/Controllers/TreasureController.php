<?php

namespace App\Http\Controllers;

use App\Exports\ExportTreasures;
use App\Models\Ship;
use App\Models\Treasure;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class TreasureController extends Controller
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
    public function create(Ship $ship = null)
    {
        $ships = Ship::select('id','name')->get()->pluck('name','id');
        return view('Treasures.newTreasure')->with('ships', $ships)->with("ship",$ship);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'price' => 'required|min:1',
            'weight' => 'required',
            'description' => 'required',
            'condition' => 'required',
            'ship_id' => 'required'
        ], [
            'name.required' => 'Veuillez entrer un nom de trésor',
            'price.required' => 'Veuillez entrer un prix',
            'weight.required' => 'Veuillez entrer une poid',
            'description.required' => 'Veuillez choisir une decription.',
            'condition.required' => 'Veuillez choisir un état.',
            'ship_id.required' => 'Veuillez choisir un navire.'
        ]);
        Treasure::create($validatedData);

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
    public function edit(Treasure $treasure)
    {
        $ships = Ship::select('id','name')->get()->pluck('name','id');
        return view('Treasures.editTreasure')
            ->with('treasure', $treasure)
            ->with('ships',$ships)
            ->with('ship',$treasure->ship);
    }

    public function captainEdit(Treasure $treasure)
    {
        $ships = Ship::select('id','name')->get()->pluck('name','id');
        return view('Treasures.editTreasure')
            ->with('treasure', $treasure)
            ->with('ships',$ships)
            ->with('isCaptain', true)
            ->with('ship',$treasure->ship)
            ;
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Treasure $treasure)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'price' => 'required|min:1',
            'weight' => 'required',
            'description' => 'required',
            'condition' => 'required',
            'ship_id' => 'required'
        ], [
            'name.required' => 'Veuillez entrer un nom de trésor',
            'price.required' => 'Veuillez entrer un prix',
            'weight.required' => 'Veuillez entrer une poid',
            'description.required' => 'Veuillez choisir une decription.',
            'condition.required' => 'Veuillez choisir un état.',
            'ship_id.required' => 'Veuillez choisir un navire.'
        ]);
        Treasure::where('id',$treasure->id)->update($validatedData);
        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Treasure $treasure)
    {
        $treasure->delete();
        return redirect()->route('home')->with('success','treasure deleted successfully');
    }

    public function export(Ship $ship)
    {
        return Excel::download(new ExportTreasures($ship), 'treasures.xlsx');
    }
}
