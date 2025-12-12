<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class transactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('booking')->get();
        return view('admin.transactions.index', compact('transactions'));
    }
}
