<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Role;
use Illuminate\Support\Collection as SupportCollection;

/* Use table recruits by default */

class Recruit extends Model
{
    protected $fillable = [
        'id',
        'recruit_id',
        'user_id',
        'title',
        'body',
        'category_id',
        'budget',
        'file_attachment',
        'application_deadline',
        'deadline',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo('App\Models\User');
    }

    public function offers(): HasMany
    {
        return $this->hasMany('App\Models\Offer');
    }

    public function category(): HasOne
    {
        return $this->hasOne('App\Models\Category');
    }

    public function selectCategories(): SupportCollection
    {
        $categories = Category::select('name')->get();
        $categories_name = $categories->pluck('name');
        $categories_name->prepend('カテゴリーを選択してください');

        return $categories_name;
    }

    // recruit_role中間テーブルを経由してrecruitsテーブルからrolesテーブルデータを取得する
    public function recruit_role_roles(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Role');
    }

    public function selectRoles()
    {
        $roles = Role::select('role_category', 'name')->get();
        // dd($rolesValue);
        $select_roles = [];
        foreach ($roles as $role) {
            $role_set[$role['role_category']] = array($role['name']);
            // dd($role_set);
            $select_roles = array_merge_recursive($select_roles, $role_set);
        }
        // dd($select_roles);

        return $select_roles;
    }

    public function selectOptions()
    {
        $recruits_roles =
            [
                'デザイン' => ['イラスト作成', 'イラスト・本文の配置', '表紙作成', '見返し作成'],
                '原稿' => ['アイデア出し', 'コンセプト・あらすじ作り', 'ストーリー作成', '本文作成'],
                '動画' => ['動画編集', '読み聞かせ'],
            ];

        $select_options = ['recruits_roles' => $recruits_roles];

        return $select_options;
    }

    public function storeFiles($files)
    {
        if ($files) {
            foreach ($files as $file) {
                $file_name = $file->getClientOriginalName();
                $file->storeAs('', $file_name);
            }
        }
    }

    public function dateFormat(Request $request, Recruit $recruit)
    {
        $year = $request->application_deadline_year;
        $month = $request->application_deadline_month;
        $day = $request->application_deadline_day;
        $recruit->application_deadline = date('Y-m-d', strtotime($year . '-' . $month . '-' . $day));

        $year = $request->deadline_year;
        $month = $request->deadline_month;
        $day = $request->deadline_day;
        $recruit->deadline = date('Y-m-d', strtotime($year . '-' . $month . '-' . $day));
    }

    public function getCategory(Recruit $recruit)
    {
        $category = Category::find($recruit->category_id)->name;
        return $category;
    }
}
