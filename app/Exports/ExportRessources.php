<?php

namespace App\Exports;

use App\Models\Ressource;
use App\Models\Ship;
use App\Models\User;
use http\Env\Response;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportRessources implements FromCollection, WithHeadings
{
    private $ship;
    public function __construct(Ship $ship)
    {
        $this->ship = $ship;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
         return Ressource::select()
            ->where('ship_id',$this->ship->id)->get();
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function headings(): array
    {
        return ["ID", "Name","Quantity", "Type", "ship_id" , "created_at", "updated_at"];
    }
}
