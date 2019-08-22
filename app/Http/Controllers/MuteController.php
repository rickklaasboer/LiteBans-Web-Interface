<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MuteController extends Controller
{
    /**
     * Return index of Resource
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $mutes = DB::table('litebans_mutes')->paginate(15);

        return view('mutes.index')
            ->with('mutes', $mutes);
    }

    /**
     * Return ticket of resource
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $mute = DB::table('litebans_mutes')->where('id', '=', $id)->first();

        if (empty($mute)) {
            abort(404);
        }

        $username = uuid_to_username($mute->uuid);

        return view('mutes.show')
            ->with('username', $username)
            ->with('mute', $mute);
    }
}
