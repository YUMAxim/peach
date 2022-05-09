<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = [
        'recruit_id',
        'user_id',
        'body',
        'recruits_role',
        'completion_deadline',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo('App\Models\User');
    }

    public function recruit(): BelongsTo
    {
        return $this->belongsTo('App\Models\Recruit');
    }

    public function selectOptions()
    {
        $recruits_roles = ['デザイン', '原稿', '動画'];

        $select_options = ['recruits_roles' => $recruits_roles];

        return $select_options;
    }

    public function dateFormat(Request $request, Offer $offer)
    {
        $year = $request->completion_deadline_year;
        $month = $request->completion_deadline_month;
        $day = $request->completion_deadline_day;
        $offer->completion_deadline = date('Y-m-d', strtotime($year . '-' . $month . '-' . $day));
    }
}
