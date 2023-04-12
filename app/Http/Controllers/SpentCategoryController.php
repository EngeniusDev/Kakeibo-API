<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SpentCategory;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\SpentCategoryCreateRequest;
use App\Http\Requests\SpentCategoryUpdateRequest;


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

    public function show($id)
    {   
        $spentCategory = SpentCategory::findOrFail($id);

        return response()->json([
            'spentCategory' => $spentCategory
        ]);
    }

    public function store(SpentCategoryCreateRequest $request)
    {
        try {
            $spentCategory = SpentCategory::create([
                'user_id' => Auth::user()->id,
                'name' => $request->name,
            ]);
        } catch (\Exception $e) {
            $e->getMessage();
        }

        return response()->json($spentCategory);
    }

    public function update(SpentCategoryUpdateRequest $request, $id)
    {
        $spentCategory = SpentCategory::findOrFail($id);

        try {
            $spentCategory->fill([
                'user_id' => Auth::user()->id,
                'name' => $request->name,
            ])->save();                     
        } catch (\Exception $e) {
            $e->getMessage();
        }

        return response()->json($spentCategory);
    }
}
