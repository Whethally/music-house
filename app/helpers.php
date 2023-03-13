<?php

use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Route as FacadesRoute;

if (! function_exists('active_link')) {
    function active_link(string $name, string $active = 'active'): string {
        return FacadesRoute::is($name) ? $active : '';
    }
}

if (! function_exists('alert')) {
    function alert(string $message, string $type = 'success'):void {
        session()->flash('flash.message', $message);
        session()->flash('flash.type', $type);
    }
}