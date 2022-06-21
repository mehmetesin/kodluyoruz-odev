# SQL - Ödev 12

### Aşağıdaki sorgu senaryolarını <b>dvdrental</b> örnek veri tabanı üzerinden gerçekleştiriniz.

1. <b>film</b> tablosunda film uzunluğu <b>length</b> sütununda gösterilmektedir. Uzunluğu ortalama film uzunluğundan fazla kaç tane film vardır?
```sql
SELECT COUNT(*) FROM film
WHERE length = 
(
	SELECT ROUND(AVG(length),0) FROM film
)
 ```

2. <b>film</b> tablosunda en yüksek rental_rate değerine sahip kaç tane film vardır?
```sql
SELECT COUNT(*) FROM film
WHERE rental_rate = 
(
	SELECT MAX(rental_rate) FROM film
)
 ```

3. <b>film</b> tablosunda en düşük rental_rate ve en düşün replacement_cost değerlerine sahip filmleri sıralayınız.
```sql
SELECT COUNT(*) FROM film
WHERE rental_rate = 
	(
		SELECT MIN(rental_rate) FROM film
	)
AND replacement_cost = 
	(
		SELECT MIN(replacement_cost) FROM film
	)
 ```

4. <b>payment</b> tablosunda en fazla sayıda alışveriş yapan müşterileri(customer) sıralayınız.
    
<b>En çok alışveriş yapan id ve alışveriş sayıları :</b>
```sql
SELECT customer_id, COUNT(payment_id)
FROM payment
GROUP BY customer_id
ORDER BY COUNT(payment_id) DESC
 ```

<b>En çok alışveriş yapan müşteri bilgileri ve alışveriş sayıları:</b>
```sql
select customer.customer_id, customer.first_name, customer.last_name, count(payment.payment_id) payment_count from customer
join payment
on payment.customer_id = customer.customer_id
where customer.customer_id = ANY
(
	select customer_id
	from payment
	group by customer_id
	order by count(payment_id)
)
group by customer.customer_id
order by count(payment.payment_id) DESC
 ```