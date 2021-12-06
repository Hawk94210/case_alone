<?php

namespace App\Http\Controllers;

use App\Models\Inote;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $inotes = Inote::all();
        return view('backend.index',compact('inotes'));
    }
}
