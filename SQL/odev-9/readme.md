# SQL - Ödev 9

### Aşağıdaki sorgu senaryolarını dvdrental örnek veri tabanı üzerinden gerçekleştiriniz.

1. <b>city</b> tablosu ile <b>country</b> tablosunda bulunan şehir (city) ve ülke (country) isimlerini birlikte görebileceğimiz INNER JOIN sorgusunu yazınız.
```sql
SELECT city.city, country.country 
FROM city
INNER JOIN country
ON city.country_id = country.country_id
 ```

2. <b>customer</b> tablosu ile <b>payment</b> tablosunda bulunan payment_id ile customer tablosundaki first_name ve last_name isimlerini birlikte görebileceğimiz INNER JOIN sorgusunu yazınız.
```sql
SELECT payment.payment_id, customer.first_name, customer.last_name
FROM customer
INNER JOIN payment
ON customer.customer_id = payment.customer_id
 ```

3. <b>customer</b> tablosu ile <b>rental</b> tablosunda bulunan rental_id ile customer tablosundaki first_name ve last_name isimlerini birlikte görebileceğimiz INNER JOIN sorgusunu yazınız.

```sql
SELECT rental.rental_id, customer.first_name, customer.last_name
FROM customer
INNER JOIN rental
ON customer.customer_id = rental.customer_id
 ```
