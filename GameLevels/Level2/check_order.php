<?php

function checkDescending($letters) {
    if (count($letters) <= 5) {
        return false;
    }
    $sorted = $letters;
    rsort($sorted);
    return $letters === $sorted;
}