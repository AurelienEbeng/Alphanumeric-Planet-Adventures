<?php

function checkDescendingNumbers($numbers) {
    if (count($numbers) <= 5) {
        return false;
    }
    $sorted = $numbers;
    rsort($sorted);
    return $numbers === $sorted;
}