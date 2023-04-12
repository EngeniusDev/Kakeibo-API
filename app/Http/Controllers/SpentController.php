<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Spent;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\SpentCreateRequest;

class SpentController extends Controller
{
    public function index()
    {
        $spents = Spent::where('user_id', Auth::user()->id)->get();

        $totalAmount = 0;

        // spents（収入金額）を足す
        foreach($spents as $spent){
            $totalAmount += $spent->amount;
        }

        return response()->json([
            'spents' => $spents,
            'totalAmount' => $totalAmount
        ]);
    }

    public function show($id)
    {
        $spent = Spent::findOrFail($id);

        // App\Policies\SpentPolicy
        $this->authorize('view', $spent);

        return response()->json([
            'spent' => $spent
        ]);
    }

    public function store(SpentCreateRequest $request)
    {
        try {
            $spent = Spent::create([
                'amount' => $request->amount,
                'remarks' => $request->remarks,
                'user_id' => Auth::id(),
                'spent_categories_id' => $request->spent_categories_id,
            ]);
        } catch (\Exception $e) {
            $e->getMessage();
        }

        return response()->json($spent);
    }

}
