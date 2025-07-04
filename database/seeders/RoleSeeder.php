<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = [
            ['role' => 'SA', 'role_name' => 'SuperAdmin'],
            ['role' => 'A', 'role_name' => 'Admin'],
            ['role' => 'C', 'role_name' => 'Custody'],
            ['role' => 'D', 'role_name' => 'Driver'],
        ];

        foreach ($role as $key => $v) {
            Role::create([
                'code' => $v['role'],
                'name' => $v['role_name'],
            ]);
        };
    }
}
