<?php
    include ('conn.php');
    
    $sql= "CREATE TABLE userinfo(
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        fname VARCHAR(15),
        lname VARCHAR(15),
        email VARCHAR(20),
        password VARCHAR(20)
        )";

        if ($conn->query($sql)){
            echo "Table created successfully";
        }
        else{
            echo "Error creating table".$conn->error();
        }

        $conn->close();

?>