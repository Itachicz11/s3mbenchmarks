<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Library\Callrail;

use App\Http\Controllers\Controller;

class CallrailController extends Controller
{


    public function users_companies()
    {

        $callrail = new Callrail();

        $user_data = $callrail->users();
        $data = [];

        foreach ($user_data as $index => $user) {
            $data[] = [$user->first_name, count($user->companies)];
        }

        return json_encode($data);

    }
}
