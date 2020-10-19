<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Admin;
class DosenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['guard_name' => 'admin', 'name' => 'dosen']);

        $admin = Admin::create([
            'name' => 'Michael',
            'email' => 'michel@gmail.com',
            'kode_dosen' => '672020002',
            'password' => bcrypt('dosendkvftiuksw'),
            'email_verified_at' => now(),
        ]);
        

        $admin->assignRole('dosen');

    }
}
