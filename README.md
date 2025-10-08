# PHP Code Standards for robole 
                    
This packages helps to check and fix your php project files. It installs the required packages and provides 
config files with the needed settings for [robole](https://robole.de).

These packages are beeing used:

- [PHP CS Fixer](https://github.com/PHP-CS-Fixer/PHP-CS-Fixer)
- [PHPStan](https://phpstan.org/)
- [Rector](https://github.com/rectorphp/rector)
- [Twigcs](https://github.com/friendsoftwig/twigcs)

## Supported PHP Versions

- PHP 8.4+

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
grumphp.yml
tests/phpstan
```
               
Copy the [Taskfile.cs.yaml](./Taskfile.cs.yaml) to your project.
                                                       
Add these lines to your `Taskfile.dist.yaml`:

```yaml
includes:
    cs: "./Taskfile.cs.yaml"
```

Add the task `cs:setup` to your main `setup` task in your `Taskfile.dist.yaml`.

Example:

```yaml
tasks:
    setup:
        desc: "Setup project"
        cmds:
            -   task: setup-proxy
            -   task: setup-backend
            -   task: setup-entities
            -   task: setup-frontend
            -   task: setup-security
            -   task: cs:setup
```

