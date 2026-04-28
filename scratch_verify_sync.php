<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$n = \App\Models\News::find(1);
if ($n) {
    echo "Dispatching News ID 1 (should be sync now)\n";
    $start = microtime(true);
    \App\Jobs\NotifySubscribersOfNewContent::dispatch($n, 'news');
    $end = microtime(true);
    echo "Finished in " . round($end - $start, 2) . "s\n";
}
