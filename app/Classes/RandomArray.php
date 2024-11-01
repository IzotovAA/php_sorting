<?php

namespace Classes;

class RandomArray
{
    public function createArray(int $elemenysQty): array
    {
        $arr = [];

        for ($i = 0; $i < $elemenysQty; $i++) {
            $arr[] = mt_rand(-10000, 10000);
        }

        return $arr;
    }
}
