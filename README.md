
Only Make Believe
====================

Some things you will need to get started:

 - Apache Server
 - MYSQL Server
 - PHP
 - Composer
 - Git

You may also have to change the owner settings on your 
"htdocs" or "var/www" folder so that you don't have to 
constantly enter your password to save.

To install dependencies, navigate to the project 
directory and execute:

```
$ composer install
```

## Setting up your database conection ##

To set up your database, navigate to include/db/dbconfig.php 
and put in your database settings there.
This file is set up to not commit to the server.
