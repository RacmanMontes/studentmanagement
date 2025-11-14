<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectSeeder extends Seeder
{
    public function run(): void
    {
        $subjects = [
          

            // BS PSY - course_id 5
            ['subject_code' => 'PSY101', 'subject_name' => 'Introduction to Psychology', 'units' => 3, 'course_id' => 5],
            ['subject_code' => 'PSY102', 'subject_name' => 'General Psychology', 'units' => 3, 'course_id' => 5],
            ['subject_code' => 'PSY103', 'subject_name' => 'Developmental Psychology', 'units' => 3, 'course_id' => 5],
            ['subject_code' => 'PSY104', 'subject_name' => 'Abnormal Psychology', 'units' => 3, 'course_id' => 5],
            ['subject_code' => 'PSY105', 'subject_name' => 'Psychological Statistics', 'units' => 3, 'course_id' => 5],
            ['subject_code' => 'PSY201', 'subject_name' => 'Social Psychology', 'units' => 3, 'course_id' => 5],
            ['subject_code' => 'PSY202', 'subject_name' => 'Cognitive Psychology', 'units' => 3, 'course_id' => 5],
            ['subject_code' => 'PSY203', 'subject_name' => 'Personality Theories', 'units' => 3, 'course_id' => 5],
            ['subject_code' => 'PSY204', 'subject_name' => 'Learning and Behavior', 'units' => 3, 'course_id' => 5],
            ['subject_code' => 'PSY205', 'subject_name' => 'Research Methods in Psychology', 'units' => 3, 'course_id' => 5],
            ['subject_code' => 'PSY301', 'subject_name' => 'Biological Psychology', 'units' => 3, 'course_id' => 5],
            ['subject_code' => 'PSY302', 'subject_name' => 'Psychological Assessment', 'units' => 3, 'course_id' => 5],
            ['subject_code' => 'PSY303', 'subject_name' => 'Counseling and Guidance', 'units' => 3, 'course_id' => 5],
            ['subject_code' => 'PSY304', 'subject_name' => 'Industrial-Organizational Psychology', 'units' => 3, 'course_id' => 5],
            ['subject_code' => 'PSY305', 'subject_name' => 'Capstone Project / Practicum', 'units' => 3, 'course_id' => 5],

            // BAP - course_id 6
            ['subject_code' => 'BAP101', 'subject_name' => 'Introduction to Public Administration', 'units' => 3, 'course_id' => 6],
            ['subject_code' => 'BAP102', 'subject_name' => 'Political Science I', 'units' => 3, 'course_id' => 6],
            ['subject_code' => 'BAP103', 'subject_name' => 'Philippine Government & Constitution', 'units' => 3, 'course_id' => 6],
            ['subject_code' => 'BAP104', 'subject_name' => 'Organizational Behavior', 'units' => 3, 'course_id' => 6],
            ['subject_code' => 'BAP105', 'subject_name' => 'Ethics in Public Administration', 'units' => 3, 'course_id' => 6],
            ['subject_code' => 'BAP201', 'subject_name' => 'Public Policy and Governance', 'units' => 3, 'course_id' => 6],
            ['subject_code' => 'BAP202', 'subject_name' => 'Research Methods in Public Administration', 'units' => 3, 'course_id' => 6],
            ['subject_code' => 'BAP203', 'subject_name' => 'Local Government Administration', 'units' => 3, 'course_id' => 6],
            ['subject_code' => 'BAP204', 'subject_name' => 'Human Resource Management in Public Sector', 'units' => 3, 'course_id' => 6],
            ['subject_code' => 'BAP205', 'subject_name' => 'Leadership and Management', 'units' => 3, 'course_id' => 6],
            ['subject_code' => 'BAP301', 'subject_name' => 'Strategic Planning and Project Management', 'units' => 3, 'course_id' => 6],
            ['subject_code' => 'BAP302', 'subject_name' => 'Public Financial Management', 'units' => 3, 'course_id' => 6],
            ['subject_code' => 'BAP303', 'subject_name' => 'Administrative Law', 'units' => 3, 'course_id' => 6],
            ['subject_code' => 'BAP304', 'subject_name' => 'Comparative Politics', 'units' => 3, 'course_id' => 6],
            ['subject_code' => 'BAP305', 'subject_name' => 'Capstone Project / Internship', 'units' => 3, 'course_id' => 6],

             ['subject_code' => 'BAEL101', 'subject_name' => 'Introduction to English Studies', 'units' => 3, 'course_id' => 7],
            ['subject_code' => 'BAEL102', 'subject_name' => 'Philippine Literature', 'units' => 3, 'course_id' => 7],
            ['subject_code' => 'BAEL103', 'subject_name' => 'World Literature', 'units' => 3, 'course_id' => 7],
            ['subject_code' => 'BAEL104', 'subject_name' => 'Grammar and Syntax', 'units' => 3, 'course_id' => 7],
            ['subject_code' => 'BAEL105', 'subject_name' => 'Academic Writing', 'units' => 3, 'course_id' => 7],
            ['subject_code' => 'BAEL201', 'subject_name' => 'Creative Writing', 'units' => 3, 'course_id' => 7],
            ['subject_code' => 'BAEL202', 'subject_name' => 'Linguistics I', 'units' => 3, 'course_id' => 7],
            ['subject_code' => 'BAEL203', 'subject_name' => 'Speech and Oral Communication', 'units' => 3, 'course_id' => 7],
            ['subject_code' => 'BAEL204', 'subject_name' => 'Literary Criticism', 'units' => 3, 'course_id' => 7],
            ['subject_code' => 'BAEL205', 'subject_name' => 'Research Methods in English', 'units' => 3, 'course_id' => 7],
            ['subject_code' => 'BAEL301', 'subject_name' => 'Literature in English', 'units' => 3, 'course_id' => 7],
            ['subject_code' => 'BAEL302', 'subject_name' => 'Linguistics II', 'units' => 3, 'course_id' => 7],
            ['subject_code' => 'BAEL303', 'subject_name' => 'Drama and Theater', 'units' => 3, 'course_id' => 7],
            ['subject_code' => 'BAEL304', 'subject_name' => 'Contemporary Literature', 'units' => 3, 'course_id' => 7],
            ['subject_code' => 'BAEL305', 'subject_name' => 'Capstone / Thesis', 'units' => 3, 'course_id' => 7],

             ['subject_code' => 'BASS101', 'subject_name' => 'Introduction to Social Science', 'units' => 3, 'course_id' => 8],
            ['subject_code' => 'BASS102', 'subject_name' => 'Philippine Society', 'units' => 3, 'course_id' => 8],
            ['subject_code' => 'BASS103', 'subject_name' => 'Sociology Fundamentals', 'units' => 3, 'course_id' => 8],
            ['subject_code' => 'BASS104', 'subject_name' => 'Philippine Politics', 'units' => 3, 'course_id' => 8],
            ['subject_code' => 'BASS105', 'subject_name' => 'Research Methods in Social Science', 'units' => 3, 'course_id' => 8],
            ['subject_code' => 'BASS201', 'subject_name' => 'Anthropology', 'units' => 3, 'course_id' => 8],
            ['subject_code' => 'BASS202', 'subject_name' => 'Social Statistics', 'units' => 3, 'course_id' => 8],
            ['subject_code' => 'BASS203', 'subject_name' => 'Social Psychology', 'units' => 3, 'course_id' => 8],
            ['subject_code' => 'BASS204', 'subject_name' => 'Community Development', 'units' => 3, 'course_id' => 8],
            ['subject_code' => 'BASS205', 'subject_name' => 'Ethics and Governance', 'units' => 3, 'course_id' => 8],
            ['subject_code' => 'BASS301', 'subject_name' => 'Comparative Politics', 'units' => 3, 'course_id' => 8],
            ['subject_code' => 'BASS302', 'subject_name' => 'Public Policy Analysis', 'units' => 3, 'course_id' => 8],
            ['subject_code' => 'BASS303', 'subject_name' => 'Environmental Sociology', 'units' => 3, 'course_id' => 8],
            ['subject_code' => 'BASS304', 'subject_name' => 'Capstone Project / Practicum', 'units' => 3, 'course_id' => 8],
            ['subject_code' => 'BASS305', 'subject_name' => 'Seminar in Social Research', 'units' => 3, 'course_id' => 8],

             ['subject_code' => 'BSED101', 'subject_name' => 'Educational Foundations', 'units' => 3, 'course_id' => 9],
            ['subject_code' => 'BSED102', 'subject_name' => 'Child and Adolescent Development', 'units' => 3, 'course_id' => 9],
            ['subject_code' => 'BSED103', 'subject_name' => 'Educational Psychology', 'units' => 3, 'course_id' => 9],
            ['subject_code' => 'BSED104', 'subject_name' => 'Curriculum Development', 'units' => 3, 'course_id' => 9],
            ['subject_code' => 'BSED105', 'subject_name' => 'Principles of Teaching', 'units' => 3, 'course_id' => 9],
            ['subject_code' => 'BSED201', 'subject_name' => 'Assessment and Evaluation', 'units' => 3, 'course_id' => 9],
            ['subject_code' => 'BSED202', 'subject_name' => 'Classroom Management', 'units' => 3, 'course_id' => 9],
            ['subject_code' => 'BSED203', 'subject_name' => 'Educational Technology', 'units' => 3, 'course_id' => 9],
            ['subject_code' => 'BSED204', 'subject_name' => 'Special Education', 'units' => 3, 'course_id' => 9],
            ['subject_code' => 'BSED205', 'subject_name' => 'Subject Teaching Methods I', 'units' => 3, 'course_id' => 9],
            ['subject_code' => 'BSED301', 'subject_name' => 'Subject Teaching Methods II', 'units' => 3, 'course_id' => 9],
            ['subject_code' => 'BSED302', 'subject_name' => 'Research in Education', 'units' => 3, 'course_id' => 9],
            ['subject_code' => 'BSED303', 'subject_name' => 'Internship / Practicum', 'units' => 6, 'course_id' => 9],
            ['subject_code' => 'BSED304', 'subject_name' => 'Guidance and Counseling', 'units' => 3, 'course_id' => 9],
            ['subject_code' => 'BSED305', 'subject_name' => 'Capstone Project / Seminar', 'units' => 3, 'course_id' => 9],

             ['subject_code' => 'BEED101', 'subject_name' => 'Foundations of Education', 'units' => 3, 'course_id' => 10],
            ['subject_code' => 'BEED102', 'subject_name' => 'Child and Adolescent Development', 'units' => 3, 'course_id' => 10],
            ['subject_code' => 'BEED103', 'subject_name' => 'Educational Psychology', 'units' => 3, 'course_id' => 10],
            ['subject_code' => 'BEED104', 'subject_name' => 'Principles of Teaching', 'units' => 3, 'course_id' => 10],
            ['subject_code' => 'BEED105', 'subject_name' => 'Curriculum Development', 'units' => 3, 'course_id' => 10],
            ['subject_code' => 'BEED201', 'subject_name' => 'Assessment and Evaluation', 'units' => 3, 'course_id' => 10],
            ['subject_code' => 'BEED202', 'subject_name' => 'Classroom Management', 'units' => 3, 'course_id' => 10],
            ['subject_code' => 'BEED203', 'subject_name' => 'Educational Technology', 'units' => 3, 'course_id' => 10],
            ['subject_code' => 'BEED204', 'subject_name' => 'Special Education', 'units' => 3, 'course_id' => 10],
            ['subject_code' => 'BEED205', 'subject_name' => 'Language Teaching Methods', 'units' => 3, 'course_id' => 10],
            ['subject_code' => 'BEED301', 'subject_name' => 'Mathematics Teaching Methods', 'units' => 3, 'course_id' => 10],
            ['subject_code' => 'BEED302', 'subject_name' => 'Science Teaching Methods', 'units' => 3, 'course_id' => 10],
            ['subject_code' => 'BEED303', 'subject_name' => 'Social Studies Teaching Methods', 'units' => 3, 'course_id' => 10],
            ['subject_code' => 'BEED304', 'subject_name' => 'Internship / Practicum', 'units' => 6, 'course_id' => 10],
            ['subject_code' => 'BEED305', 'subject_name' => 'Capstone Project / Seminar', 'units' => 3, 'course_id' => 10],

                    ['subject_code' => 'ENT101', 'subject_name' => 'Principles of Entrepreneurship', 'units' => 3, 'course_id' => 11],
            ['subject_code' => 'ENT102', 'subject_name' => 'Business Communication', 'units' => 3, 'course_id' => 11],
            ['subject_code' => 'ENT103', 'subject_name' => 'Financial Accounting I', 'units' => 3, 'course_id' => 11],
            ['subject_code' => 'ENT104', 'subject_name' => 'Marketing Management', 'units' => 3, 'course_id' => 11],
            ['subject_code' => 'ENT105', 'subject_name' => 'Business Ethics', 'units' => 3, 'course_id' => 11],
            ['subject_code' => 'ENT201', 'subject_name' => 'Managerial Accounting', 'units' => 3, 'course_id' => 11],
            ['subject_code' => 'ENT202', 'subject_name' => 'Operations Management', 'units' => 3, 'course_id' => 11],
            ['subject_code' => 'ENT203', 'subject_name' => 'Human Resource Management', 'units' => 3, 'course_id' => 11],
            ['subject_code' => 'ENT204', 'subject_name' => 'Business Law', 'units' => 3, 'course_id' => 11],
            ['subject_code' => 'ENT205', 'subject_name' => 'E-Commerce & Digital Entrepreneurship', 'units' => 3, 'course_id' => 11],
            ['subject_code' => 'ENT301', 'subject_name' => 'Strategic Management', 'units' => 3, 'course_id' => 11],
            ['subject_code' => 'ENT302', 'subject_name' => 'Corporate Finance', 'units' => 3, 'course_id' => 11],
            ['subject_code' => 'ENT303', 'subject_name' => 'Innovation and Product Development', 'units' => 3, 'course_id' => 11],
            ['subject_code' => 'ENT304', 'subject_name' => 'Capstone Project / Business Plan', 'units' => 3, 'course_id' => 11],
            ['subject_code' => 'ENT305', 'subject_name' => 'Entrepreneurship Seminar', 'units' => 3, 'course_id' => 11],

        ];


        DB::table('subjects')->insert($subjects);
    }
}
