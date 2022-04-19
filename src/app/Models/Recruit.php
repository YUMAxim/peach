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
        'category',
        'category_id',
        'page',
        'booksize',
        'my_role',
        'recruits_role',
        'file_format',
        'desired_color_impression',
        'desired_content_impression',
        'budget',
        'application_deadline',
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
