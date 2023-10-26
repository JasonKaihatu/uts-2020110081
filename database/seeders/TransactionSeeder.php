<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB; // Import DB untuk mengakses database
use Faker\Factory as FakerFactory; // Import FakerFactory

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Daftar tipe transaksi
        $transactionTypes = ['income', 'expense'];

        // Daftar kategori sesuai dengan tipe transaksi
        $categories = [
            'income' => ['wage', 'bonus', 'gift'],
            'expense' => ['food & drinks', 'shopping', 'charity', 'housing', 'insurance', 'taxes', 'transportation'],
        ];

        // Buat 100 data dummy transaksi
        for ($i = 0; $i < 100; $i++) {
            $type = $transactionTypes[rand(0, 1)]; // Pilih secara acak tipe transaksi
            $category = $categories[$type][array_rand($categories[$type])]; // Pilih kategori sesuai dengan tipe
            $amount = rand(1, 1000) * 1000; // Nominal acak dalam rupiah

            Transaction::create([
                'type' => $type,
                'category' => $category,
                'amount' => $amount,
                'notes' => 'Catatan transaksi ke-' . ($i + 1),
                'created_at' => now()->subDays(rand(1, 30)), // Tanggal transaksi acak dalam 30 hari terakhir
            ]);
        }
    }
}
