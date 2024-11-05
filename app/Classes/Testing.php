<?php

declare(strict_types=1);

namespace Classes;

class Testing
{
    private function createArray(int $elemenysQty): array
    {
        $newArray = [];

        for ($i = 0; $i < $elemenysQty; $i++) {
            $newArray[] = mt_rand(-20, 20);
        }

        return $newArray;
    }

    private function checkArraySorting(array $arr): bool
    {
        (bool) $flag = true;
        $lenght = count($arr);

        for ($i = 1; $i < $lenght; $i++) {
            if ($arr[$i] < $arr[$i - 1]) {
                $flag = false;
                break;
            }
        }

        return $flag;
    }

    public function startTestSorting(int $elementsQty, string $testName = 'ALL', bool $printArray = false): void
    {
        // $testName variants: ['ALL', 'BUBLE', 'SELECTION', 'QUICK', 'MERGE']

        $sorting = new \Classes\Sorting();

        $randomArray = $this->createArray($elementsQty);
        echo 'array elements quantity = ' . count($randomArray) . '<br><br>';

        switch ($testName) {
            case 'ALL':
                $bubleSort = $sorting->bubleSort($randomArray);
                $bubleSortImproved = $sorting->bubleSortImproved($randomArray);
                $selectionSort = $sorting->selectionSort($randomArray);
                $selectionSortImproved = $sorting->selectionSortImproved($randomArray);
                $quickSort = $sorting->quickSort($randomArray);
                $mergeSort = $sorting->mergeSort($randomArray);
                echo 'Check array sorting (bubleSort): ' . ($this->checkArraySorting($bubleSort) ? 'True' : 'False') . '<br>';
                echo 'Check array sorting (bubleSortImproved): ' . ($this->checkArraySorting($bubleSortImproved) ? 'True' : 'False') . '<br>';
                echo 'Check array sorting (selectionSort): ' . ($this->checkArraySorting($selectionSort) ? 'True' : 'False') . '<br>';
                echo 'Check array sorting (selectionSortImproved): ' . ($this->checkArraySorting($selectionSortImproved) ? 'True' : 'False') . '<br>';
                echo 'Check array sorting (quickSort): ' . ($this->checkArraySorting($quickSort) ? 'True' : 'False') . '<br>';
                echo 'Check array sorting (mergeSort): ' . ($this->checkArraySorting($mergeSort) ? 'True' : 'False') . '<br>';

                if ($printArray) {
                    echo '<pre>';
                    echo 'Array before sorting <br>';
                    print_r($randomArray);
                    echo '<br>';
                    echo '<br>Array after sorting by bubleSort<br>';
                    print_r($bubleSort);
                    echo '<br>';
                    echo '<br>Array after sorting by bubleSortImproved<br>';
                    print_r($bubleSortImproved);
                    echo '<br>';
                    echo '<br>Array after sorting by selectionSort<br>';
                    print_r($selectionSort);
                    echo '<br>';
                    echo '<br>Array after sorting by selectionSortImproved<br>';
                    print_r($selectionSortImproved);
                    echo '<br>';
                    echo '<br>Array after sorting by quickSort<br>';
                    print_r($quickSort);
                    echo '<br>';
                    echo '<br>Array after sorting by mergeSort<br>';
                    print_r($mergeSort);
                    echo '</pre>';
                }

                break;

            case 'BUBLE':
                $bubleSort = $sorting->bubleSort($randomArray);
                $bubleSortImproved = $sorting->bubleSortImproved($randomArray);
                echo 'Check array sorting (bubleSort): ' . ($this->checkArraySorting($bubleSort) ? 'True' : 'False') . '<br>';
                echo 'Check array sorting (bubleSortImproved): ' . ($this->checkArraySorting($bubleSortImproved) ? 'True' : 'False') . '<br>';

                if ($printArray) {
                    echo '<pre>';
                    echo 'Array before sorting <br>';
                    print_r($randomArray);
                    echo '<br>';
                    echo '<br>Array after sorting by bubleSort<br>';
                    print_r($bubleSort);
                    echo '<br>';
                    echo '<br>Array after sorting by bubleSortImproved<br>';
                    print_r($bubleSortImproved);
                    echo '<br>';
                    echo '</pre>';
                }

                break;

            case 'SELECTION':
                $selectionSort = $sorting->selectionSort($randomArray);
                $selectionSortImproved = $sorting->selectionSortImproved($randomArray);
                echo 'Check array sorting (selectionSort): ' . ($this->checkArraySorting($selectionSort) ? 'True' : 'False') . '<br>';
                echo 'Check array sorting (selectionSortImproved): ' . ($this->checkArraySorting($selectionSortImproved) ? 'True' : 'False') . '<br>';

                if ($printArray) {
                    echo '<pre>';
                    echo 'Array before sorting <br>';
                    print_r($randomArray);
                    echo '<br>';
                    echo '<br>Array after sorting by selectionSort<br>';
                    print_r($selectionSort);
                    echo '<br>';
                    echo '<br>Array after sorting by selectionSortImproved<br>';
                    print_r($selectionSortImproved);
                    echo '<br>';
                    echo '</pre>';
                }

                break;

            case 'QUICK':
                $quickSort = $sorting->quickSort($randomArray);
                echo 'Check array sorting (quickSort): ' . ($this->checkArraySorting($quickSort) ? 'True' : 'False') . '<br>';

                if ($printArray) {
                    echo '<pre>';
                    echo 'Array before sorting <br>';
                    print_r($randomArray);
                    echo '<br>';
                    echo '<br>Array after sorting by quickSort<br>';
                    print_r($quickSort);
                    echo '<br>';
                    echo '</pre>';
                }

                break;

            case 'MERGE':
                $mergeSort = $sorting->mergeSort($randomArray);
                echo 'Check array sorting (mergeSort): ' . ($this->checkArraySorting($mergeSort) ? 'True' : 'False') . '<br>';

                if ($printArray) {
                    echo '<pre>';
                    echo 'Array before sorting <br>';
                    print_r($randomArray);
                    echo '<br>';
                    echo '<br>Array after sorting by mergeSort<br>';
                    print_r($mergeSort);
                    echo '</pre>';
                }

                break;

            default:
                echo 'Incorrect argument $testName, it can be: ALL, BUBLE, SELECTION, QUICK, MERGE';
                break;
        }
    }

    public function startTestSearching(int | array $qtyOrArr, int $searchItem, string $testName = 'ALL', bool $printResult = false)
    {
        // $testName variants: ['ALL', 'LINEAR', 'BINARY']

        $searching = new \Classes\Searching();
        $sorting = new \Classes\Sorting();

        $array = [];

        if (gettype($qtyOrArr) == 'integer') {
            $array = $this->createArray($qtyOrArr);
        } else {
            $array = $qtyOrArr;
        }

        switch ($testName) {
            case 'ALL':
                if ($printResult === true) {
                    echo 'Search in array:<br>';
                    echo '<pre>';
                    print_r($array);
                    echo '<pre>';
                }
                
                $searching->linearSearch($array, $searchItem);

                $array = $sorting->quickSort($array);
                echo 'Search in array:<br>';
                echo '<pre>';
                print_r($array);
                echo '<pre>';
                $searching->binarySearch($array, $searchItem);

                break;

            case 'LINEAR':
                if ($printResult === true) {
                    echo 'Search in array:<br>';
                    echo '<pre>';
                    print_r($array);
                    echo '<pre>';
                }
                
                $searching->linearSearch($array, $searchItem);               

                break;

            case 'BINARY':
                if ($printResult === true) {
                    echo 'Search in array:<br>';
                    echo '<pre>';
                    print_r($array);
                    echo '<pre>';
                }                
                
                $array = $sorting->quickSort($array);
                echo 'Search in array:<br>';
                echo '<pre>';
                print_r($array);
                echo '<pre>';
                $searching->binarySearch($array, $searchItem);

                break;
            
            default:
                echo 'Incorrect argument $testName, it can be: ALL, LINEAR, BINARY]';
                break;
        }
        
    }
}
