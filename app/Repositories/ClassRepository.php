<?php

namespace App\Repositories;

use App\Traits\ResponseAPI;
use App\Interfaces\ClassInterface;
use App\Models\Classes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class ClassRepository implements ClassInterface
{
    // Use ResponseAPI Trait in this repository
    use ResponseAPI;

    public function getAllClasses()
    {
        return $classes = Classes::all()->toArray();
    }

    public function getClassesById($id)
    {
        return $class = Classes::find($id);
    }
    public function deleteClassById($id)
    {
        return Classes::destroy($id);
    }
}
