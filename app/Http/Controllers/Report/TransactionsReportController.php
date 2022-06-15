<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Services\Reports\TransactionFormatter;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class TransactionsReportController extends Controller
{
    /**
     * @return Factory|View|Application
     */
    public function index(): Factory|View|Application
    {
        $transactions = Transaction::query()
            ->with([
                'accountHead.parentAccountHead.parentAccountHead.parentAccountHead'
            ])
            ->selectRaw('*, SUM(debit) - SUM(credit) as total_amount')
            ->groupBy('account_head_id')
            ->get();

        $reportData = TransactionFormatter::setTransactions($transactions)->format();

        return view('reports.transaction.index', [
            'transactions' => $reportData
        ]);
    }
}
