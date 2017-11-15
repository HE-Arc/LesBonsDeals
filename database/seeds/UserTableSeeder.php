<?php

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
        $user = new \App\User([
            'name' => 'admin',
            'email' => 'admin@lesbonsdeals.ch',
            'password' => bcrypt('pa$$w0rd'),
        ]);
        $user->save();
    }
}
