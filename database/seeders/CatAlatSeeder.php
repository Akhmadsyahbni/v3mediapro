<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class CatAlatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Nonaktifkan pengecekan kunci asing
    DB::statement('SET FOREIGN_KEY_CHECKS=0');

        DB::table('categories')->insert([
            [
                'nama_kategori' => 'Kamera'
            ],
            [
                'nama_kategori' => 'Lensa'
            ],
            [
                'nama_kategori' => 'Lighting'
            ],
            [
                'nama_kategori' => 'Stabilizer'
            ]
        ]);

        DB::table('alats')->insert([
            [
                'nama_alat' => 'Sony a7ii',
                'kategori_id' => '1',
                'harga24' => '200000',
                'gambar' => '1649951685-Sony-A7-Mark-II-Body-Only-a.jpg'
            ],
            [
                'nama_alat' => 'Sony a6000',
                'kategori_id' => '1',
                'harga24' => '100000',
                'gambar' => '1649951696-21833_L_1.jpg'
            ],
            [
                'nama_alat' => 'Canon EOS 550D',
                'kategori_id' => '1',
                'harga24' => '85000',
                'gambar' => '1649951709-550d.jpg'
            ],
            [
                'nama_alat' => 'Sigma 30mm 1.4 for Sony',
                'kategori_id' => '2',
                'harga24' => '100000',
                'gambar' => '1649951742-sigma 30mm.jpg'
            ],
            [
                'nama_alat' => 'Sigma 16mm 1.4 for Sony',
                'kategori_id' => '2',
                'harga24' => '100000',
                'gambar' => '1649951751-images.jpg'
            ],
            [
                'nama_alat' => 'Canon EF 50mm 1.4 USM',
                'kategori_id' => '2',
                'harga24' => '75000',
                'gambar' => '1649951760-50mm canon usm.jpg'
            ],
            [
                'nama_alat' => 'Yongnuo 560 IV',
                'kategori_id' => '3',
                'harga24' => '125000',
                'gambar' => '1649951771-YONGNUO-YN560-IV-a.jpg'
            ],
            [
                'nama_alat' => 'DJI Ronin SC',
                'kategori_id' => '4',
                'harga24' => '175000',
                'gambar' => '1649951821-dji_rsc_2_ready_gan.jpg'
            ],
        ]);

         // Aktifkan kembali pengecekan kunci asing
    DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
