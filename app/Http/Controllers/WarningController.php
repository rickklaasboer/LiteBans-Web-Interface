<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WarningController extends Controller
{
    /**
     * Return index of Resource
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $warnings = DB::table('litebans_warnings')->paginate(15);

        return view('warnings.index')
            ->with('warnings', $warnings);
    }

    /**
     * Return ticket of resource
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $warning = DB::table('litebans_warnings')->where('id', '=', $id)->first();

        if (empty($warning)) {
            abort(404);
        }

        $username = uuid_to_username($warning->uuid);

        return view('warnings.show')
            ->with('warning', $warning)
            ->with('username', $username);
    }
}
