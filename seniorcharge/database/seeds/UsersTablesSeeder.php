<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
           'name' => 'Homage',
           'email' => 'homage@gmail.com',
           'password' => Hash::make('homage'),
            'remember_token' =>str::random(10)
        ]);
    }
}
