<?php
    
    //CONNECT TO MYSQL DATABASE USING MYSQLI
    $dbServername = "localhost";
    $dbUsename = "root";
    $dbPassword = "";
    $dbName = "youcodescrumboard";
    $conn = mysqli_connect( $dbServername, $dbUsename,$dbPassword, $dbName); 

    if(mysqli_connect_errno()){
        die ('failed to connect' . mysqli_connect_error());
     }

    //   if (mysqli_query($conn, $sql)) {
    //        echo "New records created successfully";
    //      } else {
    //        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    //      }
        
?>