<?php
include("conn.php");

$sql = "SELECT * FROM userinfo";

$result = $conn->query($sql);
// $row = $result->fetch_assoc();
while($row = $result->fetch_assoc()){
   
    if($row['email'] == $_GET['email']){
        $check = 1;
        break;
    }else{
        $check = 0;
    }
}

if ($check == 1){
    echo 'false';
}
else{
    echo 'true';
}
 
?>