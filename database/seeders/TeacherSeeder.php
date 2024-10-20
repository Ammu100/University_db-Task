<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Teacher::create(['id' => 1, 'teacher_name' => 'Mr. Smith']);
    }
}
