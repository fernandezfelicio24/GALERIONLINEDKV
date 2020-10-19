<?php

use Illuminate\Database\Seeder;
use App\Admin;
use Spatie\Permission\Models\Role;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['guard_name' => 'admin', 'name' => 'super-admin']);

        $admin = Admin::create([
            'name' => 'Admin DKV',
            'email' => 'admindkv@gmail.com',
            'kode_dosen' => '672020901',
            'password' => bcrypt('admindkvftiuksw'),
            'email_verified_at' => now(),
        ]);

        $admin->assignRole('super-admin');
    }
}
