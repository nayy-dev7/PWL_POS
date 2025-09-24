<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            //supplier 1
            ['barang_id' => 1, 'kategori_id' => 1,'supplier_id' => 1,'barang_kode' => 'BRG001', 
                'barang_nama' => 'Indomie Goreng', 'harga_beli' => 2000, 'harga_jual' => 3000],
            ['barang_id' => 4, 'kategori_id' => 4,'supplier_id' => 1,'barang_kode' => 'BRG004', 
                'barang_nama' => 'Beras 5kg', 'harga_beli' => 50000, 'harga_jual' => 60000],
            ['barang_id' => 7, 'kategori_id' => 2,'supplier_id' => 1,'barang_kode' => 'BRG007', 
                'barang_nama' => 'Aqua 600ml', 'harga_beli' => 4000, 'harga_jual' => 6000],
            ['barang_id' => 10, 'kategori_id' => 3,'supplier_id' => 1,'barang_kode' => 'BRG010', 
                'barang_nama' => 'Tango', 'harga_beli' => 9000, 'harga_jual' => 11000],
            ['barang_id' => 13, 'kategori_id' => 1,'supplier_id' => 1,'barang_kode' => 'BRG013', 
                'barang_nama' => 'Supermi Ayam Bawang', 'harga_beli' => 2500, 'harga_jual' => 3500],
            //supplier 2
            ['barang_id' => 2, 'kategori_id' => 2, 'supplier_id' => 2, 'barang_kode' => 'BRG002', 
                'barang_nama' => 'Teh Botol Sosro', 'harga_beli' => 3000, 'harga_jual' => 5000],
            ['barang_id' => 5, 'kategori_id' => 5, 'supplier_id' => 2,'barang_kode' => 'BRG005', 
                'barang_nama' => 'Royco', 'harga_beli' => 7000, 'harga_jual' => 9000],
            ['barang_id' => 8, 'kategori_id' => 4, 'supplier_id' => 2,'barang_kode' => 'BRG008', 
                'barang_nama' => 'Minyak Goreng 1L', 'harga_beli' => 14000, 'harga_jual' => 17000],
            ['barang_id' => 11, 'kategori_id' => 5, 'supplier_id' => 2,'barang_kode' => 'BRG011', 
                'barang_nama' => 'Masako', 'harga_beli' => 6000, 'harga_jual' => 8000],
            ['barang_id' => 14, 'kategori_id' => 2, 'supplier_id' => 2,'barang_kode' => 'BRG014', 
                'barang_nama' => 'Fanta 1L', 'harga_beli' => 8000, 'harga_jual' => 10000],
            //supplier 3
            ['barang_id' => 3, 'kategori_id' => 3,  'supplier_id' => 3,'barang_kode' => 'BRG003', 
                'barang_nama' => 'Chitato', 'harga_beli' => 4000, 'harga_jual' => 6000],
            ['barang_id' => 6, 'kategori_id' => 1,  'supplier_id' => 3,'barang_kode' => 'BRG006', 
                'barang_nama' => 'Biskuit Roma', 'harga_beli' => 8000, 'harga_jual' => 10000],
            ['barang_id' => 9, 'kategori_id' => 3,  'supplier_id' => 3,'barang_kode' => 'BRG009', 
                'barang_nama' => 'Silverqueen', 'harga_beli' => 12000, 'harga_jual' => 15000],
            ['barang_id' => 12, 'kategori_id' => 2,  'supplier_id' => 3,'barang_kode' => 'BRG012', 
                'barang_nama' => 'Coca Cola 1L', 'harga_beli' => 8000, 'harga_jual' => 10000],
            ['barang_id' => 15, 'kategori_id' => 5,  'supplier_id' => 3,'barang_kode' => 'BRG015', 
                'barang_nama' => 'Lada', 'harga_beli' => 5000, 'harga_jual' => 7000],
        ];
        DB::table('m_barang')->insert($data);
    }
}
