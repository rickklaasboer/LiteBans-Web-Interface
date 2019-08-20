<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HistoryController extends Controller
{
    public function show($uuid)
    {
        $bans = DB::table('litebans_bans')->where('uuid', '=', $uuid)->get()->sortByDesc('time');
        $kicks = DB::table('litebans_kicks')->where('uuid', '=', $uuid)->get()->sortByDesc('time');
        $warnings = DB::table('litebans_warnings')->where('uuid', '=', $uuid)->get()->sortByDesc('time');
        $mutes = DB::table('litebans_mutes')->where('uuid', '=', $uuid)->get()->sortByDesc('time');

        return view('history.show')
            ->with([
                'uuid' => $uuid,
                'bans' => $bans,
                'kicks' => $kicks,
                'warnings' => $warnings,
                'mutes' => $mutes
            ]);
    }
}
