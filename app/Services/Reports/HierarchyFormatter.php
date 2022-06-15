<?php

namespace App\Services\Reports;

class HierarchyFormatter
{
    private $accountHeads;

    private function __construct($accountHeads)
    {
        $this->accountHeads = $accountHeads;
        return $this;
    }

    public static function setAccountHeads($accountHeads)
    {
        return new static($accountHeads);
    }

    private function getAccountHeads()
    {
        return $this->accountHeads;
    }

    public function format()
    {
        return $this->reportData();
    }

    private function reportData()
    {
        $reports = [];

        foreach ($this->getAccountHeads() as $head) {
            $reports[] = [
                'head_name' => $head->name,
                'total_amount' => $this->computeTransaction($head->childAccountHeads),
                'childs' => $this->formatChildAccount($head->childAccountHeads),
            ];
        }
        return $reports;
    }

    private function formatChildAccount($heads)
    {
        if (empty($heads)) {
            return [];
        }
        $reports = [];
        foreach ($heads as $head) {
            $totalAmount = $head->transactions->sum('debit')
                - $head->transactions->sum('credit')
                + $this->computeTransaction($head->childAccountHeads);

            $reports[] = [
                'head_name' => $head->name,
                'total_amount' => $totalAmount,
                'childs' => $this->formatChildAccount($head->childAccountHeads),
            ];
        }
        return $reports;
    }

    private function computeTransaction($heads)
    {
        if (empty($heads)) {
            return 0;
        }
        $totalAmount = 0;
        foreach ($heads as $head) {
            $totalAmount += $head->transactions->sum('debit')
                - $head->transactions->sum('credit')
                + $this->computeTransaction($head->childAccountHeads);
        }
        return $totalAmount;
    }
}
