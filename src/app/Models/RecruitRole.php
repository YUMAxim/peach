<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class RecruitRole extends Model
{
    protected $table = 'recruit_role';

    protected $fillable = [
        'id',
        'recruit_id',
        'role_id',
        'reward',
    ];

    public function recruit(): BelongsTo
    {
        return $this->belongsTo(Recruit::class);
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    public function offers()
    {
        return $this->belongsToMany(Offer::class);
    }

    // public function roleCategory(): BelongsTo
    // {
    //     return $this->belongsTo(RolesCategory::class);
    // }
}
