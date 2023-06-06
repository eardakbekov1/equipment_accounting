<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class A_p_value extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function a_parameter(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(A_parameter::class);
    }

}
