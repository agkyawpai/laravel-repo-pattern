<?php

namespace App\DBTransactions\Student;

use App\Classes\DBTransaction;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Config;

/**
 *
 *
 * @author
 * @create
 */
class SaveStudent extends DBTransaction
{
    private $request;
    public function __construct($request)
    {
        $this->request = $request;
    }
    public function process()
    {
        $request = $this->request;
        $student = new Student;
        //get data from request
        $student->school_id = $request['school_id'];
        $student->class_id = $request['class_id'];
        $student->name = $request['name'];
        $student->age = $request['age'];
        $student->address = $request['address'];
        $student->gender = $request['gender'];
        // Save the student
        $student->save();
        if (!$student) {
            return ['status' => false, 'error' => 'Failed'];
        }

        return ['status' => true, 'error' => ''];
    }
}
