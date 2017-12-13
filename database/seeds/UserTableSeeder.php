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
            'username'=> 'admin',
            'email' => 'admin@lesbonsdeals.ch',
            'password' => bcrypt('pa$$w0rd'),
        ]);
        $user->save();

        $user = new \App\User([
            'name' => 'test',
            'username' => 'test',
            'email' => 'test@lesbonsdeals.ch',
            'password' => bcrypt('test'),
        ]);
        $user->save();
    }
}
