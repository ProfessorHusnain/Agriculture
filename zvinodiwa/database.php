<?php $db = new mysqli('localhost:3307','root','');


// Database name to check
$databaseName = "agric";
mysqli_select_db($db, $databaseName);

// Check if the database already exists
$query = "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$databaseName'";
$result = $db->query($query);

   if ($result->num_rows > 0) {
     
       // Select the database
      mysqli_select_db($db, $databaseName);
   } else {
    // Create the database
    $createDatabaseQuery = "CREATE DATABASE $databaseName";
    if ($db->query($createDatabaseQuery) === TRUE) {
        
             // Select the database
             mysqli_select_db($db, $databaseName);
             // Get the filename of the current script
             $currentFile = __FILE__;

              // Get the directory of the current script
              $currentDir = dirname($currentFile);

                // Get the filename of the file one step back
               $parentFile = dirname($currentDir) . DIRECTORY_SEPARATOR  . 'agric.sql';

               $sql = file_get_contents($parentFile);

              // Execute SQL queries
                if (mysqli_multi_query($db, $sql)) {
                        
                      } else {
                           echo "Error executing SQL queries: " . mysqli_error($db);
                          }
    } else {
        echo "Error creating database: " . $db->error;
    }
}


 

 
?>