<?php

namespace App\Repositories;

use App\Traits\ResponseAPI;
use App\Interfaces\SchoolInterface;
use App\Models\School;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class SchoolRepository implements SchoolInterface
{
    // Use ResponseAPI Trait in this repository
    use ResponseAPI;

    public function getAllSchools()
    {
        return $schools = School::all()->toArray();
    }

    public function getSchoolsById($id)
    {
        return $school = School::find($id);
    }
    public function deleteSchoolById($id)
    {
        return School::destroy($id);
    }
}
