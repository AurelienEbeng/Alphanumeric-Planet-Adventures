<?php

function generateNumbers($length) {
    $numbers = range(1, 100); 
    shuffle($numbers);
    return array_slice($numbers, 0, $length);
}