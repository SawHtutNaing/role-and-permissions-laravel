<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Permission extends Model
{
    protected $fillable = ['name', 'feature_id'];

    public function feature(): BelongsTo
    {
        return $this->belongsTo(Feature::class);
    }
    public function roles()
{
    return $this->belongsToMany(Role::class , 'role_permission');
}


}
