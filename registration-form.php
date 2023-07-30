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
        <script src="validations.js"></script>
        <title>User Registration </title>
        <style>
            .error{
                color: #FF0000;
            }
        </style>
    </head>
    <?php
        include('conn.php');
        $fname =  $lname = $email  = $password = "";
        if ($_SERVER['REQUEST_METHOD']=='POST')
        {
            $fname = $_REQUEST['fname'];
            $lname = $_REQUEST['lname'];
            $email = $_REQUEST['email'];
            $password = $_REQUEST['password'];     
            
            $sql = "INSERT INTO userinfo (fname, lname, email, password)
                    VALUES ('$fname', '$lname', '$email', '$password')";
            
            if($conn->query($sql) === TRUE){
                $success = '<div class="alert alert-success" role="alert"> Registration Successful <p class="link">Click here to <a href="login.php">Login </a> </p> </div>';
            }
            else{
                echo "Error in connection".$conn->error();
            }
        }
    ?>
    <body class="bg-dark">
        <div class="container bg-light" style="width: 500px">
            <br>
            <h1 class="text-center text-info">User-Registration</h1>
            <br>
            <?php 
                if(!empty($success)){
                    echo $success;
                }
            ?>
            
            <br> <br>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST"  enctype="multipart/form-data" name="form" id="form" novalidate>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="fname"> First Name  <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="fname" placeholder="First name" required>
                    </div>
                    <div class="col-md-6">
                        <label for="lname"> Last Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="lname" placeholder="Last name" required>
                    </div>
                </div>
                <br>
                <div class="form-row">
                    <label for="email">Email address <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email" required>
                </div>
                <br>
                <div class="form-row">
                    <div class="col-md-6">
                        <label for="password">Password<span class="text-danger">*</span></label>
                        <input type="password" class="form-control"name="password" id="password" placeholder="Password" required>
                    </div>
                    <div class="col-md-6">
                        <label for="password">Confirm Password <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" name="cpassword" id="password1" placeholder="Password" required>
                    </div>
                </div>
                <br><br>
                <button type="submit" class="btn btn-primary" name="submit" id="submit">Register</button>
                <p class="link">Already registered? Login <a href="login.php">here</a></p>
                <br>
            </form>

        </div>   
    </body>    
</html>