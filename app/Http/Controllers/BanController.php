<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BanController extends Controller
{
    /**
     * Return index of Resource
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('bans.index');
    }

    /**
     * Return ticket of resource
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $ban = DB::table('litebans_bans')->where('id', '=', $id)->first();

        $username = uuid_to_username($ban->uuid);

        return view('bans.show')->with('ban', $ban)->with('username', $username);
    }
}
