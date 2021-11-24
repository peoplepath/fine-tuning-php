<?php
$start = hrtime(true);

header('Content-Type: text/plain');

require_once __DIR__ . '/vendor/autoload.php';

$marks['composer'] = hrtime(true);

// simulate application init
include __DIR__ . '/app_init.php';

$marks['fake application'] = hrtime(true);

// function heavy on CPU
function ackermann(int $m , int $n) : int {
    if ($m == 0) {
        return $n + 1;
    } elseif ($n == 0) {
        return ackermann($m - 1, 1);
    }

    return ackermann($m - 1, ackermann($m , $n - 1));
}

ackermann(3, 8);

$marks['ackermann'] = hrtime(true);

$prev = $start;
foreach ($marks as $label => $hrtime) {
    printf($label . ': %.2fms' . PHP_EOL, ($hrtime - $prev) / 1_000_000);
    $prev = $hrtime;
}

$debug = [
    'execution_time' => sprintf('%.2fms', (hrtime(true) - $start) / 1_000_000),
    'opcache_status' => opcache_get_status(false),
    'opcache_config' => opcache_get_configuration(),
];

// print_r($debug);
