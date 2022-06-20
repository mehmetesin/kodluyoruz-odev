# SQL - Ödev 10

### 

1. <b>city</b> tablosu ile <b>country</b> tablosunda bulunan şehir (city) ve ülke (country) isimlerini birlikte görebileceğimiz LEFT JOIN sorgusunu yazınız.
```sql
SELECT city.city, country.country FROM city
LEFT JOIN country
ON city.country_id = country.country_id;
 ```

2. <b>customer</b> tablosu ile <b>payment</b> tablosunda bulunan payment_id ile customer tablosundaki first_name ve last_name isimlerini birlikte görebileceğimiz RIGHT JOIN sorgusunu yazınız.
```sql
SELECT payment.payment_id, customer.first_name, customer.last_name FROM customer
RIGHT JOIN payment
ON customer.customer_id = payment.customer_id;
 ```

3. <b>customer</b> tablosu ile <b>rental</b>  tablosunda bulunan rental_id ile customer tablosundaki first_name ve last_name isimlerini birlikte görebileceğimiz FULL JOIN sorgusunu yazınız.
```sql
SELECT rental.rental_id, customer.first_name, customer.last_name FROM customer
FULL JOIN rental
ON customer.customer_id = rental.customer_id;
 ```
