<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function test()
    {
        $users = DB::table('users')->get();
        dd($users);
    }
}
