<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SpentCategory;
    use Illuminate\Support\Facades\Auth;

class SpentCategoryController extends Controller
{
    public function index()
    {
        // デフォルトのカテゴリー
        $defaultCategory = SpentCategory::whereNull('user_id')->get();

        // ユーザーが追加したカテゴリー
        $addCategory = SpentCategory::where('user_id', Auth::user()->id)->get();

        return response()->json([
            'defaultCategory' => $defaultCategory,
            'addCategory' => $addCategory
        ]);
    }
}
