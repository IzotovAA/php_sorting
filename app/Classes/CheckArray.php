<?php

namespace Classes;

class CheckArray
{
    public function checkArraySorting(array $arr): bool
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
}
