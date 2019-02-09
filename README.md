# PurpleBug-Exam
An examination for employment.

## About
This project is my output of PurpleBug examination which is good for 36 hours.
The project has a REST-API that provides CRUDS Operation for Simple Sub Pre Order.
I didn't use any kinds of libraries and Frameworks in both backend and Front end.
All data are pulled out from API JSON format.
The user will receive order summary and verification links via email within 5 minutes after placing his/her order. You can see sample screenshot of the email in screenshot/ folder.

## Requirements 
-webserver that supports php

-SMTP server and php mail() function enabled.

-mysql database system
  
## Setup
-Place this project in your htdocs/ or public_html/

-Edit the credentials in config/database.php
```php
$this->host="localhost";
$this->username="root";//
$this->password="";
$this->dbname="preorder_db";
```
-import the database config/preorder_db.sql to your mysql database system

The UI is user Friendly and responsive.

[MyPortfolio](http://kataps.github.io/welcome-to-my-portfolio)
