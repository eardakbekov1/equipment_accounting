<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class A_parameter extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function Accessories(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Accessory::class, 'accessory_a_parameter')->withPivot('id', 'created_at', 'updated_at');;
    }
}
