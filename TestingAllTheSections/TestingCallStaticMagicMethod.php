<?php

class Str
{
    private static array $methods = [
        'upper' => 'strtoupper',
        'lower' => 'strtolower',
        'len' => 'strlen'
    ];

    /**
     * @throws Exception
     */
    public static function __callStatic(string $method, array $parameters)
    {
        if (!array_key_exists($method, self::$methods)) {
            throw new Exception('The ' . $method . 'is not supported');
        }

        return call_user_func_array(self::$methods[$method], $parameters);
    }
}

echo Str::lower('Hello') . PHP_EOL;
echo Str::upper('Hello') . PHP_EOL;
echo Str::len('Hello') . PHP_EOL;
