<?php

namespace Database\Seeders;

use App\Models\Cluster;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClusterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usr = [
            [
                'user_id' => '1',
                'nama' => 'Cluster Classmild',
                'shift' => 'pagi',
            ],
            [
                'user_id' => '2',
                'nama' => 'Cluster Classmild',
                'shift' => 'pagi',
            ],
            [
                'user_id' => '3',
                'nama' => 'Cluster Batta"na',
                'shift' => 'middle',
            ],
            [
                'user_id' => '4',
                'nama' => 'Cluster Batta"na',
                'shift' => 'middle',
            ],
        ];

        foreach ($usr as $v) {
            Cluster::create([
                'user_id' => $v['user_id'],
                'nama' => $v['nama'],
                'shift' => $v['shift'],
            ]);
        };
    }
}
