<?php

namespace App\Http\Controllers;

use App\Models\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WithdrawalController extends Controller
{
    /**
     * Display a listing of the user's withdrawal requests.
     */
    public function index()
    {
        $user = Auth::user();
        $activeTab = 'withdrawals';
        $withdrawals = Auth::user()->withdrawals()->latest()->paginate(15);
        return view('mypanel.withdrawals.index', compact('withdrawals','user', 'activeTab'));
    }

    /**
     * Show the form for creating a new withdrawal request.
     */
    public function create()
    {
        $user = Auth::user();
        $activeTab = 'CreateWithdrawals';
        return view('mypanel.withdrawals.create', compact('user','activeTab'));
    }

    /**
     * Store a newly created withdrawal request in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'amount' => 'required|numeric|min:1|max:' . $user->balance,
            'payment_details' => 'required|string|max:1000',
        ], [
            'amount.max' => 'The withdrawal amount cannot be greater than your available balance.'
        ]);

        // Create the withdrawal request
        $withdrawal = new Withdrawal([
            'user_id' => $user->id,
            'amount' => $request->amount,
            'payment_details' => $request->payment_details,
            'status' => 'pending',
        ]);
        $withdrawal->save();

        // It is important to deduct the amount from the user's balance here
        // to prevent them from requesting more than they have.
        $user->balance -= $request->amount;
        $user->save();

        return redirect()->route('user.withdrawals.index')->with('success', 'Your withdrawal request has been submitted successfully!');
    }
}
