# laravel-noredirect-traits

Build status:  [![Latest Stable Version](https://poser.pugx.org/thecsea/laravel-noredirect-traits/v/stable)](https://packagist.org/packages/thecsea/laravel-noredirect-traits) [![Total Downloads](https://poser.pugx.org/thecsea/laravel-noredirect-traits/downloads)](https://packagist.org/packages/thecsea/laravel-noredirect-traits) [![Latest Unstable Version](https://poser.pugx.org/thecsea/laravel-noredirect-traits/v/unstable)](https://packagist.org/packages/thecsea/laravel-noredirect-traits) [![License](https://poser.pugx.org/thecsea/laravel-noredirect-traits/license)](https://packagist.org/packages/thecsea/laravel-noredirect-traits)

The library that allows you to use standard laravel traits without redirect, returning information via JSON and HTTP code, ideal for REST applications

# How to use
1. You have to add the composer dependency `composer require "thecsea/laravel-noredirect-traits"`
1. Use `use \it\thecsea\laravel\noredirect_traits\ResetsPasswords;` instead standard traits in `PasswordController.php`
1. Substitute `ResetsPasswords` whit the traits that you want in the file where you need it


# Traits implemented
* ResetsPasswords