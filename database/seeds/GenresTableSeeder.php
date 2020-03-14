<?php

use Illuminate\Database\Seeder;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->insert([
            'genre' => 'Action'
        ]);

        DB::table('genres')->insert([
            'genre' => 'Adventure'
        ]);

        DB::table('genres')->insert([
            'genre' => 'Comedy'
        ]);

        DB::table('genres')->insert([
            'genre' => 'Drama'
        ]);

        DB::table('genres')->insert([
            'genre' => 'Ecchi'
        ]);

        DB::table('genres')->insert([
            'genre' => 'Fantasy'
        ]);

        DB::table('genres')->insert([
            'genre' => 'Game'
        ]);

        DB::table('genres')->insert([
            'genre' => 'Harem'
        ]);

        DB::table('genres')->insert([
            'genre' => 'Historical'
        ]);

        DB::table('genres')->insert([
            'genre' => 'Horror'
        ]);

        DB::table('genres')->insert([
            'genre' => 'Isekai'
        ]);

        DB::table('genres')->insert([
            'genre' => 'Josei'
        ]);

        DB::table('genres')->insert([
            'genre' => 'Magic'
        ]);

        DB::table('genres')->insert([
            'genre' => 'Martial-Arts'
        ]);

        DB::table('genres')->insert([
            'genre' => 'Mystery'
        ]);

        DB::table('genres')->insert([
            'genre' => 'Romance'
        ]);

        DB::table('genres')->insert([
            'genre' => 'School'
        ]);

        DB::table('genres')->insert([
            'genre' => 'School-Life'
        ]);

        DB::table('genres')->insert([
            'genre' => 'Sci-fi'
        ]);

        DB::table('genres')->insert([
            'genre' => 'Seinen'
        ]);

        DB::table('genres')->insert([
            'genre' => 'Shoujo'
        ]);

        DB::table('genres')->insert([
            'genre' => 'Shoujo-Ai'
        ]);

        DB::table('genres')->insert([
            'genre' => 'Shounen'
        ]);

        DB::table('genres')->insert([
            'genre' => 'Slice-of-Life'
        ]);

        DB::table('genres')->insert([
            'genre' => 'Sports'
        ]);
    }
}
