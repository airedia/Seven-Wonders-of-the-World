# Seven Wonders of the World (Prototype)
Prototype for a site to book a place in the queue for one of the Seven Wonders of the World

## Premises and Packages
1. Xampp
2. Apache
3. Php
4. MySQL
5. MariaDB

## Programming Languages
1. HTML
2. CSS
3. Javascript
4. PHP
5. MySQL

## Suggestions for Deployment
To make your database secure, follow these steps:
<br>
1. Create a config.php and add information about your database connection, here is an example:

  ```
  <?php
  // Database configuration
  define('DB_HOST', 'your_database_host');
  define('DB_USERNAME', 'your_database_username');
  define('DB_PASSWORD', 'your_database_password');
  define('DB_NAME', 'your_database_name');
  ?>
  ```
2. In your _index.php_ file, at the top, before the _<!DOCTYPE HTML>_ tag, add this:
   ```
   <?php

   require 'config.php';

    $servername = DB_HOST;
    $username = DB_USERNAME;
    $password = DB_PASSWORD;
    $database = DB_NAME;
    
    $conn = mysqli_connect($servername, $username, $password, $database);
    
    
    $conn = mysqli_connect($servername, $username, $password, $database);
    
    if (!$conn) {
    
        echo "Connection failed!";
    
    }
    
    //rest of the code here
    
    ?>

   ``` 
<br>

__ATTENTION__: Before deployment, set the config.php file permission to _711_ in your _public_html_ directory, available with your chosen domain service.

## License
Only personal use. For any other use, please contact me here: https://forms.gle/G7TLUy2CUyBaNEEy7 .
