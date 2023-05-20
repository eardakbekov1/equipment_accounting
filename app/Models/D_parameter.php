<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class D_parameter extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function d_name_d_parameter(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(D_name_d_parameter::class);
    }
}
