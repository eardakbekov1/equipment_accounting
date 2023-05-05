<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parameter_device_name extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function parameter_values(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Parameter_value::class);
    }
}
