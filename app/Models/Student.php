<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    /** @use HasFactory<\Database\Factories\StudentFactory> */
    use HasFactory;

    protected $fillable = [
        'student_number',
        'first_name',
        'middle_name',
        'last_name',
        'gender',
        'date_of_birth',
        'contact_number',
        'year_section',
        'address',
        'email',
        'course_id',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($student) {
            $latest = Student::latest()->first();
            $year = date('Y');
            $number = $latest ? $latest->id + 1 : 1;
            $student->student_number = $year . '-' . str_pad($number, 5, '0', STR_PAD_LEFT);
        });
    }

    public function course()
        {
            return $this->belongsTo(Course::class);
        }

        public function subjects()
        {
            return $this->belongsToMany(Subject::class, 'student_subjects');
        }

}
