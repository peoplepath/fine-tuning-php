<?php
if (defined('APP_INITIALIZED')) return;
define('APP_INITIALIZED', true);

$classes = include __DIR__ . '/vendor/composer/autoload_classmap.php';

foreach (array_keys($classes) as $class) {
    if (str_starts_with($class, 'PackageVersions')) continue;
    if (str_starts_with($class, 'Symfony\Component')) continue;
    if (str_contains($class, 'Test')) continue;

    class_exists($class, true); // autoload
}
