<?php

function generateLetters($length) {
    $letters = range('A', 'Z');
    shuffle($letters);
    return array_slice($letters, 0, $length);
}