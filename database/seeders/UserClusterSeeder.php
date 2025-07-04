<?php

namespace Database\Seeders;

use App\Models\UserCluster;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserClusterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usr = [
            [
                'nama' => 'Anggota 1',
                'akses' => '-',
                'no_telp' => '0812345678',
                'url_pict' => 'logo.png',
                'id_role' => 3,
            ],
            [
                'nama' => 'Anggota 2',
                'akses' => '-',
                'no_telp' => '0812345678',
                'url_pict' => 'logo.png',
                'id_role' => 4,

            ],
            [
                'nama' => 'Anggota 3',
                'akses' => '-',
                'no_telp' => '0812345678',
                'url_pict' => 'logo.png',
                'id_role' => 3,
            ],
            [
                'nama' => 'Anggota 4',
                'akses' => '-',
                'no_telp' => '0812345678',
                'url_pict' => 'logo.png',
                'id_role' => 4,
            ],
        ];

        foreach ($usr as $v) {
            UserCluster::create([
                'nama' => $v['nama'],
                'akses' => $v['akses'],
                'no_telp' => $v['no_telp'],
                'url_pict' => $v['url_pict'],
                'id_role' => $v['id_role'],
            ]);
        };
    }
}
