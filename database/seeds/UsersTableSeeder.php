<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
                [
                        'id' => 1,
                        'name' => 'admin',
                        'email' => 'atazholy.kz@gmail.com',
                        'password' => bcrypt(12345678),
                        'status' => '1',
                ]

        ];

        DB::table('users')->insert($data);
    }
}
