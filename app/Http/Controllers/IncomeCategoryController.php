<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IncomeCategory;
use Illuminate\Support\Facades\Auth;

class IncomeCategoryController extends Controller
{
    public function index()
    {
        // デフォルトのカテゴリー
        $income_categories = IncomeCategory::all();
        // ユーザーが作成したカテゴリー
        $user_income_categories = IncomeCategory::where('user_id', Auth::user()->id)->get();

        return response()->json([
            'income_categories' => $income_categories,
            'user_income_categories' => $user_income_categories
        ]);
    }
    
}
