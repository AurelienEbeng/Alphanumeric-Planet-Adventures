<?php

function checkAscendingNumbers($numbers) {
    if (count($numbers) <= 5) {
        return false;
    }
    $sorted = $numbers;
    sort($sorted);
    return $numbers === $sorted;
}