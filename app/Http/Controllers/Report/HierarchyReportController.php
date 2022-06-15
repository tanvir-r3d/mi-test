<?php

namespace App\Http\Controllers\Report;

use App\Models\AccountHead;
use App\Http\Controllers\Controller;
use App\Services\Reports\HierarchyFormatter;

class HierarchyReportController extends Controller
{
    public function index()
    {
        $accountHeads = AccountHead::query()
            ->with([
                'transactions',
                'childTransactions',
                'childAccountHeads.transactions',
                'childAccountHeads.childAccountHeads.transactions',
                'childAccountHeads.childAccountHeads.childAccountHeads.transactions',
            ])
            ->where('level', 1)->get();

        $reportData = HierarchyFormatter::setAccountHeads($accountHeads)
            ->format();

        return view('reports.hierarchy.index', [
            'account_heads' => $reportData
        ]);
    }
}
