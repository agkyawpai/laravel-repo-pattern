<?php

namespace App\DBTransactions\School;

use App\Classes\DBTransaction;
use App\Models\School;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Config;

class UpdateSchool extends DBTransaction
{
    private $id;
    private $request;

    public function __construct($request, $id)
    {
        $this->id = $id;
        $this->request = $request;
    }

    public function process()
    {
        $id = $this->id;
        $request = $this->request;

        // Update the class data
        $update = School::where('id', $id)->update(['school_name' => $request['name'], 'school_address' => $request['address']]);
        if (!$update) {
            return ['status' => false, 'error' => 'Failed'];
        }

        return ['status' => true, 'error' => ''];
    }
    }
