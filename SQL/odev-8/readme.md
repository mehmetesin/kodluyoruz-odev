# SQL - Ödev 8


1. <b>test</b> veritabanınızda <b>employee</b> isimli sütun bilgileri id(INTEGER), name VARCHAR(50), birthday DATE, email VARCHAR(100) olan bir tablo oluşturalım.
```sql
CREATE TABLE employee (
	id INTEGER,
	name VARCHAR(50),
	birthday DATE,
	email VARCHAR(100)
);
 ```

2. Oluşturduğumuz <b>employee</b> tablosuna 'Mockaroo' servisini kullanarak 50 adet veri ekleyelim.
```sql
insert into employee (id, name, birthday, email) values (1, 'Mira', '2009-08-03', 'mzanolli0@cnet.com');
insert into employee (id, name, birthday, email) values (2, 'Rudolf', '2019-08-05', 'rmouser1@clickbank.net');
insert into employee (id, name, birthday, email) values (3, 'Willamina', '2005-01-26', 'whaywood2@reuters.com');
insert into employee (id, name, birthday, email) values (4, 'Levey', '2011-05-05', 'lcharley3@mapy.cz');
insert into employee (id, name, birthday, email) values (5, 'Katharine', '2004-05-21', 'kmoses4@phoca.cz');
insert into employee (id, name, birthday, email) values (6, 'Donia', '2012-11-26', 'ddominy5@acquirethisname.com');
insert into employee (id, name, birthday, email) values (7, 'Daryl', '2019-10-28', 'dentres6@xinhuanet.com');
insert into employee (id, name, birthday, email) values (8, 'Armando', '2014-07-07', 'aneate7@ucoz.ru');
insert into employee (id, name, birthday, email) values (9, 'Nan', '2004-04-10', 'nphalip8@icq.com');
insert into employee (id, name, birthday, email) values (10, 'Salim', '2018-04-11', 'sryan9@dell.com');
insert into employee (id, name, birthday, email) values (11, 'Rodrigo', '2017-06-17', 'rhawtina@creativecommons.org');
insert into employee (id, name, birthday, email) values (12, 'Mellicent', '2009-03-13', 'mlangb@nih.gov');
insert into employee (id, name, birthday, email) values (13, 'Sig', '2021-10-17', 'ssmitherhamc@yolasite.com');
insert into employee (id, name, birthday, email) values (14, 'Madelin', '2005-11-04', 'mparnelld@alibaba.com');
insert into employee (id, name, birthday, email) values (15, 'Gianna', '2011-09-18', 'gscarfee@independent.co.uk');
insert into employee (id, name, birthday, email) values (16, 'Charmian', '2019-07-13', 'cizzatf@about.me');
insert into employee (id, name, birthday, email) values (17, 'Lori', '2004-12-29', 'lroseg@wix.com');
insert into employee (id, name, birthday, email) values (18, 'Cosimo', '2005-07-09', 'ckynclh@earthlink.net');
insert into employee (id, name, birthday, email) values (19, 'Sherlock', '2006-02-01', 'sburdeni@hao123.com');
insert into employee (id, name, birthday, email) values (20, 'Genna', '2005-02-03', 'gmenicombj@sciencedaily.com');
insert into employee (id, name, birthday, email) values (21, 'Carilyn', '2005-01-15', 'cdougalk@purevolume.com');
insert into employee (id, name, birthday, email) values (22, 'Terrye', '2008-06-19', 'tainsbyl@ebay.co.uk');
insert into employee (id, name, birthday, email) values (23, 'Raimund', '2005-07-03', 'rcrosettim@myspace.com');
insert into employee (id, name, birthday, email) values (24, 'Ami', '2018-01-08', 'adambrosin@nyu.edu');
insert into employee (id, name, birthday, email) values (25, 'Dar', '2006-05-03', 'dgreasero@acquirethisname.com');
insert into employee (id, name, birthday, email) values (26, 'Lucille', '2008-01-28', 'lvendittip@booking.com');
insert into employee (id, name, birthday, email) values (27, 'Lebbie', '2019-01-19', 'lbottonerq@myspace.com');
insert into employee (id, name, birthday, email) values (28, 'Berny', '2002-01-08', 'bfairhamr@cnbc.com');
insert into employee (id, name, birthday, email) values (29, 'Gale', '2002-07-30', 'gbaiteys@chron.com');
insert into employee (id, name, birthday, email) values (30, 'Carling', '2020-12-01', 'cmilat@pbs.org');
insert into employee (id, name, birthday, email) values (31, 'Milo', '2009-10-22', 'mmaheru@t.co');
insert into employee (id, name, birthday, email) values (32, 'Celina', '2021-09-19', 'cmaletrattv@tuttocitta.it');
insert into employee (id, name, birthday, email) values (33, 'Reid', '2017-06-05', 'rkitchinerw@desdev.cn');
insert into employee (id, name, birthday, email) values (34, 'Tessy', '2000-07-31', 'trampleex@trellian.com');
insert into employee (id, name, birthday, email) values (35, 'Rickie', '2011-06-02', 'rmeryetty@msu.edu');
insert into employee (id, name, birthday, email) values (36, 'John', '2014-10-22', 'jwoloschinskiz@nymag.com');
insert into employee (id, name, birthday, email) values (37, 'Gilbert', '2016-06-19', 'givashin10@indiatimes.com');
insert into employee (id, name, birthday, email) values (38, 'Karlen', '2016-08-09', 'kreoch11@cnn.com');
insert into employee (id, name, birthday, email) values (39, 'Tricia', '2003-02-17', 'tlivingstone12@shutterfly.com');
insert into employee (id, name, birthday, email) values (40, 'Allx', '2007-11-03', 'aberriball13@home.pl');
insert into employee (id, name, birthday, email) values (41, 'Giffard', '2016-04-23', 'gwoodburne14@opensource.org');
insert into employee (id, name, birthday, email) values (42, 'Gerome', '2007-04-24', 'gmalatalant15@google.fr');
insert into employee (id, name, birthday, email) values (43, 'Katalin', '2012-08-27', 'kblomefield16@wired.com');
insert into employee (id, name, birthday, email) values (44, 'Courtenay', '2017-01-27', 'cbartleet17@elegantthemes.com');
insert into employee (id, name, birthday, email) values (45, 'Waylon', '2005-07-18', 'wglavis18@bing.com');
insert into employee (id, name, birthday, email) values (46, 'Ryon', '2019-03-17', 'rgraveson19@posterous.com');
insert into employee (id, name, birthday, email) values (47, 'Alejandra', '2011-06-11', 'atregenna1a@mysql.com');
insert into employee (id, name, birthday, email) values (48, 'Hanson', '2003-04-08', 'hdesimone1b@theglobeandmail.com');
insert into employee (id, name, birthday, email) values (49, 'Kelcey', '2018-07-06', 'kwiszniewski1c@webs.com');
insert into employee (id, name, birthday, email) values (50, 'Shermy', '2006-06-24', 'schatres1d@redcross.org');
 ```

3. Sütunların her birine göre diğer sütunları güncelleyecek 5 adet UPDATE işlemi yapalım.
```sql
update employee 
set name = 'Mehmet'
where id = 3

update employee 
set birthday = '2022-06-17'
where name = 'Levey'

update employee 
set email = 'kodluyoruz@patika.dev'
where birthday = '2014-07-07'

update employee 
set id = 445
where email = 'wglavis18@bing.com'

update employee 
set name = 'kodluyoruz',
	email = 'kodluyoruz@patika.dev',
	birthday = '2022-06-17'
where name like '%y'

 ```

4. Sütunların her birine göre ilgili satırı silecek 5 adet DELETE işlemi yapalım.
```sql
delete from employee
where name like '%y'

delete from employee
where id= 15

delete from employee
where name = 'Mira'

delete from employee
where birthday = '2004-12-29'

delete from employee
where email like '%com'

 ```
