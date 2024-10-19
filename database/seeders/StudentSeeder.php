<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('students')->insert([
            ['student_name' => 'John Doe', 'class_teacher_id' => 1, 'class' => '10th', 'admission_date' => '2021-01-01', 'yearly_fees' => 1000],
            // Add more sample data
        ]);
    }
}
