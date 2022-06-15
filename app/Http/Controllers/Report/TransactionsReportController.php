<?php

namespace App\Http\Controllers\Report;

use App\Models\Transaction;
use App\Http\Controllers\Controller;

class TransactionsReportController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('accountHead.parentAccountHead')
            ->selectRaw('*, SUM(debit) - SUM(credit) as total_amount')
            ->groupBy('account_head_id')
            ->get();

        $reports = [];
        foreach ($transactions as $key => $transaction) {
            $reports[$key] = [
                'account' => $transaction->accountHead->name,
                'total_amount' => $transaction->total_amount
            ];
            // $reports[$key]['g_level_' . $transaction->accountHead->parentAccountHead->level] =
            //     $transaction->accountHead->parentAccountHead->name;
            // if ($transaction->accountHead->parentAccountHead->parentAccountHead) {
            //     $reports[$key]['g_level_' . $transaction->accountHead->parentAccountHead->parentAccountHead->level] =
            //         $transaction->accountHead->parentAccountHead->parentAccountHead->name;
            // }
            $this->groupLevel($reports, $key, $transaction->accountHead->parentAccountHead);
        }
        return $reports;
        return view('reports.transaction.index', [
            'transactions' => $transactions
        ]);
    }

    private function groupLevel(&$reports, $key, $parentAccount)
    {
        if (empty($parentAccount)) {
            return;
        }

        $reports[$key] = ['g_level_' . $parentAccount->level =>  $parentAccount->name];
        if ($parentAccount->parentAccountHead) {
            $this->groupLevel($reports, $key, $parentAccount->parentAccountHead);
        }
    }
}
