<?php

namespace App\Http\Controllers;

class OrderController extends Controller
{

    public function store()
    {
        return response()->redirectTo('/');
    }
}