
Only Make Believe
====================

Some things you will need to get started:

 - Apache Server
 - MYSQL Server
 - PHP
 - Composer
 - Git
 - mcrypt (security)

You may also have to change the owner settings on your 
"htdocs" or "var/www" folder so that you don't have to 
constantly enter your password to save.

To install dependencies, navigate to the project 
directory and execute:

```
$ composer install
```

### Aliases ###

I have some aliases in bashrc to help with server management. To add, 
open GEdit and open up .bashrc, which is a hidden file in your user directory.
Then paste at the bottom:

```bash
# lamp aliases
alias lamp-start='sudo /usr/sbin/apache2ctl start'
alias lamp-stop='sudo /usr/sbin/apache2ctl stop'
alias lamp-restart='sudo /usr/sbin/apache2ctl restart'
```

### mcrypt ###

To install mcrypt on Linux (it is automatically installed on Windows distros of PHP5.3+),
run the commands:

```
$ sudo apt-get install php5-mcrypt
$ sudo php5enmod mcrypt
$ lamp-restart 
```

## Setting up your database conection ##

To set up your database, navigate to include/db/dbconfig.php 
and put in your database settings there.
This file is set up to not commit to the server.
