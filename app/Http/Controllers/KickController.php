<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KickController extends Controller
{
    /**
     * Return index of Resource
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $kicks = DB::table('litebans_kicks')->paginate(15);

        return view('kicks.index')
            ->with('kicks', $kicks);
    }

    /**
     * Return ticket of resource
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $kick = DB::table('litebans_kicks')->where('id', '=', $id)->first();

        if (empty($kick)) {
            abort(404);
        }

        $username = uuid_to_username($kick->uuid);

        return view('kicks.show')
            ->with('username', $username)
            ->with('kick', $kick);
    }
}
