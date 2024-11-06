<?php

declare(strict_types=1);

require_once 'vendor/autoload.php';

set_time_limit(60);

$test = new \Classes\Testing();

// $testName variants: ['ALL', 'BUBLE', 'SELECTION', 'QUICK', 'MERGE']
$test->startTestSorting(1000, 'ALL', false);