

# notback

Notback is an front-end framework for PHP. By using function-based components, the framework is easy to learn and use. 
The elements are cleaner, the code is more readable and the framework is very flexible.

The framework is built on top of PHP and creates HTML with CSS styling. It is still possible to use JavaScript also. 

## Installation


To get started, you need to install the framework by composer:


```
composer require notback/framework
```
    

When it's installed, you can use the framework by including the autoloader in your project:

```php
require_once('vendor/autoload.php');
```

You can also extract the framework in the src folder and use it as a standalone framework.


## Usage/Examples

When the framework is installed, you can start using it by creating a new file and including the autoloader (or source files). Then you can create your first "hello word" page like this:

```php
<?php

require 'vendor/autoload.php';

Page(
    "Hello World!"
);
```


## Documentation

[Documentation](https://notback.io/docs)


## Authors

- [@degn](https://www.github.com/degn)

