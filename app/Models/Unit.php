<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function d_parameters(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(D_parameter::class);
    }
}
