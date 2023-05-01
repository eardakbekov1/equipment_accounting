<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parameters_device_name extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function additional_parameters_values(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Additional_parameters_value::class);
    }
}
