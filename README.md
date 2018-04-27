# Instalation

# 1. Clone or download zip folder
[https://github.com/eduardoguerrero/fullstack.git](https://github.com/eduardoguerrero/fullstack.git)

# 2. Change to folder project
```
$cd fullstack-master
```
# 3. Update dependencies
```
$composer update
```   

Install composer: 
[https://getcomposer.org/doc/00-intro.md](https://getcomposer.org/doc/00-intro.md)

# 4. Update MySQL info(user,password, database name)
Go to this file and update the values:
```
/fullstack-master/app/config/parameters.yml
```

# 5. Setting Database
Create a database into MySQL with the same name setted in the step #4 and execute:
```
$cd fullstack-master
$php bin/console doctrine:schema:update --force
 ```
 Check if tables have been created

SQL Database:
```
/fullstack-master/app/sqldb/db.sql
```

# 6. Open the navigator and surf in these URLs
Add a new customer: 
[http://127.0.0.1:8080/fullstack-master/web/app_dev.php/](http://127.0.0.1:8080/fullstack-master/web/app_dev.php/)

List customers: 
[http://127.0.0.1:8080/fullstack-master/web/app_dev.php/customer/list](http://127.0.0.1:8080/fullstack/web/app_dev.php/customer/list)


# 7. Screenshots
**Register Customer**

<a href="https://ibb.co/kHcKgx"><img src="https://image.ibb.co/mBd38c/01.jpg" alt="01" border="0"></a><br /><br/>


**Google login**

<a href="https://imgbb.com/"><img src="https://image.ibb.co/mW6sZH/02.jpg" alt="02" border="0"></a><br /><br/>



<a href="https://imgbb.com/"><img src="https://image.ibb.co/k6Yjgx/03.jpg" alt="03" border="0"></a><br /><br />

**Download file**

<a href="https://ibb.co/iRdd8c"><img src="https://preview.ibb.co/d9G9EH/04.jpg" alt="04" border="0"></a><br /><br />


**Authenticated user**


<a href="https://ibb.co/jwQKEH"><img src="https://preview.ibb.co/i2Qaoc/05.jpg" alt="05" border="0"></a><br /><br />

**List users**

<a href="https://ibb.co/f0K71x"><img src="https://preview.ibb.co/dTiZgx/06.jpg" alt="06" border="0"></a><br />
