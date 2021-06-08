<?php

use Illuminate\Support\Facades\Auth;

if (!function_exists('debug_to_console')) {
    function debug_to_console($data)
    {
        $output = $data;
        if (is_array($output))
            $output = implode(',', $output);

        echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
    }
}
