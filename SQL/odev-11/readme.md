# SQL - Ödev 11

### Aşağıdaki sorgu senaryolarını <b>dvdrental</b> örnek veri tabanı üzerinden gerçekleştiriniz.

1. <b>actor</b> ve <b>customer</b> tablolarında bulunan <b>first_name</b> sütunları için tüm verileri sıralayalım.
```sql
SELECT first_name FROM actor
UNION
SELECT first_name FROM customer
 ```

2.<b>actor</b> ve <b>customer</b> tablolarında bulunan <b>first_name</b> sütunları için kesişen verileri sıralayalım.
```sql
SELECT first_name FROM actor
INTERSECT
SELECT first_name FROM customer
 ```

3. <b>actor</b> ve <b>customer</b> tablolarında bulunan <b>first_name</b> sütunları için ilk tabloda bulunan ancak ikinci tabloda bulunmayan verileri sıralayalım.
```sql
SELECT first_name FROM actor
EXCEPT
SELECT first_name FROM customer
 ```

4. İlk 3 sorguyu tekrar eden veriler için de yapalım.
```sql
SELECT first_name FROM actor
UNION ALL
SELECT first_name FROM customer
 ```

```sql
SELECT first_name FROM actor
INTERSECT ALL
SELECT first_name FROM customer
 ```

 ```sql
SELECT first_name FROM actor
EXCEPT ALL
SELECT first_name FROM customer
 ```