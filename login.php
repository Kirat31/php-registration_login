<?php
    session_start();
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        header("location: dashboard.php");
        exit;
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">      
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src = "https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js" > </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
        <script src="login-validations.js"></script>

        <title>Login</title>
        <style>
            .error{
                color: #FF0000;
            } 
        </style>
    </head>
    
    <body class="bg-dark">
        <div class="container bg-light" style="width: 400px" >
            <br>
            <h1 class="text-center text-primary">User-Login</h1>
            <br><br>
            <?php
                include ('conn.php');
                if($_SERVER['REQUEST_METHOD']=='POST'){
                    $email = $_REQUEST['email'];
                    $password = $_REQUEST['password'];

                    $sql= "SELECT * FROM userinfo WHERE email = '$email' AND password = '$password'";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                    $count = $result->num_rows;

                    if($count == 1){  
                        $_SESSION["loggedin"] = true;
                        $_SESSION["id"] = $id;
                        $_SESSION["fname"] = $row['fname'];
                        header("Location: dashboard.php?id= ".$row['id']." ");  
                    }  
                    else{  
                        echo "<h4> Login failed. Invalid username or password.</h4>";
                    }     
                }           
            ?> 
                      
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST"  enctype="multipart/form-data" name="form" id="form" novalidate >
                <div class="form-group">
                    <label for="email">Email address<span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" placeholder="Enter email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password <span class="text-danger">*</span></label>
                    <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
                </div>
                <br>
                <button type="submit" class="btn btn-primary" name="submit" id="submit">Login</button>
                <br><br>
                <p class="link"> New user? Register <a href="registration-form.php">here</a></p>
                <br><br><br><br><br><br>
            </form>
        </div>
    </body>
</html>

