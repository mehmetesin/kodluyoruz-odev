# PHP

## Ödev - 4 | Sınıflar

### Ödev konusu
- <b>Sekil</b> adında bir sınıf oluşturun ve bu sınıfından türeterek <b>Dikdortgen, Ucgen</b> ve <b>Kare</b> isimlerinde 3 sınıf daha oluşturun.
- Amacımız; en mantıklı yoldan daha az kod yazarak her şeklin özelinde kendini alan ve çevrelerini hesaplamak.

> Ör. 
> Dikdörtgen : Genişlik : 5 Yükseklik :3
> ```php 
> $dikdortgen = new Dikdortgen(4, 6);
> ```
> - Çevre : 
> ```php 
> echo 'Dikdörtgenin çevresi : ' . $dikdortgen->cevre() . '<br>';
> ```
> - Alan
> ```php 
> echo 'Dikdörtgenin alanı : ' . $dikdortgen->alan() . '<br>';
> ```
