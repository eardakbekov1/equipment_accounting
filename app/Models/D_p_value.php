<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class D_p_value extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function D_name_d_parameter(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(D_name_d_parameter::class);
    }

    public function device(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Device::class);
    }
}
