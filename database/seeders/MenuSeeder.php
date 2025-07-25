<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menu = [
            ['name' => 'DATA MASTER', 'icon' => '', 'url' => '#', 'index' => 1, 'main_menu' => 'DATA MASTER', 'active' => '1', 'parent' => '0'],

            ['name' => 'USER', 'icon' => '', 'url' => '#', 'index' => 2, 'main_menu' => 'USER',  'active' => '1', 'parent' => '0'],
            ['name' => 'USER SETTING', 'icon' => '', 'url' => '#', 'index' => 3, 'main_menu' => 'USER SETTING', 'active' => '1', 'parent' => '0'],

            // ['name' => 'Rencana Hasil Kerja', 'icon' => 'bi-stack', 'url' => 'rencana-hasil-kerja', 'index' => 1, 'main_menu' => 'APPS', 'active' => '1', 'parent' => '1'],
            // ['name' => 'Approval Rencana Hasil Kerja', 'icon' => 'bi-stack', 'url' => 'approval-rencana-hasil-kerja', 'index' => 1, 'main_menu' => 'APPS', 'active' => '1', 'parent' => '1'],

            // ['name' => 'Rencana Kerja', 'icon' => 'bi-stack', 'url' => 'rencana-kerja', 'index' => 1, 'main_menu' => 'DATA MASTER', 'active' => '1', 'parent' => '2'],
            // ['name' => 'Indikator Kinerja', 'icon' => 'bi-stack', 'url' => 'indikator-kinerja', 'index' => 2, 'main_menu' => 'DATA MASTER', 'active' => '1', 'parent' => '2'],
            ['name' => 'Cluster', 'icon' => 'bi-stack', 'url' => 'clusters', 'index' => 0, 'main_menu' => 'APPS', 'active' => '1', 'parent' => '1'],
            ['name' => 'User Clusters', 'icon' => 'bi-stack', 'url' => 'user-clusters', 'index' => 0, 'main_menu' => 'APPS', 'active' => '1', 'parent' => '1'],
            ['name' => 'Label Clusters', 'icon' => 'bi-stack', 'url' => 'label-clusters', 'index' => 0, 'main_menu' => 'APPS', 'active' => '1', 'parent' => '1'],
            ['name' => 'Anggota', 'icon' => 'bi-stack', 'url' => 'karyawan', 'index' => 0, 'main_menu' => 'APPS', 'active' => '1', 'parent' => '1'],
            // ['name' => 'Log Aktivitas', 'icon' => 'bi-people-fill', 'url' => 'log-aktivitas', 'index' => 1, 'main_menu' => 'APPS', 'active' => '1', 'parent' => '1'],

            ['name' => 'User', 'icon' => 'bi-people-fill', 'url' => 'users', 'index' => 0, 'main_menu' => 'USERS', 'active' => '1', 'parent' => '2'],

            ['name' => 'Role', 'icon' => 'bi-gear-wide', 'url' => 'roles', 'index' => 0, 'main_menu' => 'USER SETTING', 'active' => '1', 'parent' => '3'],
            ['name' => 'Menu', 'icon' => 'bi-card-list', 'url' => 'menus', 'index' => 0, 'main_menu' => 'USER SETTING', 'active' => '1', 'parent' => '3'],
            ['name' => 'User Menu', 'icon' => 'bi-gear-fill', 'url' => 'user-menus', 'index' => 0, 'main_menu' => 'USER SETTING', 'active' => '1', 'parent' => '3'],

        ];

        foreach ($menu as $v) {
            Menu::create([
                'main_menu' => 'APPS',
                'sub_parent' => '0',
                'parent' => $v['parent'],
                'name' => $v['name'],
                'icon' => $v['icon'],
                'url' => $v['url'],
                'index' => $v['index'],
                'active' => $v['active'],
            ]);
        }
    }
}
