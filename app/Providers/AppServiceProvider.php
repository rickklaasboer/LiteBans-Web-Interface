<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $bans = DB::table('litebans_bans')->get()->sortByDesc('time');
        $kicks = DB::table('litebans_kicks')->get()->sortByDesc('time');
        $warnings = DB::table('litebans_warnings')->get()->sortByDesc('time');
        $mutes = DB::table('litebans_mutes')->get()->sortByDesc('time');

        View::share([
            'bans' => $bans,
            'kicks' => $kicks,
            'warnings' => $warnings,
            'mutes' => $mutes
        ]);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
