<?php
namespace App\Http\Controllers;

use App\Http\Requests\AccountRequest;
use App\Models\Account;
use App\Models\CashReport;
use Illuminate\Http\Request;
use App\Models\Currency;
use App\Models\Bank;

class AccountController extends Controller
{
    public function createForm()
    {
        // Retrieve all currencies and banks from the database
        $currencies = Currency::all();
        $banks = Bank::all();

        return view('user.account.create', compact('currencies', 'banks'));
    }

    public function create(AccountRequest $request)
    {
        $validated = $request->validated();

        // Create the account
        $account = Account::create([
            'name' => $validated['name'],
            'description' => $validated['description'] ?? null,
            'is_active' => true,
            'id_bank' => $validated['id_bank'],
            'id_user' => auth()->id(),
            'id_currency' => $validated['id_currency'],
        ]);

        // Create the initial cash report
        CashReport::create([
            'description' => 'Initial cash report',
            'report_date' => now(),
            'report_amout' => 0,
            'id_account' => $account->id,
        ]);

        return redirect()->route('user.home')->with('success', 'Compte créé avec succès.');
    }

    public function list()
    {
        $accounts = Account::with(['bank', 'currency'])
            ->where('id_user', auth()->id())
            ->get();

        return view('user.account.list', compact('accounts'));
    }
}
