<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Additional_parameter extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function device_names(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Device_name::class);
    }
}
