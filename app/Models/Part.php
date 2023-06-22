<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    use HasFactory;

    public function ships(){
        return $this->belongsToMany(Part::class, 'parts_ships', 'ship_id', 'parts_id');
    }
}
