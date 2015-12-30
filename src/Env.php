<?php

class Env
{
    const CONVERT_BOOL = 1;
    const CONVERT_NULL = 2;
    const CONVERT_INT = 4;
    const STRIP_QUOTES = 8;

    public static $options = 15;   //All flags enabled
    public static $default = null; //Default value if not exists

    /**
     * Include the global env() function.
     */
    public static function init()
    {
        include_once __DIR__.'/env_function.php';
    }

    /**
     * Returns an environment variable.
     * 
     * @param string   $name
     * @param int|null $options
     */
    public static function get($name, $options = null)
    {
        $value = getenv($name);

        if ($value === false) {
            return self::$default;
        }

        return self::convert($value, $options);
    }

    /**
     * Converts the type of values like "true", "false", "null" or "123".
     *
     * @param string   $value
     * @param int|null $options
     *
     * @return mixed
     */
    public static function convert($value, $options = null)
    {
        if ($options === null) {
            $options = self::$options;
        }

        switch (strtolower($value)) {
            case 'true':
                return ($options & self::CONVERT_BOOL) ? true : $value;

            case 'false':
                return ($options & self::CONVERT_BOOL) ? false : $value;

            case 'null':
                return ($options & self::CONVERT_NULL) ? null : $value;
        }

        if (($options & self::CONVERT_INT) && ctype_digit($value)) {
            return (int) $value;
        }

        if ($options & self::STRIP_QUOTES) {
            if ($value[0] === '"' && substr($value, -1) === '"') {
                return substr($value, 1, -1);
            }

            if ($value[0] === "'" && substr($value, -1) === "'") {
                return substr($value, 1, -1);
            }
        }

        return $value;
    }
}
