<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::create([
            'student_name' => 'John Doe',
            'class_teacher_id' => 1, // Ensure this matches an existing teacher ID
            'class' => '10th',
            'admission_date' => '2021-01-01',
            'yearly_fees' => 1000,
        ]);
    }
}
