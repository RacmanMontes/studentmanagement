<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bsentrep_subjects = [
    ['subject_code'=>'ENT101', 'subject_name'=>'Principles of Entrepreneurship', 'units'=>3, 'course_id'=>10],
    ['subject_code'=>'ENT102', 'subject_name'=>'Business Communication', 'units'=>3, 'course_id'=>10],
    ['subject_code'=>'ENT103', 'subject_name'=>'Financial Accounting I', 'units'=>3, 'course_id'=>10],
    ['subject_code'=>'ENT104', 'subject_name'=>'Marketing Management', 'units'=>3, 'course_id'=>10],
    ['subject_code'=>'ENT105', 'subject_name'=>'Business Ethics', 'units'=>3, 'course_id'=>10],
    ['subject_code'=>'ENT201', 'subject_name'=>'Managerial Accounting', 'units'=>3, 'course_id'=>10],
    ['subject_code'=>'ENT202', 'subject_name'=>'Operations Management', 'units'=>3, 'course_id'=>10],
    ['subject_code'=>'ENT203', 'subject_name'=>'Human Resource Management', 'units'=>3, 'course_id'=>10],
    ['subject_code'=>'ENT204', 'subject_name'=>'Business Law', 'units'=>3, 'course_id'=>10],
    ['subject_code'=>'ENT205', 'subject_name'=>'E-Commerce & Digital Entrepreneurship', 'units'=>3, 'course_id'=>10],
    ['subject_code'=>'ENT301', 'subject_name'=>'Strategic Management', 'units'=>3, 'course_id'=>10],
    ['subject_code'=>'ENT302', 'subject_name'=>'Corporate Finance', 'units'=>3, 'course_id'=>10],
    ['subject_code'=>'ENT303', 'subject_name'=>'Innovation and Product Development', 'units'=>3, 'course_id'=>10],
    ['subject_code'=>'ENT304', 'subject_name'=>'Capstone Project / Business Plan', 'units'=>3, 'course_id'=>10],
    ['subject_code'=>'ENT305', 'subject_name'=>'Entrepreneurship Seminar', 'units'=>3, 'course_id'=>10],
];

foreach($bsentrep_subjects as $subject) {
    \App\Models\Subject::create($subject);
}

    }
}
