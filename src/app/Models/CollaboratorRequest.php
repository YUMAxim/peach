<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CollaboratorRequest extends Model
{
    protected $fillable = [
        'title',
        'body',
        'page',
        'booksize',
        'desiredColorImpression',
        'desiredContentImpression',
        'application-deadline',
        'deadline',
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo('App\User');
    }
}
