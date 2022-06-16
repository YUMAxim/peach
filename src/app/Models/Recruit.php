<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Http\Request;
use App\Models\BookCategory;
use App\Models\Role;
use App\Models\RolesCategory;
use Illuminate\Support\Collection as SupportCollection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;
/* Use table recruits by default */

class Recruit extends Model
{
    protected $fillable = [
        'id',
        'recruit_id',
        'user_id',
        'title',
        'body',
        'book_category_id',
        'budget',
        'application_deadline',
        'deadline',
    ];

    protected $dates = [
        'application_deadline',
        'deadline',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function offers(): HasMany
    {
        return $this->hasMany(Offer::class);
    }

    public function bookCategory(): HasOne
    {
        return $this->hasOne(BookCategory::class);
    }

    public function recruitRoles(): hasMany
    {
        return $this->hasMany(RecruitRole::class);
    }

    public function rolesCategories(): BelongsTo
    {
        return $this->belongsTo(RolesCategory::class);
    }

    public function getBookCategory(Recruit $recruit)
    {
        $bookCategory = BookCategory::find($recruit->book_category_id)->name;

        return $bookCategory;
    }

    public function getBookCategories(): SupportCollection
    {
        $bookCategories = BookCategory::get('name');
        // dd($bookCategories);
        $bookCategoriesName = $bookCategories->pluck('name');
        // dd($bookCategoriesName);
        // $bookCategoriesName->prepend('カテゴリーを選択してください');

        return $bookCategoriesName;
    }

    public function getRecruitRoles(Recruit $recruit)
    {
        $rolesCategories = RolesCategory::all();
        $recruitRoles = [];

        foreach ($rolesCategories as $roleCategory) {
            $id = $roleCategory->id;
            $recruitRoles[] = [
                'id' => $id,
                'name' => $roleCategory->name,
                'roles' => $recruit->recruitRoles()->whereHas('role', function ($q) use ($id) {
                    $q->where('roles_category_id', $id);
                })->with('role')->get()->toArray(),
            ];
        }

        return $recruitRoles;
    }

    // get roles table data from recruits table via recruit_role intermediate table
    public function recruitRoleRoles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    public function storeFile(Request $request, Recruit $recruit)
    {
        $file = $request->file('attachedFile');
        if ($file) {
            $fileName = $file->getClientOriginalName();
            $uniqueFilePath = Storage::putFile('public', $file);

            $recruit->file_name = $fileName;
            $recruit->file_path = $uniqueFilePath;
            // $file->storeAs('public', $fileName);
        }
    }

    public function dateFormat(Request $request, Recruit $recruit)
    {
        // dd($request);
        $date = new Carbon;
        $year = $request->applicationDeadlineYear;
        $month = $request->applicationDeadlineMonth;
        $day = $request->applicationDeadlineDay;
        $min = $date->minute;
        $sec = $date->second;

        $recruit->application_deadline = $date->setDateTime($year, $month, $day, 21, $min, $sec);

        $year = $request->deadlineYear;
        $month = $request->deadlineMonth;
        $day = $request->deadlineDay;

        $recruit->deadline = $date->setDate($year, $month, $day);
        // dd($recruit->application_deadline, $date, $min, $sec, $recruit->deadline);
    }

    public function registerRewards(Recruit $recruit, Request $request)
    {
        $rewards = collect($request->rewards)->whereNotNull();
        foreach ($rewards as $roleId => $reward) {
            $recruit->recruitRoleRoles()->syncWithoutDetaching([$roleId => ['reward' => (int)$reward]]);
        }
    }
}
