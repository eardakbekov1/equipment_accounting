<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function d_models(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(D_model::class);
    }
}
