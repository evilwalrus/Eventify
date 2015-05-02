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

require_once 'autoloader.php';

class Foo
{

    use \Eventify\Eventify;

    public function __construct()
    {
        /**
         * Bindings
         */
        $this->on('test', [$this, '_callable']);
        $this->on('test2', function() {
            echo 'Closures work too!' . PHP_EOL;
        });

        $this->on('test3', function() {
            echo 'Argument test: ' . join(', ', func_get_args()) . PHP_EOL;
        });

        /**
         * Triggers
         */
        $this->trigger('test');
        $this->trigger('test2');

        // test with arguments
        $this->trigger('test3', ['foo', 'bar', 'baz']);
    }

    private function _callable()
    {
        echo 'Inline class callables work.' . PHP_EOL;
    }
}

$foo = new Foo();