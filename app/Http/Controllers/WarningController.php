<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WarningController extends Controller
{
    /**
     * Return index of Resource
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('warnings.index');
    }

    /**
     * Return ticket of resource
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        return view('warnings.show');
    }
}
