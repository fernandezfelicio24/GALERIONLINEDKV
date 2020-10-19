<?php

use Illuminate\Database\Seeder;
use App\Admin;
use Spatie\Permission\Models\Role;
class ValidatorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['guard_name' => 'admin', 'name' => 'validator']);

        $admin = Admin::create([
            'name' => 'Validator',
            'email' => 'validator@gmail.com',
            'kode_dosen' => '672020321',
            'password' => bcrypt('validatordkvftiuksw'),
            'email_verified_at' => now(),
        ]);

        $admin->assignRole('validator');
    }
}
