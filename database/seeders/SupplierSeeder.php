<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'supplier_id' => 1, 
                'supplier_kode' => 'SUP001', 
                'supplier_nama' => 'PT.Mayora', 
                'supplier_alamat' => 'Jl. Merdeka No. 1'
            ],
            [
                'supplier_id' => 2, 
                'supplier_kode' => 'SUP002', 
                'supplier_nama' => 'PT.Unilever', 
                'supplier_alamat' => 'Jl. Sudirman No. 2'
            ],
            [
                'supplier_id' => 3, 
                'supplier_kode' => 'SUP003', 
                'supplier_nama' => 'PT.Nestle', 
                'supplier_alamat' => 'Jl. Thamrin No. 3'
            ],
        ];
        DB::table('m_supplier')->insert($data);
    }
}
