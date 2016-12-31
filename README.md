# Lune\Session
Basic session management

## Installation
Session is available on [Composer](http://getcomposer.org)

```
composer require lune/session
```

## Usage example
```php
//create a new Manager
$sessions = new \Lune\Session\Manager();

//add a value to the session
$sessions->get('my-session')->set('foo', 'bar');

//add multiple values to the session
$sessions->get('my-sesison')->set(['foo2' => 'bar2']);

//retrieve a value from the session
$v = $sessions->get('my-session')->get('foo'); // returns 'bar'

//use a default value if the key does not exist
$v = $sessions->get('my-session')->get('foo3', 'bar3'); // returns 'bar3'

//check if a key is defined in the session
$sessions->get('my-session')->has('foo'); // returns true
//clear a value
$sessions->get('my-session')->remove('foo');

//clear multiple values
$sessions->get('my-session')->remove(['foo', 'foo2']);

//clear all values for a specific session
$sessions->get('my-session')->clear(); 
```

