<?php

/**
 * Gets the value of an environment variable.
 *
 * @param string $name The value name
 *
 * @return mixed
 */
if (!function_exists('env')) {
    function env($name)
    {
        return Env::get($name);
    }
}