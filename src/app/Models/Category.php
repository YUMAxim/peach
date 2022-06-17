<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Recruit;

class Category extends Model
{
    use HasFactory;
    /*Review: Type declaration  */

    public function recruits(): BelongsTo
    {
        return $this->belongsTo('App\Models\Recruit');
    }
}
