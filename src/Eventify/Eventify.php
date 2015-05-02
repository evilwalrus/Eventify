<?php
/**
 * Copyright (c)2015 Andrew Heebner
 *
 * Permission is hereby granted, free of charge, to any person obtaining
 * a copy of this software and associated documentation files (the
 * "Software"), to deal in the Software without restriction, including
 * without limitation the rights to use, copy, modify, merge, publish,
 * distribute, sublicense, and/or sell copies of the Software, and to
 * permit persons to whom the Software is furnished to do so, subject to
 * the following conditions:
 * 
 * The above copyright notice and this permission notice shall be
 * included in all copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
 * EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
 * MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
 * NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE
 * LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION
 * OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION
 * WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */

namespace Eventify;

const VERSION = '1.0';

/**
 * Trait Eventify
 *
 * @author Andrew Heebner <andrew.heebner@gmail.com>
 * @package Eventify
 */
trait Eventify
{

    /**
     * Our event handlers
     * @var array
     */
    static $__events = [];

    /**
     * Trigger the event handler and get a response
     *
     * @param string $event
     * @param array  $args
     *
     * @return mixed|null
     */
    public static function trigger($event, $args = [])
    {
        if (array_key_exists($event, self::$__events)) {
            return call_user_func_array(self::$__events[$event], $args);
        }

        return null;
    }

    /**
     * Bind an event handler to a specified callback method
     *
     * @param string   $event
     * @param callable $callable
     */
    public static function on($event, Callable $callable)
    {
        self::$__events[$event] = $callable;
    }

}