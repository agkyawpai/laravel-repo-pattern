<?php

namespace App\DBTransactions\ClassTest;

use App\Classes\DBTransaction;
use App\Models\Classes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Config;

class UpdateClass extends DBTransaction
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
        $update = Classes::where('id', $id)->update(['school_id' => $request['school_id'], 'class_name' => $request['name']]);
        if (!$update) {
            return ['status' => false, 'error' => 'Failed'];
        }

        return ['status' => true, 'error' => ''];
    }
}
