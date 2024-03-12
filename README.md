# PHP Code Standards for robole 
                    
This packages helps to check and fix your php project files. It installs the required packages and provides 
config files with the needed settings for [robole](https://robole.de).

These packages are beeing used:

- [PHP CS Fixer](https://github.com/PHP-CS-Fixer/PHP-CS-Fixer)
- [PHPStan}(https://phpstan.org/)
- [Rector}(https://github.com/rectorphp/rector)

## Supported PHP Versions

- PHP 8.2
- PHP 8.3

## Installation
                                                 
```
composer require --dev robole/php-cs
```

Copy (or merge/overwrite if already existing) the following config files and directories to your project directory: 

```
.editorconfig
.php-cs-fixer.dist.php
phpstan.dist.neon
rector.php
tests/phpstan
```
              
Copy the build targets from the `Makefile`.

