<?php

use Illuminate\Database\Seeder;
use \App\User;
use \App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $writer = Role::create(['name' => 'writer']);
        $reader = Role::create(['name' => 'reader']);

        $harun = User::firstOrNew(['name' => 'harun', 'email' => 'harun@koobe.id', 'password' => \Hash::make('harun123')]);
        $mela = User::firstOrNew(['name' => 'mela', 'email' => 'mela@koobe.id', 'password' => \Hash::make('mela123')]);

        $writer->users()->save($harun);
        $reader->users()->save($mela);
    }
}
