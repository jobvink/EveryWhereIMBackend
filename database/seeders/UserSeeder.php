<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use jeremykenedy\LaravelRoles\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Everywhere IM',
            'email' => 'admin@test.nl',
            'password' => Hash::make('EverywhereIMisAwesome!'),
        ]);
        $role = Role::where('name', '=', 'admin')->get()->first();
        $user->attachRole($role);
    }
}
