<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Recruit;

class Role extends Model
{
    protected $fillable = [
        'id',
        'roles_categories_id',
        'name'
    ];

    public function rolesCategories()
    {
        return $this->hasOne(RolesCategory::class);
    }

    public function getRecruitRole($recruitId)
    {
        return RecruitRole::where(function ($q) use ($recruitId) {
            $q->where('role_id', $this->id);
            $q->where('recruit_id', $recruitId);
        })->first();
    }

    public function rolesRecruitRole()
    {
        return $this->hasMany(RecruitRole::class);
    }
}
