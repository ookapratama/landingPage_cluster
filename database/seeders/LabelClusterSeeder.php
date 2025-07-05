<?php

namespace Database\Seeders;

use App\Models\LabelCluster;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LabelClusterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //  TM
        //  CRM 
        //  JALIN
        //  NoTrx
        $usr = [
            [
                'nama' => 'ATM',
                'nilai' => 80,
            ],
            [
                'nama' => 'CRM',
                'nilai' => 78,
            ],
            [
                'nama' => 'JALIN',
                'nilai' => 100,
            ],
            [
                'nama' => 'NoTrx',
                'nilai' => 88,
            ],
        ];

        foreach ($usr as $v) {
            LabelCluster::create([
                'nama' => $v['nama'],
                'nilai' => $v['nilai'],
            ]);
        };
    }
}
