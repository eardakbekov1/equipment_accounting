<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accessory_parameters_value extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function accessories_accessory_parameter(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Accessories_accessory_parameter::class);
    }
}
