<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$a = \App\Models\Announcement::find(3);
if ($a) {
    echo "Dispatching for ID 3\n";
    \App\Jobs\NotifySubscribersOfNewContent::dispatch($a, 'announcement');
} else {
    echo "Announcement 3 not found\n";
}
