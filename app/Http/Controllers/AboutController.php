<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $teamMembers = User::visibleTeam()->get();
        return view('pages.company.about', compact('teamMembers'));
    }
}
