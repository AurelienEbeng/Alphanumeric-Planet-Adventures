<?php

function checkAscending($letters) {
    if (count($letters) <= 5) {
        return false;
    }
    $sorted = $letters;
    sort($sorted);
    return $letters === $sorted;
}