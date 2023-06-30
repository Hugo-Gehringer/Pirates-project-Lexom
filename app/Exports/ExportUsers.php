<?php

namespace App\Exports;

use App\Models\Ship;
use App\Models\User;
use http\Env\Response;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportUsers implements FromCollection, WithHeadings
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
         return User::select(["ID", "Name","Firstname", "Email","specialty", "pseudo", "physicalDescription", "age"])
            ->where('ship_id',$this->ship->id)->get();
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function headings(): array
    {
        return ["ID", "Name","Firstname", "Email","specialty", "pseudo", "physicalDescription", "age"];
    }
}
