<?php

namespace App\Services\Reports;

use Illuminate\Database\Eloquent\Collection;

class HierarchyFormatter
{
    private function __construct(private Collection|array $accountHeads)
    {
        return $this;
    }

    /**
     * @param $accountHeads
     * @return static
     */
    public static function setAccountHeads($accountHeads): self
    {
        return new static($accountHeads);
    }

    /**
     * @return mixed
     */
    private function getAccountHeads(): mixed
    {
        return $this->accountHeads;
    }

    /**
     * @return array
     */
    public function format(): array
    {
        return $this->getReportData();
    }

    /**
     * @return array
     */
    private function getReportData(): array
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

    /**
     * @param $heads
     * @return array
     */
    private function formatChildAccount($heads): array
    {
        $reports = [];

        if (!empty($heads)) {
            foreach ($heads as $head) {
                $totalAmount = $this->getTotalAmount($head);

                $reports[] = [
                    'head_name' => $head->name,
                    'total_amount' => $totalAmount,
                    'childs' => $this->formatChildAccount($head->childAccountHeads),
                ];
            }
        }

        return $reports;
    }

    /**
     * @param $heads
     * @return int
     */
    private function computeTransaction($heads): int
    {
        $totalAmount = 0;

        if (!empty($heads)) {
            foreach ($heads as $head) {
                $totalAmount += $this->getTotalAmount($head);
            }
        }

        return $totalAmount;
    }

    /**
     * @param $head
     * @return mixed
     */
    private function getTotalAmount($head): mixed
    {
        return $this->calculateTotalAmount($head->transactions)
            + $this->computeTransaction($head->childAccountHeads);
    }

    /**
     * @param $transactions
     * @return mixed
     */
    private function calculateTotalAmount($transactions): mixed
    {
        return ($transactions->sum('debit') - $transactions->sum('credit'));
    }
}
