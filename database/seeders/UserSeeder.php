<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => 'velikaib',
            'name' => 'Velika',
            'email' => 'veel@gmail.com',
            'password' => \Hash::make('123456'),
            'office_code' => '1',
            'section_code' => '1',
            'staff_code' => '1'
        ]);
    }
}
