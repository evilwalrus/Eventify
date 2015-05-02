# Eventify

A stupidly-simple event handling trait for PHP.  If you have ideas for keeping this simple, but extending the usefulness of this project, please fork and send pull requests.

It would be interesting to me to see how elegant this solution can get, and the options that could be added.

## Usage

Either you can use the supplied autoloader (which would be stupid for a library this small), or you can simple drop the Eventify.php file into your own autoloaded path, and
use the following code:

```php
class YourGenericClass {
    use Eventify\Eventify;

    public function myGenericFunction() {
        $this->on('foo', function() {
	    echo 'OMG!';
	});

	...
    }

    public function anotherGenericFunction() {
        $this->trigger('foo');

	...
    }
```

That's it!  Eventify includes two new methods into your class structure, `on` and `trigger`.  Please see the `example.php` file for usage information.
