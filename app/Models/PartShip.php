<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class PartShip extends Pivot
{
    public function ship(): BelongsTo
    {
        return $this->belongsTo(Ship::class, 'ships_id');
    }

    public function part(): BelongsTo
    {
        return $this->belongsTo(Part::class, 'parts_id');
    }
}
