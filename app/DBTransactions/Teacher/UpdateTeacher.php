<?php

namespace App\DBTransactions\Teacher;

use App\Classes\DBTransaction;
use App\Models\Teacher;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Config;

class UpdateTeacher extends DBTransaction
{
    private $id;
    private $request;

    public function __construct($id, $request)
    {
        $this->id = $id;
        $this->request = $request;
    }

    public function process()
    {
        $id = $this->id;
        $request = $this->request;

        // Update the class data
        $update = Teacher::where('id', $id)->update([
            'school_id' => $request['school_id'],
            'class_id' => $request['class_id'],
            'name' => $request['name'],
            'age' => $request['age'],
            'address' => $request['address'],
            'gender' => $request['gender']
        ]);
        if (!$update) {
            return ['status' => false, 'error' => 'Failed'];
        }

        return ['status' => true, 'error' => ''];
    }
}
