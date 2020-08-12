<?php

namespace App\Http\Controllers;

class ErrorController extends Controller
{
    public function notFound()
    {
        return view('erros.404');
    }

    public function internalError()
    {
        return view('erros.500');
    }
}
