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
        // echo 'Buble sort passed time ' .  round(($endTime - $startTime) * 1000000, 2) . ' ms' . '<br><br>';
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
        // echo 'Buble sort improved passed time ' .  round(($endTime - $startTime) * 1000000, 2) . ' ms' . '<br><br>';
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
        // echo 'Selection sort passed time ' .  round(($endTime - $startTime) * 1000000, 2) . ' ms' . '<br><br>';
        return $arr;
    }

    public function selectionSortImproved(array $arr): array
    {
        $startTime = microtime(true);
        $length = count($arr);
        // $limit = floor($length / 2);
        $limit = $length / 2;
        $count = 0;
        $last = $length - 1;

        for ($i = 0; $i < $limit; $i++) {
            $minElementIndex = $i;
            $maxElementIndex = $last - $i;
            $lastMaxElementPosition = $last - $i;

            // echo 'Before for ----------------------------------- <br>';
            // echo '$last = ' . $last . '<br>';
            // echo '$i = ' . $i . '<br>';
            // echo 'minElementIndex ' . $minElementIndex . '<br>';
            // echo 'maxElementIndex ' . $maxElementIndex . '<br><br>';
            // echo '<pre>';
            // print_r($arr);
            // echo '</pre>';

            for ($j = $i; $j < $last; $j++) {

                // echo '$j = ' . $j . '<br>';

                if ($arr[$j + 1] < $arr[$minElementIndex]) {
                    $minElementIndex = $j + 1;
                }

                // echo '$arr[$last - $j] = ' . $arr[$last - $j] . '<br>';
                // echo '$arr[$maxElementIndex]= ' . $arr[$maxElementIndex] . '<br>';
                // echo '$arr[$last - $j] > $arr[$maxElementIndex] : ' . ($arr[$last - $j] > $arr[$maxElementIndex]) . '<br>';

                if ($i < $limit - 1 && $arr[$last - $j] > $arr[$maxElementIndex]) {
                    $maxElementIndex = $last - $j;
                    // echo 'min if, $maxElementIndex = ' . $maxElementIndex . '<br>';
                }
            }

            // echo 'After for <br>';
            // echo '$i = ' . $i . '<br>';
            // echo 'minElementIndex ' . $minElementIndex . '<br>';
            // echo 'maxElementIndex ' . $maxElementIndex . '<br><br>';

            if ($minElementIndex === $maxElementIndex) {
                $tempMin = $arr[$minElementIndex];
                $arr[$minElementIndex] = $arr[$i];
                $arr[$i] = $tempMin;
                $count++;
            } else {
                $tempMin = $arr[$minElementIndex];
                $tempMax = $arr[$maxElementIndex];
                $arr[$minElementIndex] = $arr[$i];
                $arr[$maxElementIndex] = $arr[$lastMaxElementPosition];
                $arr[$i] = $tempMin;
                $arr[$lastMaxElementPosition] = $tempMax;
                $count++;
            }

            // echo '<pre>';
            // print_r($arr);
            // echo '</pre>';

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

            // echo 'count($arr) = ' . count($arr) . '<br>';

            if (count($arr) < 2) {
                return $arr;
            }

            $pivot = floor(count($arr) / 2);
            $lenght = count($arr);
            $left = [];
            $right = [];

            for ($i = 0; $i < $lenght; $i++) {
                // echo '$i = ' . $i . '<br>';
                // echo '$pivot = ' . $pivot . '<br>';
                // echo '$i === $pivot' . ($i === $pivot ? ' True' : ' False') . '<br>';

                if ($i != $pivot) {
                    // echo '$i = ' . $i . '<br>';
                    // echo 'else <br>';

                    if ($arr[$i] < $arr[$pivot]) {
                        $left[] = $arr[$i];
                    } else {
                        $right[] = $arr[$i];
                    }
                }
            }

            // echo '<pre>';
            // echo '$left <br>';
            // print_r($left);
            // echo '<br>';
            // echo '$pivot <br>';
            // print_r($pivot);
            // echo '<br>';
            // echo '$right <br>';
            // print_r($right);
            // echo '<br>';
            // echo '</pre>';

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

            $arr1 = array_slice($arr, 0, $divider);
            $arr2 = array_slice($arr, $divider);

            // echo '<pre>';
            // echo '$arr1<br>';
            // print_r($arr1);
            // echo '<br>';
            // echo '$arr2<br>';
            // print_r($arr2);
            // echo '----------------------------<br>';
            // echo '</pre>';

            $arr1 = division($arr1);
            $arr2 = division($arr2);

            // echo '<pre>';
            // echo '$arr1<br>';
            // print_r($arr1);
            // echo '<br>';
            // echo '$arr2<br>';
            // print_r($arr2);
            // echo '</pre>';

            return merge($arr1, $arr2);
        }


        function merge(array $arr1, array $arr2): array
        {
            $result = [];
            // $elem1 = null;
            // $elem2 = null;

            // echo '<pre>';
            // echo '$arr1<br>';
            // print_r($arr1);
            // echo '<br>';
            // echo '$arr2<br>';
            // print_r($arr2);
            // echo '----------------------------<br>';
            // echo '</pre>';

            while (count($arr1) > 0 || count($arr2) > 0) {
                // echo 'count($arr1) ' . count($arr1) . '<br>';
                // echo 'count($arr2) ' . count($arr2) . '<br>';
                // $elem1;
                // $elem2;
                // $result;

                if (count($arr1) > 0 && count($arr2) > 0) {
                    // echo ' if (count($arr1) > 0 && count($arr2) > 0)<br>';
                    // echo '$elem1 = ' . ($elem1 === null ? 'null' : $elem1) . '<br>';
                    // echo '$elem2 = ' . ($elem2 === null ? 'null' : $elem2) . '<br>';
                    // $elem1 === null ? $elem1 = array_shift($arr1) : $elem1;
                    // $elem2 === null ? $elem2 = array_shift($arr2) : $elem2;

                    // echo '$elem1 === null ? $elem1 = array_shift($arr1) : $elem1; $elem2 === null ? $elem2 = array_shift($arr2) : $elem2; <br>';
                    // echo '$elem1 ' . $elem1 . '<br>';
                    // echo '$elem2 ' . $elem2 . '<br>';

                    if ($arr1[0] <= $arr2[0]) {
                        // echo 'if1<br>';
                        $result[] = array_shift($arr1);
                        // array_push($result, $elem1);
                        // $elem1 = null;
                    } else {
                        // echo 'if2<br>';
                        $result[] = array_shift($arr2);
                        // array_push($result, $elem2);
                        // $elem2 = null;
                    }
                }

                // if (count($arr1) == 0 && count($arr2) == 0 && ($elem1 || $elem2)) {
                //     // echo 'if (count($arr1) == 0 && count($arr2) == 0 && ($elem1 || $elem2))<br>';
                //     // echo '$elem1 = ' . $elem1 . '<br>';
                //     // echo '$elem2 = ' . $elem2 . '<br>';
                //     $elem1 ? $result[] = $elem1 : $elem1;
                //     $elem2 ? $result[] = $elem2 : $elem2;
                //     $elem1 = null;
                //     $elem2 = null;
                //     // break;
                // }

                if (count($arr1) > 0 && count($arr2) == 0) {
                    // echo 'break1<br>';
                    array_push($result, ...$arr1);
                    // $elem1 ? $result[] = $elem1 : $elem1;
                    // $elem2 ? $result[] = $elem2 : $elem2;
                    break;
                }

                if (count($arr1) == 0 && count($arr2) > 0) {
                    // echo 'break2<br>';
                    array_push($result, ...$arr2);
                    // echo '$arr2 after break2<br>';
                    // print_r($arr2);
                    // echo '<br>';
                    // echo '$result after break2<br>';
                    // print_r($result);
                    // echo '<br>';
                    // $elem1 ? $result[] = $elem1 : $elem1;
                    // $elem2 ? $result[] = $elem2 : $elem2;
                    break;
                }

                // echo '<pre>';
                // echo '$result in while<br>';
                // print_r($result);
                // echo '<br>';
                // echo '</pre>';
            }

            // echo '<pre>';
            // echo '$result after while<br>';
            // print_r($result);
            // echo '<br>';
            // echo '</pre>';

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
