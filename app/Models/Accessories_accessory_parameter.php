<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accessories_accessory_parameter extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function accessory_parameters_values(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Accessory_parameters_value::class);
    }
}
