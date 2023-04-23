<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function device_models(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Device_model::class);
    }
}
