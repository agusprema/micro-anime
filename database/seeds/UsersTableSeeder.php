<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();

        $adminRole = Role::where('name', 'admin')->first();
        $userRole = Role::where('name', 'user')->first();

        $admin = User::create([
            'name' => 'Agus Prema',
            'email' => 'agusprema@gmail.com',
            'password' => Hash::make('masukan123')
        ]);
        $user = User::create([
            'name' => 'Selem Manis',
            'email' => 'selemmanis9@gmail.com',
            'password' => Hash::make('masukan123')
        ]);

        $admin->roles()->attach($adminRole);
        $user->roles()->attach($userRole);
    }
}
