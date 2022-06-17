# SQL - Ödev 6

### Aşağıdaki sorgu senaryolarını dvdrental örnek veri tabanı üzerinden gerçekleştiriniz.

1. <b>film</b> tablosunda bulunan rental_rate sütunundaki değerlerin ortalaması nedir?
```sql
SELECT ROUND(AVG(rental_rate),2) FROM film;
 ```
 
2. <b>film</b>  tablosunda bulunan filmlerden kaç tanesi 'C' karakteri ile başlar?
```sql
SELECT COUNT(*) FROM film
WHERE title like 'C%';
 ```
 
3. <b>film</b> tablosunda bulunan filmlerden rental_rate değeri 0.99 a eşit olan en uzun (length) film kaç dakikadır?
```sql
SELECT MAX(length) FROM film
WHERE rental_rate = 0.99;
 ```
 
4. <b>film</b> tablosunda bulunan filmlerin uzunluğu 150 dakikadan büyük olanlarına ait kaç farklı replacement_cost değeri vardır?
```sql
SELECT DISTINCT(replacement_cost) FROM film
WHERE length > 150;
 ```
 
