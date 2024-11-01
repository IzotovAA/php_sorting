<?php

require_once 'vendor/autoload.php';

set_time_limit(60);

$testSorting = new \Classes\Testing();

// $testName variants: ['ALL', 'BUBLE', 'SELECTION', 'QUICK', 'MERGE']
$testSorting->startTesting(1000, 'ALL', false);
