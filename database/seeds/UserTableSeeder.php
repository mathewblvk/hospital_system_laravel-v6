<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'mathew matilia',
            'email' => 'mathewmatilia95@gmail.com',
            'staff_code' => '200167',
            'password' => Hash::make('tanzania1'),
            'education' => 'Bsc. Information systems management',
            'location' => 'Kimara, dsm',
            'contactnumber' => 234547546,
            'role_id' => 1
        ]);
    }
}
