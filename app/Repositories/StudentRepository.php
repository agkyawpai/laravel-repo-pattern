<?php

namespace App\Repositories;

use App\Traits\ResponseAPI;
use App\Interfaces\StudentInterface;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class StudentRepository implements StudentInterface
{
    // Use ResponseAPI Trait in this repository
    use ResponseAPI;

    public function getAllStudents()
    {
        return $students = Student::all()->toArray();
    }

    public function getStudentById($id)
    {
        return $student = Student::find($id);
    }

    public function deleteStudentById($id)
    {
        return Student::destroy($id);
    }

    public function showStudentDetail($id)
    {
        $studentDetail = Student::join('schools', 'students.school_id', '=', 'schools.id')
        ->join('classes', 'students.class_id', '=', 'classes.id')
        ->where('students.id', $id)
        ->select('students.*', 'schools.school_name', 'classes.class_name')
        ->get();
        return $studentDetail;
    }
}
