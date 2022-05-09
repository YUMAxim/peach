<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Recruit;

class RecruitRole extends Model
{
    protected $table = 'recruit_role';

    protected $fillable = [
        'id',
        'role_id',
        'recruit_role_id'
    ];

    public function recruit()
    {
        return $this->belongsTo('App\Models\Recruit');
    }

    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }
}
