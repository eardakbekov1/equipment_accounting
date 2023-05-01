<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parameters_value extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function additional_parameters_device_name(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Additional_parameters_device_name::class);
    }

    public function device(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Device::class);
    }
}
