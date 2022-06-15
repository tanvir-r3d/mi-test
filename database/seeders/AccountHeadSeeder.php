<?php

namespace Database\Seeders;

use App\Models\AccountHead;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccountHeadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $accountHeads = [
            [
                'name' => 'Group 1',
                'parent_id' => null,
                'level' => 1
            ],
            [
                'name' => 'Group 2',
                'parent_id' => 1,
                'level' => 2
            ],
            [
                'name' => 'Account Head 1',
                'parent_id' => 2,
                'level' => 3
            ],
            [
                'name' => 'Account Head 2',
                'parent_id' => 2,
                'level' => 3
            ],
            [
                'name' => 'Account Head 4',
                'parent_id' => 1,
                'level' => 2
            ],
            [
                'name' => 'Account Head 5',
                'parent_id' => 1,
                'level' => 2
            ],
            [
                'name' => 'Group 3',
                'parent_id' => null,
                'level' => 1
            ],
            [
                'name' => 'Account Head 3',
                'parent_id' => 7,
                'level' => 2
            ],
            [
                'name' => 'Group 5',
                'parent_id' => null,
                'level' => 1
            ],
            [
                'name' => 'Group 6',
                'parent_id' => 9,
                'level' => 2
            ],
            [
                'name' => 'Group 4',
                'parent_id' => 10,
                'level' => 3
            ],

            [
                'name' => 'Account Head 6',
                'parent_id' => 11,
                'level' => 4
            ],
            [
                'name' => 'Account Head 7',
                'parent_id' => 11,
                'level' => 4
            ],
            [
                'name' => 'Account Head 8',
                'parent_id' => 9,
                'level' => 2
            ],
        ];

        DB::table('account_heads')->truncate();
        AccountHead::query()->insert($accountHeads);
    }
}
