<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;

class AProposController extends Controller
{
    public function index()
    {
        return view('site.a-propos');
    }
}
