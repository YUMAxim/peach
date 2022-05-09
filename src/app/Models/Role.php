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
        'recruit_id',
        'role_id',
        'name'
    ];

    // recruit_role中間テーブルを経由してrolesテーブルからrecruitsテーブルデータを取得する
    public function recruit_role_recruits(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Recuit');
    }

    // public function rewardsRecruits(): BelongsToMany
    // {
    //     return $this->belongsToMany('App\Models\Recruit', 'recwards', 'role_id', 'recruit_id');
    // }
}
