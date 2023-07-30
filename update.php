<?php
session_start();
 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
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
        <script src="update-validations.js"></script>
        <title>User Information Update </title>
        <style>
            .error{
                color: #FF0000;
            }
        </style>
    </head>
      
    <body>
    <?php
        include('conn.php');

        $id = $_GET['id'];
        $sql ="SELECT * FROM userinfo WHERE id='".$id."' ";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        if ($_SERVER['REQUEST_METHOD']=='POST')
        {
            $id = $_REQUEST['id'];
            $fname = $_REQUEST['fname'];
            $lname = $_REQUEST['lname'];
            $email = $_REQUEST['email'];
            $password = $_REQUEST['password'];     

            $s = "UPDATE userinfo SET fname='".$fname."', lname='".$lname."', email='".$email."', password='".$password."' WHERE id='".$id."'";
            if($conn->query($s) === TRUE){
                header("Location: dashboard.php?id=".$id." ");
            }
            else{
                echo "Error".$conn->error();
            }
        }
        else{
    ?>
        <div class="container" style="width: 600px">
            <br>
            <h1 class="text-center text-success">Update User-Information</h1>
            <br><br>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST"  enctype="multipart/form-data" name="form" id="form" novalidate>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="fname"> First Name  <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="fname" placeholder="First name" id="fname" value="<?php echo $row['fname']; ?>" required>
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="lname"> Last Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="lname" placeholder="Last name" id="lname" value="<?php echo $row['lname']; ?>" required>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label for="email">Email address <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email" value="<?php echo $row['email']; ?>" required>
                </div>
                <br>
                <div class="form-row">
                    <div class="col-md-6">
                        <label for="password">Password<span class="text-danger">*</span></label>
                        <input type="password" class="form-control"name="password" id="password" placeholder="Password" value="<?php echo $row['password']; ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="password">Confirm Password <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" name="cpassword" placeholder="Password" value="<?php echo $row['password']; ?>" required>
                    </div>
                </div>
                <br><br>
                <button class="btn btn-primary" type="submit" name="submit" id="submit">Update</button>
            </form>
        </div>   
        <?php } ?> 
    </body>   
</html>
            
    