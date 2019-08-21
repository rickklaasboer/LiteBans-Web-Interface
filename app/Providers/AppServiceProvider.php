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
        $bans = DB::table('litebans_bans')->get()->count();
        $kicks = DB::table('litebans_kicks')->get()->count();
        $warnings = DB::table('litebans_warnings')->get()->count();
        $mutes = DB::table('litebans_mutes')->get()->count();

        View::share([
            'banscount' => $bans,
            'kickscount' => $kicks,
            'warningscount' => $warnings,
            'mutescount' => $mutes
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
