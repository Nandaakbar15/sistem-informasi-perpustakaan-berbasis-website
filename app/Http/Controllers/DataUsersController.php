<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class DataUsersController extends Controller
{
    public function index_users()
    {
        $user = User::all();

        return view("pages.data-users.indexDataUser", [
            'user' => $user
        ]);
    }
}
