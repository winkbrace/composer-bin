# Composer bin example

Example project to show how you can test bridges to libraries that have conflicting dependencies.

It uses the composer plugins `composer-bin-plugin` and `composer-inheritance-plugin` (which wraps `composer-merge-plugin`).

## The problem

What if I want to support both Laravel 4 and 5 with my library? They definitely have conflicting dependencies.

I've created a simple Message object with a bridge to Laravel 4 Console and Laravel 5 Console.

## The solution

```
composer require --dev bamarni/composer-bin-plugin
composer bin laravel5 require --dev illuminate/console "^5.0"
composer bin laravel4 require --dev illuminate/console "^4.0"
```

Now we have created this directory structure:

```
vendor-bin/
	laravel4/
		vendor/
		composer.json
		composer.lock
	laravel5/
		vendor/
		composer.json
		composer.lock
```

These new composer.json files contain only:
```json
{
    "require-dev": {
        "illuminate/console": "^4.0"
    }
}
```

Now to avoid having to copy all other dependencies from the main composer.json to these sub composer.json files,
we add `"theofidry/composer-inheritance-plugin": "^1.0"` to the require-dev of the sub jons. This will merge the main
json file with the sub json file when composer runs.

Then run composer update on the sub directories.
```
composer bin laravel4 update
composer bin laravel5 update
```

## git

Don't forget to add the new vendor directories to .gitignore

```
/vendor
/vendor-bin/*/vendor
```

## Running the unit tests

We have to create a main phpunit file and a separate phpunit file for each bridge.
In the main file we exclude the `tests/Bridge` directory.
In the sub phpunit file we set the autoload to `vendor-bin/laravel4/vendor/autoload.php` and test suite to:
```xml
	<testsuites>
		<testsuite name="Laravel 4 bridge tests">
			<directory>tests/Bridge/Laravel4</directory>
		</testsuite>
	</testsuites>
``` 

now we can run the unit tests and they will use the right dependencies.
```
phpunit
phpunit -c phpunit-laravel4.xml
phpunit -c phpunit-laravel5.xml
```
