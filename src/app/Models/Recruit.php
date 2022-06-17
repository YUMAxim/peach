<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Category;

/* Use table recruits by default */

class Recruit extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'body',
        'page',
        'booksize',
        'my_role',
        'recruits_role',
        'desired_color_Impression',
        'desired_content_Impression',
        'budget',
        'application-deadline',
        'deadline',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo('App\Models\User');
    }

    public function category(): HasOne
    {
        return $this->hasOne('App\Models\Category');
    }
}
