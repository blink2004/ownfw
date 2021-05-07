<?php

/**
 * Class Console - для работы с CLI
 */
class Console
{
    public static $textColorsList = [
        'default' => "\e[39m",
        'black' => "\e[30m",
        'red' => "\e[31m",
        'green' => "\e[32m",
        'Yellow' => "\e[33m",
        'blue' => "\e[34m",
        'light green' => "\e[92m",
        'light blue' => "\e[94m",
        'white' => "\e[97m",
    ];

    public static $bgColorsList = [
        'default' => "\e[49m",
        'black' => "\e[40m",
        'red' => "\e[41m",
        'green' => "\e[42m",
        'yellow' => "\e[43m",
        'blue' => "\e[44m",
        'white' => "\e[107m",
    ];

    public static function output($message) {
        echo $message;
    }

    public static function outputln($message) {
        self::output($message . "\r\n");
    }

    /**
     * Colored output of text to screen
     *
     * @param $text_color
     * @param $bg_color background color
     * @param $message
     */
    public static function output_c($text_color = 'default', $bg_color = 'default', $message) {
        self::output(
            implode([
                    self::$textColorsList[strtolower($text_color)],
                    self::$bgColorsList[strtolower($bg_color)],
                    $message,
                    self::$textColorsList['default'],
                    self::$bgColorsList['default']
                ]
            )
        );
    }

}
