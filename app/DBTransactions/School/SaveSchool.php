<?php

namespace App\DBTransactions\School;

use App\Classes\DBTransaction;
use App\Models\School;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Config;

class SaveSchool extends DBTransaction
{
    private $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function process()
    {
        $request = $this->request;
        $school = new School;

        // Get data from the request
        $school->school_name = $request['name'];
        $school->school_address = $request['address'];

        // Save the school
        $school->save();

        if (!$school) {
            return ['status' => false, 'error' => 'Failed'];
        }

        return ['status' => true, 'error' => ''];
    }
}
