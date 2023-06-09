<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class D_model extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function devices(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Device::class);
    }

    public function manufacturer(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Manufacturer::class);
    }
}
