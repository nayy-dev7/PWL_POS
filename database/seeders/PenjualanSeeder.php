<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['penjualan_id' => 1, 'user_id' => 3, 'pembeli' => 'John Doe', 'penjualan_kode' => 'PJ001', 'penjualan_tanggal' => '2025-10-01'],
            ['penjualan_id' => 2, 'user_id' => 3, 'pembeli' => 'Jane Smith', 'penjualan_kode' => 'PJ002', 'penjualan_tanggal' => '2025-10-02'],
            ['penjualan_id' => 3, 'user_id' => 3, 'pembeli' => 'Alice Johnson', 'penjualan_kode' => 'PJ003', 'penjualan_tanggal' => '2025-10-03'],
            ['penjualan_id' => 4, 'user_id' => 3, 'pembeli' => 'Bob Brown', 'penjualan_kode' => 'PJ004', 'penjualan_tanggal' => '2025-10-04'],
            ['penjualan_id' => 5, 'user_id' => 3, 'pembeli' => 'Charlie Davis', 'penjualan_kode' => 'PJ005', 'penjualan_tanggal' => '2025-10-05'],
            ['penjualan_id' => 6, 'user_id' => 3, 'pembeli' => 'Diana Evans', 'penjualan_kode' => 'PJ006', 'penjualan_tanggal' => '2025-10-06'],
            ['penjualan_id' => 7, 'user_id' => 3, 'pembeli' => 'Frank Green', 'penjualan_kode' => 'PJ007', 'penjualan_tanggal' => '2025-10-07'],
            ['penjualan_id' => 8, 'user_id' => 3, 'pembeli' => 'Grace Harris', 'penjualan_kode' => 'PJ008', 'penjualan_tanggal' => '2025-10-08'],
            ['penjualan_id' => 9, 'user_id' => 3, 'pembeli' => 'Hank Ingram', 'penjualan_kode' => 'PJ009', 'penjualan_tanggal' => '2025-10-09'],
            ['penjualan_id' => 10, 'user_id' => 3, 'pembeli' => 'Ivy Jackson', 'penjualan_kode' => 'PJ010', 'penjualan_tanggal' => '2025-10-10'],
        ];
        DB::table('t_penjualan')->insert($data);
    }
}
