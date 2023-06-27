<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    use HasFactory;

    public function ships(){
        return $this->belongsToMany(Ship::class, 'part_ship', 'parts_id', 'ships_id')
            ->withPivot('condition');
//        return $this->belongsToMany(Part::class, 'part_ship', 'ships_id', "parts_id");

    }
}
