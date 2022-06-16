<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Recruit;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RolesCategory extends Model
{
    protected $fillable = [
        'id',
        'name',
    ];

    public function roles(): HasMany
    {
        return $this->hasMany(Role::class);
    }
}
