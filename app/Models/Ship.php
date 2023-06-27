<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Ship extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'woodType',
        ];
    public function ressources(): HasMany
    {
        return $this->hasMany(Ressource::class);
    }

    public function parts(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Part::class, 'part_ship', 'ships_id', 'parts_id')
            ->withPivot('condition')
            ->withTimestamps();
    }

    public function averageCondition(): float|int
    {
        $parts = $this->parts;
        $shipCondition = 0;
        foreach ($parts as $part){
            $shipCondition += $part->pivot->condition;
        }
        return round($shipCondition/count($parts),2);
    }

    public function pirates(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function treasures(): HasMany
    {
        return $this->hasMany(Treasure::class);
    }
}
