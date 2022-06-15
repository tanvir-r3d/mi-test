<?php

namespace App\Services\Reports;

use Illuminate\Support\Collection;

class TransactionFormatter
{
    private function __construct(private Collection|array $transactions)
    {
        return $this;
    }

    /**
     * @param $transactions
     * @return static
     */
    public static function setTransactions($transactions): static
    {
        return new static($transactions);
    }

    /**
     * @return array|Collection
     */
    private function getTransactions(): array|Collection
    {
        return $this->transactions;
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
        $reportData = [];
        foreach ($this->getTransactions() as $key => $transaction) {
            $accountHead = $transaction->accountHead;

            $reportData[$key] = [
                'account' => $accountHead->name,
                'total_amount' => $transaction->total_amount,
            ];

            $reportData[$key] = array_merge(
                $reportData[$key],
                $this->makeGroupLevels($accountHead->parentAccountHead)
            );
        }
        return $reportData;
    }

    /**
     * @param $parentAccount
     * @return array
     */
    private function makeGroupLevels($parentAccount): array
    {
        if (!isset($parentAccount->name)) {
            return [];
        }

        return array_merge(
            ['g_level_' . $parentAccount->level => $parentAccount->name],
            $this->makeGroupLevels($parentAccount->parentAccountHead)
        );
    }
}
