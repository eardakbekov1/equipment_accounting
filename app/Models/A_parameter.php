<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class A_parameter extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function accessory(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Accessory::class);
    }

    public function a_p_values(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(A_p_value::class);
    }
}
