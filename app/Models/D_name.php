<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class D_name extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function d_parameters(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(D_parameter::class);
    }

    public function devices(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Device::class);
    }

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
