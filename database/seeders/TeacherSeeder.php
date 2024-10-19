<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    DB::table('teachers')->insert([
        ['teacher_name' => 'Mr. Smith'],
        ['teacher_name' => 'Ms. Johnson'],
        ['teacher_name' => 'Mrs. Brown'],
    ]);
}
}
