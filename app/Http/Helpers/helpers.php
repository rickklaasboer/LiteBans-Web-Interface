<?php

if (!function_exists('uuid_to_username')) {
    function uuid_to_username($uuid) {
        try {
            return DB::table('litebans_history')->where('uuid', '=', $uuid)->first()->name;
        } catch (Exception $e) {
            return false;
        }
    }
}

if (!function_exists('username_to_uuid')) {
    function username_to_uuid($name) {
        try {
            return DB::table('litebans_history')->where('name', '=', $name)->first()->uuid;
        } catch (Exception $e) {
            return false;
        }
    }
}

if (!function_exists('minify_uuid')) {
    function minify_uuid($uuid)
    {
        if (is_string($uuid)) {
            $minified = str_replace('-', '', $uuid);
            if (strlen($minified) === 32) {
                return $minified;
            }
        }
        return false;
    }
}

if (!function_exists('mill_to_date')) {
    function mill_to_date($milliseconds)
    {
        if ($milliseconds !== -1) {
            $seconds = $milliseconds / 1000;
            return date("d-m-Y \\a\\t H:s", $seconds);
        }
        return 'Permanent';
    }
}