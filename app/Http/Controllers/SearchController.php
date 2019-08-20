<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $uuid = username_to_uuid($request->username);

        if (!empty($uuid)) {
            return redirect("/history/{$uuid}");
        }

        return redirect(route('home'))->with('error', "{$request->username} has not joined our server!");
    }
}
