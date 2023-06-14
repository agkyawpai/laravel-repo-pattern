<?php

namespace App\Repositories;

use App\Traits\ResponseAPI;
use App\Interfaces\TeacherInterface;
use App\Models\Teacher;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class TeacherRepository implements TeacherInterface
{
    // Use ResponseAPI Trait in this repository
    use ResponseAPI;

    public function getAllTeachers()
    {
        return $teachers = Teacher::all()->toArray();
    }

    public function getTeachersById($id)
    {
        return $teacher = Teacher::find($id);
    }

    public function deleteTeacherById($id)
    {
        return Teacher::destroy($id);
    }
}
