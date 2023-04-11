<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TransactionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $transactions = [
            ['products_id' => 1, 'qty' => 10, 'users_id' => 1, 'total' => 10000],
            ['products_id' => 2, 'qty' => 10, 'users_id' => 1, 'total' => 10000],
            ['products_id' => 3, 'qty' => 10, 'users_id' => 1, 'total' => 10000]
        ];
        DB::table('transactions')->insert($transactions);
    }
}
