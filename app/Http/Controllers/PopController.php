<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class PopController extends Controller
{
    public function new()
    {
        return Inertia::render('CreatePop');
    }
}
