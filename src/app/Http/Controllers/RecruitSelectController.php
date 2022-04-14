<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Collection;

class RecruitSelectController extends Controller
{
    public function categories(): Collection
    {
        $categories = Category::select('name')->get();
        $categories_name = $categories->pluck('name');
        $categories_name->prepend('カテゴリーを選択してください');

        return $categories_name;
    }
}
