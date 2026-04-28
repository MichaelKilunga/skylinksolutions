<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$n = \App\Models\News::find(1);
if ($n) {
    echo "Dispatching for News ID 1\n";
    \App\Jobs\NotifySubscribersOfNewContent::dispatch($n, 'news');
} else {
    echo "News 1 not found\n";
}
