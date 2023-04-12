<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IncomeCategory;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\IncomeCategoryCreateRequest;
use App\Http\Requests\IncomeCategoryUpdateRequest;

class IncomeCategoryController extends Controller
{
    public function index()
    {
        // デフォルトのカテゴリー
        $defaultCategory = IncomeCategory::whereNull('user_id')->get();

        // ユーザーが追加したカテゴリー
        $addCategory = IncomeCategory::where('user_id', Auth::user()->id)->get();

        return response()->json([
            'defaultCategory' => $defaultCategory,
            'addCategory' => $addCategory
        ]);
    }

    public function show($id)
    {   
        $incomeCategory = IncomeCategory::findOrFail($id);

        return response()->json([
            'incomeCategory' => $incomeCategory
        ]);
    }

    public function store(IncomeCategoryCreateRequest $request)
    {
        try {
            $incomeCategory = IncomeCategory::create([
                'user_id' => Auth::user()->id,
                'name' => $request->name,
            ]);
        } catch (\Exception $e) {
            $e->getMessage();
        }

        return response()->json($incomeCategory);
    }

    public function update(IncomeCategoryUpdateRequest $request, $id)
    {
        $incomeCategory = IncomeCategory::findOrFail($id);

        try {
            $incomeCategory->fill([
                'user_id' => Auth::user()->id,
                'name' => $request->name,
            ])->save();                     
        } catch (\Exception $e) {
            $e->getMessage();
        }

        return response()->json($incomeCategory);
    }

    public function destroy($id)
    {
        $incomeCategory = IncomeCategory::findOrFail($id);

        $incomeCategory->delete();

        return $incomeCategory;
    }
}
