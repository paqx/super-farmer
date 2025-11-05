<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $fillable = [
        'tag',
        'name',
        'sex',
        'breed_composition',
        'date_of_birth',
        'date_of_death',
        'num_of_siblings_at_birth',
        'birth_weight',
        'color_pattern',
        'photo',
        'animal_type_id',
        'breeder_id',
        'owner_id',
        'maternal_id',
        'paternal_id',
        'attributes',
    ];

    protected $casts = [
        'breed_composition' => 'array',
        'date_of_birth' => 'date',
        'date_of_death' => 'date',
        'birth_weight' => 'float',
        'attributes' => 'array',
    ];

    public function animalType()
    {
        return $this->belongsTo(AnimalType::class);
    }

    public function breeder()
    {
        return $this->belongsTo(Party::class, 'breeder_id');
    }

    public function owner()
    {
        return $this->belongsTo(Party::class, 'owner_id');
    }

    /**
     * Maternal parent
     */
    public function maternal()
    {
        return $this->belongsTo(self::class, 'maternal_id');
    }

    /**
     * Paternal parent
     */
    public function paternal()
    {
        return $this->belongsTo(self::class, 'paternal_id');
    }

    /**
     * Maternal children (animals for which this is the mother)
     */
    public function maternalChildren()
    {
        return $this->hasMany(self::class, 'maternal_id');
    }

    /**
     * Paternal children (animals for which this is the father)
     */
    public function paternalChildren()
    {
        return $this->hasMany(self::class, 'paternal_id');
    }
}
