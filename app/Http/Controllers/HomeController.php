<?php

namespace App\Http\Controllers;

use App\Model\Group;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }
}
