<?php

namespace Classes;

class Sorting
{
    public function bubleSort(array $arr): array
    {
        $startTime = microtime(true);
        $length = count($arr);
        $count = 0;

        for ($i = 0; $i < $length - 1; $i++) {

            for ($j = 1; $j < $length - $i; $j++) {

                if ($arr[$j - 1] > $arr[$j]) {
                    $temp = $arr[$j - 1];
                    $arr[$j - 1] = $arr[$j];
                    $arr[$j] = $temp;
                }
            }

            $count++;
        }

        echo 'Buble sort count = ' . $count . '<br>';
        $endTime = microtime(true);
        $resultTime = $endTime - $startTime;
        $resultTime >= 0.001
        ? $resultTime = round($resultTime * 1000, 2) . ' ms'
        : $resultTime = round($resultTime * 1000000, 2) . ' us';
        echo 'Buble sort passed time ' . $resultTime . '<br><br>';

        return $arr;
    }

    public function bubleSortImproved(array $arr): array
    {
        $startTime = microtime(true);
        $length = count($arr);
        $count = 0;

        for ($i = 0; $i < $length - 1; $i++) {
            $replaceFlag = false;

            for ($j = 1; $j < $length - $i; $j++) {
                $replaceFlag;

                if ($arr[$j - 1] > $arr[$j]) {
                    $temp = $arr[$j - 1];
                    $arr[$j - 1] = $arr[$j];
                    $arr[$j] = $temp;
                    $replaceFlag = true;
                }
            }

            $count++;
            if ($replaceFlag === false) {
                break;
            }
            $replaceFlag = false;
        }

        echo 'Buble sort improved count = ' . $count . '<br>';
        $endTime = microtime(true);
        $resultTime = $endTime - $startTime;
        $resultTime >= 0.001
        ? $resultTime = round($resultTime * 1000, 2) . ' ms'
        : $resultTime = round($resultTime * 1000000, 2) . ' us';
        echo 'Buble sort improved passed time ' . $resultTime . '<br><br>';

        return $arr;
    }

    public function selectionSort(array $arr): array
    {
        $startTime = microtime(true);
        $length = count($arr);
        $count = 0;

        for ($i = 0; $i < $length - 1; $i++) {
            $minElementIndex = $i;

            for ($j = $i + 1; $j < $length; $j++) {

                if ($arr[$j] < $arr[$minElementIndex]) {
                    $minElementIndex = $j;
                }
            }

            $temp = $arr[$minElementIndex];
            $arr[$minElementIndex] = $arr[$i];
            $arr[$i] = $temp;
            $count++;
        }

        echo 'Selection sort count = ' . $count . '<br>';
        $endTime = microtime(true);
        $resultTime = $endTime - $startTime;
        $resultTime >= 0.001
        ? $resultTime = round($resultTime * 1000, 2) . ' ms'
        : $resultTime = round($resultTime * 1000000, 2) . ' us';
        echo 'Selection sort passed time ' . $resultTime . '<br><br>';

        return $arr;
    }

    public function selectionSortImproved(array $arr): array
    {
        $startTime = microtime(true);
        $length = count($arr);
        $limit = $length / 2;
        $count = 0;
        $last = $length - 1;

        for ($i = 0; $i < $limit; $i++) {
            $minElementIndex = $i;
            $maxElementIndex = $last - $i;
            $lastMaxElementPosition = $last - $i;

            for ($j = $i; $j < $last; $j++) {

                if ($arr[$j + 1] < $arr[$minElementIndex]) {
                    $minElementIndex = $j + 1;
                }

                if ($i < $limit && $arr[$last - $j] > $arr[$maxElementIndex]) {
                    $maxElementIndex = $last - $j;
                }
            }

            $tempMin = $arr[$minElementIndex];
            $tempMax = $arr[$maxElementIndex];
            $arr[$minElementIndex] = $arr[$i];
            $arr[$maxElementIndex] = $arr[$lastMaxElementPosition];
            $arr[$i] = $tempMin;
            $arr[$lastMaxElementPosition] = $tempMax;
            $count++;
        }

        echo 'Selection sort improved count = ' . $count . '<br>';
        $endTime = microtime(true);
        $resultTime = $endTime - $startTime;
        $resultTime >= 0.001
        ? $resultTime = round($resultTime * 1000, 2) . ' ms'
        : $resultTime = round($resultTime * 1000000, 2) . ' us';
        echo 'Selection sort improved passed time ' . $resultTime . '<br><br>';

        return $arr;
    }

    public function quickSort(array $arr): array
    {
        $startTime = microtime(true);

        function sorting(array $arr): array
        {
            if (count($arr) < 2) {
                return $arr;
            }

            $pivot = floor(count($arr) / 2);
            $lenght = count($arr);
            $left = [];
            $right = [];

            for ($i = 0; $i < $lenght; $i++) {

                if ($i != $pivot) {

                    if ($arr[$i] < $arr[$pivot]) {
                        $left[] = $arr[$i];
                    } else {
                        $right[] = $arr[$i];
                    }
                }
            }

            return [...sorting($left), $arr[$pivot], ...sorting($right)];
        }

        $resultArr = sorting($arr);
        $endTime = microtime(true);
        $resultTime = $endTime - $startTime;
        $resultTime >= 0.001
        ? $resultTime = round($resultTime * 1000, 2) . ' ms'
        : $resultTime = round($resultTime * 1000000, 2) . ' us';
        echo 'Quick sort passed time ' . $resultTime . '<br><br>';

        return $resultArr;
    }

    public function mergeSort(array $arr): array
    {
        $startTime = microtime(true);

        function division(array $arr): array
        {
            if (count($arr) < 2) {
                return $arr;
            }

            $divider = round(count($arr) / 2);
            $left = array_slice($arr, 0, $divider);
            $right = array_slice($arr, $divider);
            $left = division($left);
            $right = division($right);

            return merge($left, $right);
        }


        function merge(array $arr1, array $arr2): array
        {
            $result = [];

            while (count($arr1) > 0 || count($arr2) > 0) {

                if (count($arr1) > 0 && count($arr2) > 0) {

                    if ($arr1[0] <= $arr2[0]) {
                        $result[] = array_shift($arr1);
                    } else {
                        $result[] = array_shift($arr2);
                    }
                }

                if (count($arr1) > 0 && count($arr2) == 0) {
                    array_push($result, ...$arr1);
                    break;
                }

                if (count($arr1) == 0 && count($arr2) > 0) {
                    array_push($result, ...$arr2);
                    break;
                }
            }

            return $result;
        }

        $resultArr = division($arr);
        $endTime = microtime(true);
        $resultTime = $endTime - $startTime;
        $resultTime >= 0.001
        ? $resultTime = round($resultTime * 1000, 2) . ' ms'
        : $resultTime = round($resultTime * 1000000, 2) . ' us';
        echo 'Merge sort passed time ' . $resultTime . '<br><br>';

        return $resultArr;
    }
}
