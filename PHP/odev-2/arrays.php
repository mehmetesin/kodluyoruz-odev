<pre>

<?php
$planets = ["Mercury", "Venus", "Earth", "Mars", "Jupiter", "Saturn", "Uranus", "Neptune", "", "", NULL];

function make_array_random($arr, $seed){
    // boş ve null olanları temizle
    $cleared_arr = array_filter($arr);
    // verilen $seed parametresine göre rastgele bir dizi keyleri oluştur
    $random_arr_keys= array_rand($cleared_arr, $seed);
    // $random_arr_keys keylerine göre bir dizi oluştur ve dönder
    return array_map(function($item) use ($cleared_arr){
        return $cleared_arr[$item];
    }, $random_arr_keys);
}

// Örnek
print_r(make_array_random($planets,3));
print_r(make_array_random($planets,5));
print_r(make_array_random($planets,2));

?>
</pre>