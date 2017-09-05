<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Set extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'acronym', 'url',
    ];

    public function cards(): HasMany
    {
        return $this->hasMany('App\Models\Card');
    }
}
