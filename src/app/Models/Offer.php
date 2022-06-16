<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'recruit_id',
        'user_id',
        'body',
        'recruit_role',
        'completion_deadline',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function recruit(): BelongsTo
    {
        return $this->belongsTo(Recruit::class);
    }

    // offer_recruit_role中間テーブルを経由してoffersテーブルからrecruit_roleテーブルデータを取得する
    public function offerRecruitRoles(): BelongsToMany
    {
        return $this->belongsToMany(RecruitRole::class)->withTimestamps();
    }

    public function storeFile(Request $request, Offer $offer)
    {
        $file = $request->file('attachedFile');
        if ($file) {
            $fileName = $file->getClientOriginalName();
            $uniqueFilePath = Storage::putFile('public', $file);

            $offer->file_name = $fileName;
            $offer->file_path = $uniqueFilePath;
            // $file->storeAs('public', $fileName);
        }
    }


    public function dateFormat(Request $request, Offer $offer)
    {
        $year = $request->completionDeadlineYear;
        $month = $request->completionDeadlineMonth;
        $day = $request->completionDeadlineDay;
        $offer->completion_deadline = date('Y-m-d', strtotime($year . '-' . $month . '-' . $day));
    }

    public function registerOfferRoles(Offer $offer, Request $request)
    {
        $offerRoles = collect($request->recruitRoles)->keys();
        foreach ($offerRoles as $recruitRoleId) {
            $offer->offerRecruitRoles()->attach($recruitRoleId);
        }
    }
}
