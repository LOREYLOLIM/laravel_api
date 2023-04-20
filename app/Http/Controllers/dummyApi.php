<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dummyApi extends Controller
{
    public function getData(){
        return ["name" => "anil", "email" => "emmanuel@gmail.com", "address" => "Nairobi"];
    }
}
