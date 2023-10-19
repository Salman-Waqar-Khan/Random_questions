<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;


class AdminActivityController extends Controller
{


public function index()
{
    // fetch data for the view whic are used by the user
    $users = User::with('questions')->get();

    return view('admin.questions.index', compact('users'));
}

}
