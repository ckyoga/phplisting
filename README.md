Real Estate Lister
==================

Real estate listing manager created with PHP, MySQL, Bootstrap, Javascript, jQuery, and Ajax

Getting Started
----------------

These instructions will assist in getting the project up and running on your local machine. 


Installing
----------

Clone or download the repository from github

`git clone https://github.com/ckyoga/phplisting.git`


Checkout this repository and place the “phplisting” folder under your apache path.

Create a MySQL database named 'test'

Create the following drupal user on your new MySQL database.
- database user: userPHP
- database password: phppass

- mysql commands:

`CREATE USER 'userPHP'@'localhost' IDENTIFIED BY 'phppass';`

`GRANT ALL PRIVILEGES ON * . * TO 'userPHP'@'localhost';`

`FLUSH PRIVILEGES;`

Import the phplisting.sql file into the new `test` MySQL database

- MySQL import command

`/Applications/MAMP/Library/bin/mysql -u userPHP -p test < phplisting.sql`

Point your webserver document root to the "phplisting" folder

Load up /add-display.php or /listings-display.php

Author
------

**Caroline Burns** 

### Enjoy!
