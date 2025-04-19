<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\CashReport;
use Illuminate\Http\Request;

class CashReportController extends Controller
{
    public function createForm($accountId)
    {
        $account = Account::findOrFail($accountId);
        return view('user.account.report', compact('account'));
    }

    public function create(Request $request, $accountId)
    {
        $request->validate([
            'description' => 'nullable|string|max:255',
            'report_date' => 'required|date',
            'report_amout' => 'required|numeric|min:0'
        ]);

        $account = Account::findOrFail($accountId);
        // Get the last cash report for the account
        $lastReport = CashReport::where('id_account', $accountId)
        ->orderBy('report_date', 'desc')
        ->first();

        // Calculate the estimated value
        $estimatedValue = $lastReport ? $lastReport->report_amout : 0;

        CashReport::create([
            'description' => $request->input('description'),
            'report_date' => $request->input('report_date'),
            'report_amout' => $request->input('report_amout'),
            'estimation_amount' => $estimatedValue,
            'id_account' => $account->id,
        ]);
        return redirect()->route('user.account.list')->with('success', 'Cash report créé avec succès.');
    }
}
