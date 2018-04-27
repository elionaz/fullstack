# Instalation

# 1. Clone or download zip folder: 
	[a link](https://github.com/eduardoguerrero/fullstack.git)

# 2. Change to folder project:
        ```
	$cd fullstack-master
        ```
# 3. Update dependencies:
        ```
	$composer update
        ```   
    	Please check below link if you don't have installed composer: 
    	[a link](https://getcomposer.org/doc/00-intro.md)

# 4. Update MySQL info(user,password, database name)
        ```
	/fullstack-master/app/config/parameters.yml
        ```

# 5. Setting Database:
	Create a database into MySQL with the same name setted in the step #4 and execute:
        ```
	$cd fullstack-master
   	$php bin/console doctrine:schema:update --force
        ```
        Check if tables have been created

# 6. Open the navigator and go to the link below if you want to add a new customer:
	[a link](http://127.0.0.1:8080/fullstack-master/web/app_dev.php/)

	List customers:
	[a link](http://127.0.0.1:8080/fullstack/web/app_dev.php/customer/lis)