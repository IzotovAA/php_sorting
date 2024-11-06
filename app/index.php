<?php

declare(strict_types=1);

require_once 'vendor/autoload.php';

set_time_limit(60);

$reverse = new \Classes\StringReverse();

echo 'Привет Hello, world!<br>';
echo $reverse->reverse('Привет Hello, world!') . '<br><br>';

echo 'Пустая строка<br>';
echo $reverse->reverse('') . '<br><br>';

echo 'Лёша на полке клопа нашёл<br>';
echo $reverse->reverse('Лёша на полке клопа нашёл') . '<br><br>';
$test = new \Classes\Testing();

// $testName variants: ['ALL', 'BUBLE', 'SELECTION', 'QUICK', 'MERGE']
// $test->startTestSorting(1000, 'ALL', false);

// $testName variants: ['ALL', 'LINEAR', 'BINARY']
// $test->startTestSearching([1,2,3,4,5,6,7,8,9,10,11,12], 9, 'ALL', true);
$test->startTestSearching(50, 5, 'ALL', true);


