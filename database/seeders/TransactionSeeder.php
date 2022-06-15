<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $transactions = [
            [
                'account_head_id' => 3,
                'date' => '2021-10-03',
                'debit' => 100,
                'credit' => 0
            ],
            [
                'account_head_id' => 3,
                'date' => '2021-10-05',
                'debit' => 0,
                'credit' => 15
            ],
            [
                'account_head_id' => 3,
                'date' => '2021-10-08',
                'debit' => 0,
                'credit' => 65
            ],
            [
                'account_head_id' => 4,
                'date' => '2021-10-05',
                'debit' => 60,
                'credit' => 0
            ],
            [
                'account_head_id' => 4,
                'date' => '2021-10-05',
                'debit' => 0,
                'credit' => 45
            ],
            [
                'account_head_id' => 5,
                'date' => '2021-10-15',
                'debit' => 30,
                'credit' => 0
            ],
            [
                'account_head_id' => 6,
                'date' => '2021-10-12',
                'debit' => 40,
                'credit' => 0
            ],
            [
                'account_head_id' => 6,
                'date' => '2021-10-22',
                'debit' => 0,
                'credit' => 20
            ],
            [
                'account_head_id' => 8,
                'date' => '2021-10-18',
                'debit' => 40,
                'credit' => 0
            ],
            [
                'account_head_id' => 12,
                'date' => '2021-10-27',
                'debit' => 25,
                'credit' => 0
            ],
            [
                'account_head_id' => 12,
                'date' => '2021-10-23',
                'debit' => 0,
                'credit' => 20
            ],
            [
                'account_head_id' => 13,
                'date' => '2021-10-30',
                'debit' => 10,
                'credit' => 0
            ],
            [
                'account_head_id' => 14,
                'date' => '2021-11-07',
                'debit' => 15,
                'credit' => 0
            ],
            [
                'account_head_id' => 14,
                'date' => '2021-11-12',
                'debit' => 0,
                'credit' => 15
            ],
            [
                'account_head_id' => 14,
                'date' => '2021-11-11',
                'debit' => 15,
                'credit' => 0
            ],
        ];
        DB::table('transactions')->truncate();
        Transaction::query()->insert($transactions);
    }
}
