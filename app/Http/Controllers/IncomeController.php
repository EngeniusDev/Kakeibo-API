<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Income;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\IncomeCreateRequest;

class IncomeController extends Controller
{
    public function index()
    {
        $incomes = Income::where('user_id', Auth::user()->id)->get();

        $totalAmount = 0;

        // 取得したincomes（収入金額）を足す
        foreach($incomes as $income){
            $totalAmount += $income->amount;
        }

        return response()->json([
            'incomes' => $incomes,
            'totalAmount' => $totalAmount
        ]);
    }

    public function show($id)
    {
        $income = Income::findOrFail($id);

        // App\Policies\IncomePolicy
        $this->authorize('view', $income);

        return response()->json([
            'income' => $income
        ]);
    }

    public function store(IncomeCreateRequest $request)
    {
        try {
            $income = Income::create([
                'amount' => $request->amount,
                'remarks' => $request->remarks,
                'user_id' => Auth::id(),
                'income_categories_id' => $request->income_categories_id,
            ]);
        } catch (\Exception $e) {
            $e->getMessage();
        }

        return response()->json($income);
    }
}
