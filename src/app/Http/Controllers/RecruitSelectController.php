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

    public function selectOptions(): Collection
    {
        $pages = collect([16, 4, 8, 20, 24, 28, 32, '34ページ以上', '指定しない']);
        $booksizes = collect(['Ａ４判', 'Ａ４判横長', 'Ｂ５判', 'Ｂ５判横長', 'Ａ５判', 'Ａ５横長', '指定しない']);
        $file_formats = collect(['Photoshop', 'Illustrator', 'その他']);
        $my_roles = collect(['デザイン', '原稿', '動画']);
        $recruits_roles = collect(['デザイン', '原稿', '動画']);
        $desired_color_impressions = collect(['赤系', '青系', '緑系', '黃・オレンジ系', 'ピンク系', '茶系', '黒系', '特になし', 'その他']);
        
        $select_options = collect(['pages' => $pages, 'booksizes' => $booksizes, 'file_formats' => $file_formats,'my_roles' => $my_roles, 'recruits_roles' => $recruits_roles, 'desired_color_impressions' => $desired_color_impressions]);

        return $select_options;
    }
}
