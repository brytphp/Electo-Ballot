<?php

use Illuminate\Support\Facades\Route;

function isActiveRoute($route, $output = 'mm-active active')
{
    $appended = substr($route, -1);
    $name = substr($route, 0, -2);

    $resources = controllerResources();

    if ($appended == '*') {

        for ($i = 0; $i < count($resources); $i++) {
            if (Route::currentRouteName() == $name.'.'.$resources[$i]) {
                return $output;
            }
        }
    }

    if (Route::currentRouteName() == $route) {
        return $output;
    }

    return '';
}

function controllerResources()
{
    return ['index', 'create', 'edit', 'show', 'search', 'statistics'];
}
