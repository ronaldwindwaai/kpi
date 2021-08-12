<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([RolesAndPermissionsSeeder::class]);
        \App\Models\User::factory(10)
                ->create()
                ->each(function ($user) {
                    $role = Role::all()->random();
                    $role->users()->attach($user);
            });
        \App\Models\User::factory(5)
            ->create()
            ->each(function ($user) {
                $role = Role::findByName('officer');
                $role->users()->attach($user);
            });
        \App\Models\User::factory(5)
            ->create()
            ->each(function ($user) {
                $role = Role::findByName('manager');
                $role->users()->attach($user);
            });
        $admin = \App\Models\User::factory()->create(
            [
                'name' => 'Ronald Windwaai',
                'email' => 'ronaldwindwaai@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('admin'),
                'remember_token' => Str::random(10),
            ]
        );
        $role = Role::findByName('super-admin');
        $role->users()->attach($admin);
    }
}
