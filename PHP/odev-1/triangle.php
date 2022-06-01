<?php

function triangle($height=3) {
    $h_counter=0;
    while ($h_counter <= $height) {
        for ($i=0; $i < $h_counter ; $i++) echo "o ";
        echo "<br>";
        $h_counter++;
    }
}

triangle(15);