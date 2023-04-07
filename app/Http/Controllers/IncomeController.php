<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Income;
use App\Models\User;
use App\Models\IncomeCategories;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\IncomeCreateRequest;
use App\Http\Requests\IncomeUpdateRequest;

class IncomeController extends Controller
{
    public function index()
    {
        $incomes = Income::where('user_id', Auth::user()->id)->get();
        /* 
            現段階では、Auth::user()->idはnullの値になります
            APIテストをする際は下記のコードを使ってください。
        */

        // $incomes = Income::where('user_id', 1)->get();

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

        /*
            ログインユーザーが現在取得出来ないためPolicyは正常に動きません
            PolicyをコメントアウトするとAPIレスポンスが確認出来ます。 
         */
        $this->authorize('view', $income);

        return response()->json([
            'income' => $income
        ]);
    }

    public function store(IncomeCreateRequest $request)
    {
        return Income::create($request->all());
    }

    public function update(IncomeUpdateRequest $request, Income $income)
    {
        $income->update($request->all());

        return $income;
    }

    public function destroy(Income $income)
    {
        $income->delete();

        return $income;
    }

}
