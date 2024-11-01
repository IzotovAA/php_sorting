<?php

namespace Classes;

require_once 'vendor/autoload.php';

class Testing
{
    private function createArray(int $elemenysQty): array
    {
        $arr = [];

        for ($i = 0; $i < $elemenysQty; $i++) {
            $arr[] = mt_rand(-10000, 10000);
        }

        return $arr;
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

    public function startTesting(int $elementsQty, string $testName = 'ALL', bool $printArray = false): void
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
}
