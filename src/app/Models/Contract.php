<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use stdClass;

class Contract extends Model
{
    protected $fillable = [
        'id',
        'recruit_role_id',
        'offer_id',
    ];

    public function recruitRole(): BelongsTo
    {
        return $this->belongsTo(RecruitRole::class);
    }

    public function offers(): BelongsTo
    {
        return $this->belongsTo(Offer::class);
    }

    public function getOffers(Recruit $recruit)
    {
        $rolesCategories = RolesCategory::all();
        $offers = [];

        foreach ($rolesCategories as $roleCategory) {
            $id = $roleCategory->id;
            $recruitRoles[] = [
                    'id' => $id,
                    'category' => $roleCategory->name,
                    'roles' => $recruit->recruitRoles()->whereHas('role', function ($q) use ($id) {
                        $q->where('roles_category_id', $id);
                    })->with('role.rolesRecruitRole.offers.user')->get(),
            ];
        }

        $offers = $recruitRoles;
        dump($offers);
        return $offers;
    }
}
