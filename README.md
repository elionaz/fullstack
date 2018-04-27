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
Go to this file and update the values
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

# 6. Open the navigator and surf in these URLs
Add a new customer: 
[http://127.0.0.1:8080/fullstack-master/web/app_dev.php/](http://127.0.0.1:8080/fullstack-master/web/app_dev.php/)

List customers: 
[http://127.0.0.1:8080/fullstack/web/app_dev.php/customer/list](http://127.0.0.1:8080/fullstack/web/app_dev.php/customer/list)