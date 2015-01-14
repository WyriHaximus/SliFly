SliFly
======

[Flysystem](http://flysystem.thephpleague.com/) service provider for [Silex](http://silex.sensiolabs.org/).

## Installation ##

To install via [Composer](http://getcomposer.org/), use the command below, it will automatically detect the latest version and bind it with `~`.

```
composer require wyrihaximus/sli-fly 
```

## Usage ##

Adapters have to be setup as an associative array where the key defines the alias to be used later in the application. The value array contains two indexes. One `adapter` holding the fully namespaced adapter class name, and `args` for all the arguments pass into adapter. 

```php
$app->register(new WyriHaximus\SliFly\FlysystemServiceProvider(), [
    'flysystem.filesystems' => [
        'local__DIR__' => [
            'adapter' => 'League\Flysystem\Adapter\Local',
            'args' => [
                __DIR__,
            ],
        ],
    ],
]);
```

Defined aliases can be accessed as demonstrated below:

```php
var_export($app['flysystems']['local__DIR__']->listContents());
```

## License ##

Copyright 2014 [Cees-Jan Kiewiet](http://wyrihaximus.net/)

Permission is hereby granted, free of charge, to any person
obtaining a copy of this software and associated documentation
files (the "Software"), to deal in the Software without
restriction, including without limitation the rights to use,
copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the
Software is furnished to do so, subject to the following
conditions:

The above copyright notice and this permission notice shall be
included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES
OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT
HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR
OTHER DEALINGS IN THE SOFTWARE.
