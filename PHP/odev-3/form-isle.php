<?php

$number = $_POST["number"];
// sayı girilmemiş ise hata ver ve geri dön linkini göster
if ($number=='') die("Lütfen goş gönderi yapmayınız. <a href='javascript:history.back()'>Geri dön</a>");

// 3'e bölünebilirliği kontrol et. Bölünemiyorsa ilk bölünebilen sayıyı döndür
function check_divisibility($number){
    return $number % 3 == 0 ? 1 :  $number + (3 - $number % 3 );
}


// Sayının bölünebilirliğini kontrol et sonucu $result değişkenine aktar;
$result = check_divisibility($number);

$message = "Girdiğiniz <b>" . $number . "</b> sayısı, " ;

// Sonucu değerlendir mesaj belirle
if ($result==1) {
    $message .= "3'e tam bölünebilir. <br>" ;
}else{
    $message .= "3'e kalansız bölünemez. <br>" ;
    $message .= "3'e bölünebilen ilk sayı : <b>" . $result . "</b>";
}

$message .= "<p><a href='javascript:history.back()'>Geri dön</a></p>";

// Mesajı görüntüle
echo $message;