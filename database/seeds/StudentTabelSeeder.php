<?php

use Illuminate\Database\Seeder;
use App\Student;
class StudentTabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::create([
            'name' => 'Felicio',
            'email' => 'coba@gmail.com',
            'nim' => '672017901',
            'password' => bcrypt('qwertyui'),
            'email_verified_at' => now(),
        ]);
    }
}
