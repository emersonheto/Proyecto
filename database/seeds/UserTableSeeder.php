<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Emerson Herrera',
            'email'=>'emersonheto@gmail.com',
            'password'=>bcrypt('123123'),//secret
        ]);
    }
}
