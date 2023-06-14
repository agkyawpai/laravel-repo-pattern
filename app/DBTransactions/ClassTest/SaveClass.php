<?php

namespace App\DBTransactions\ClassTest;

use App\Classes\DBTransaction;
use App\Models\Classes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Config;

class SaveClass extends DBTransaction
{
    private $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function process()
    {
        $request = $this->request;
        $class = new Classes;

        // Get data from the request
        $class->school_id = $request['school_id'];
        $class->class_name = $request['name'];

        // Save the class
        $class->save();

        if (!$class) {
            return ['status' => false, 'error' => 'Failed'];
        }

        return ['status' => true, 'error' => ''];
    }
}
