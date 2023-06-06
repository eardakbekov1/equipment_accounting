<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class D_parameter extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function d_name(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(D_name::class);
    }

    public function d_p_values(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(D_p_value::class);
    }
}
