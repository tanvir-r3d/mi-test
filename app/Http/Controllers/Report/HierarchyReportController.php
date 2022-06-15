<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use App\Models\AccountHead;
use App\Services\Reports\HierarchyFormatter;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class HierarchyReportController extends Controller
{
    /**
     * @return Factory|View|Application
     */
    public function index(): Factory|View|Application
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
