<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function histories(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(History::class);
    }

    public function parent()
    {
        return $this->belongsTo(Device::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Device::class, 'parent_id');
    }

    public function accessories(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Accessory::class);
    }

    public function condition(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Condition::class);
    }

    public function d_p_values(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(D_p_value::class);
    }

    public function d_name(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(D_name::class);
    }

    public function d_model(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(D_model::class);
    }

    public function purpose(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Purpose::class);
    }

    public function location(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    public function status(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Status::class);
    }
}
