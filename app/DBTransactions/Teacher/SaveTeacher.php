<?php

namespace App\DBTransactions\Teacher;

use App\Classes\DBTransaction;
use App\Models\Teacher;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Config;

/**
 *
 *
 * @author
 * @create
 */
class SaveTeacher extends DBTransaction
{
    private $request;
    public function __construct($request)
    {
        $this->request = $request;
    }
    public function process()
    {
        $request = $this->request;
        $teacher = new Teacher;
        //get data from request
        $teacher->school_id = $request['school_id'];
        $teacher->class_id = $request['class_id'];
        $teacher->name = $request['name'];
        $teacher->age = $request['age'];
        $teacher->address = $request['address'];
        $teacher->gender = $request['gender'];
        // Save the teacher
        $teacher->save();
        if (!$teacher) {
            return ['status' => false, 'error' => 'Failed'];
        }

        return ['status' => true, 'error' => ''];
    }
}
