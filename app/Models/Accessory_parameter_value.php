<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accessory_parameter_value extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function accessory_accessory_parameter(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Accessory_accessory_parameter::class);
    }
}
