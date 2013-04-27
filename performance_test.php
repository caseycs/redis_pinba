<?php
require 'vendor/autoload.php';

$repeats = 10000;
echo "Doing {$repeats} GET requests...\n";

$Redis = new Redis;
$Redis->connect('localhost');

$time = microtime(true);
for ($i = 0; $i < $repeats; $i++) {
    $Redis->get('test');
}
$raw_time = microtime(true) - $time;
echo "Redis raw time: " . round($raw_time, 5) . "s\n";

/* @var \Redis $Redis */
$Redis = new RedisPinba\RedisPinba;
$Redis->connect('localhost');

$time = microtime(true);
for ($i = 0; $i < $repeats; $i++) {
    $Redis->get('test');
}
$proxy_time = microtime(true) - $time;
echo "RedisPinba psoxy time: " . round($proxy_time, 5) . "s\n";

$per_req = ($proxy_time - $raw_time) / $repeats;
echo "Slowdown: " . round($proxy_time / $raw_time, 5) . "x, " . sprintf("%.7f", $per_req) . "s per request\n";
