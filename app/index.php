<?php

require_once 'vendor/autoload.php';

set_time_limit(60);

$testSorting = new \Classes\Testing();

// $testName variants: ['ALL', 'BUBLE', 'SELECTION', 'QUICK', 'MERGE']
$testSorting->startTesting(100, 'ALL', false);

// $createRandomArray = new \Classes\RandomArray();
// $sorting = new \Classes\Sorting();
// $checkArray = new \Classes\CheckArray();

// $arrBeforeSort1 = [12,12,2,5,3,9,1,7,0,2,10,4,6,8,11,13,13];
// $arrBeforeSort2 = [5,4,3,2,1,0];
// $arrBeforeSort3 = [0,1,2,3,4,5];
// $arrBeforeSort4 = [6,5,4,3,2,1,0];
// $arrBeforeSort5 = [0,1,2,3,4,5,6];
// $arrBeforeSort6 = [12,2,-9,5,3,-5,9,1,7,0,-1];

// $randomArray1 = $createRandomArray->createArray(100);

// echo 'array elements quantity = ' . count($randomArray1) . '<br><br>';

// $bubleSort1 = $sorting->bubleSort($randomArray1);
// $bubleSortImproved1 = $sorting->bubleSortImproved($randomArray1);
// $selectionSort1 = $sorting->selectionSort($randomArray1);
// $selectionSortImproved1 = $sorting->selectionSortImproved($randomArray1);
// $quickSort1 = $sorting->quickSort($randomArray1);
// $mergeSort1 = $sorting->mergeSort($randomArray1);

// echo '<pre>';
// echo 'Array before sorting <br>';
// print_r($randomArray1);
// echo '<br>';
// echo '<br>Array after sorting by bubleSort<br>';
// print_r($sorting->bubleSort($arrBeforeSort1));
// echo '<br>';
// echo '<br>Array after sorting by bubleSortImproved<br>';
// print_r($sorting->bubleSortImproved($arrBeforeSort1));
// echo '<br>';
// echo '<br>Array after sorting by selectionSort<br>';
// print_r($sorting->selectionSort($arrBeforeSort1));
// echo '<br>';
// echo '<br>Array after sorting by selectionSortImproved<br>';
// print_r($sorting->selectionSortImproved($arrBeforeSort1));
// echo '<br>';
// echo '<br>Array after sorting by quickSort<br>';
// print_r($sorting->quickSort($arrBeforeSort1));
// echo '<br>';
// echo '<br>Array after sorting by mergeSort<br>';
// print_r($mergeSort1);
// echo '</pre>';

// echo '<pre>';
// echo 'Check array sorting (bubleSort): ' . ($checkArray->checkArraySorting($bubleSort1) ? 'True' : 'False') . '<br>';
// echo 'Check array sorting (bubleSortImproved): ' . ($checkArray->checkArraySorting($bubleSortImproved1) ? 'True' : 'False') . '<br>';
// echo 'Check array sorting (selectionSort): ' . ($checkArray->checkArraySorting($selectionSort1) ? 'True' : 'False') . '<br>';
// echo 'Check array sorting (selectionSortImproved): ' . ($checkArray->checkArraySorting($selectionSortImproved1) ? 'True' : 'False') . '<br>';
// echo 'Check array sorting (quickSort): ' . ($checkArray->checkArraySorting($quickSort1) ? 'True' : 'False') . '<br>';
// echo 'Check array sorting (mergeSort): ' . ($checkArray->checkArraySorting($mergeSort1) ? 'True' : 'False') . '<br>';
// echo '</pre>';
