<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Income;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class IncomeController extends Controller
{
    public function index()
    {
        $incomes = Income::where('user_id', Auth::user()->id)->get();

        /* 
            現段階では、Auth::user()->idはnullの値になります
            APIテストをする際は上記のコードをコメントアウトして
            下記のコードのコメントアウトを外してして使ってください。
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
}
