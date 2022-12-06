<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserSalesController extends Controller
{
    public function index($id)
    {
        return view('users.sales.sales', [
            'user' => User::findOrFail($id)
        ]);
    }
}
