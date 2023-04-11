<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Spent;
use Illuminate\Support\Facades\Auth;

class SpentController extends Controller
{
    public function index()
    {
        $spents = Spent::where('user_id', Auth::user()->id)->get();

        $totalAmount = 0;

        // 取得したincomes（収入金額）を足す
        foreach($spents as $spent){
            $totalAmount += $spent->amount;
        }

        return response()->json([
            'incomes' => $spents,
            'totalAmount' => $totalAmount
        ]);
    }
}
