<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewProductController extends Controller
{
    public function index() {
        if (auth()->user()->name !== 'Oybek') {
            return abort('404');
        }

        return view('app');
    }
}
