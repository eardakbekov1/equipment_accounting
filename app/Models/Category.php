<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function accessories(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Accessory::class);
    }

    public function device_names(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Device_name::class);
    }
}
