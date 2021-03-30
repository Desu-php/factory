<?php

namespace App\Http\Controllers;

use App\Factory\RequestStorage;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function index()
    {
        dd(round(4.4, 0));
//        $requestStorage = new RequestStorage('FILE');
//        $requestStorage->save('FILE', 'jabor', '900006930');
//
//        $requestStorage = new RequestStorage('DB');
//        $requestStorage->save('DB', '900006930', 'the best storage in the world');
        return view('welcome');
    }
}
