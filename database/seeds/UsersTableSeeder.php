<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
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

        $moderatorRole = Role::where('name', 'Moderator')->first();
        $adminRole = Role::where('name', 'Admin')->first();

        $moderator = User::create([
            'id_user'           => str::random(8),
            'name'              => 'Agus Prema',
            'email'             => 'agusprema@gmail.com',
            'password'          => Hash::make('masukan123'),
            'gender'            => 'Male',
            'date_of_birth'     => '2002-03-12',
            'profile_image'     => 'default.jpg',
            'thumbnail_image'   => 'default.jpg'
        ]);
        $admin = User::create([
            'id_user'           => str::random(8),
            'name'              => 'Selem Manis',
            'email'             => 'selemmanis9@gmail.com',
            'password'          => Hash::make('masukan123'),
            'gender'            => 'Male',
            'date_of_birth'     => '2002-03-12',
            'profile_image'     => 'default.jpg',
            'thumbnail_image'   => 'default.jpg'
        ]);

        $moderator->roles()->attach($moderatorRole);
        $admin->roles()->attach($adminRole);
    }
}
