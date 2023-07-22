<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Travel extends Model
{
    use HasFactory,Sluggable,HasUuids;
    protected $table='travels';
    protected $fillable=['name', 'description','slug','number_of_days'];
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }


    public function tours():HasMany
    {
        return $this->hasMany(Tour::class);
    }

    // Virtual attribute for the number of nights
    public function getNumberOfNightsAttribute()
    {
        // Use the accessor for "number of days" and subtract 1 to get the number of nights
        return $this->number_of_days - 1;
    }
}
