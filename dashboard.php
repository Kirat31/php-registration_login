<?php
    session_start();
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: login.php");
        exit;
    }

?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">      
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <title>Dashboard</title>
    </head>
    <body class="bg-dark">
        <?php
            include('conn.php');

            $id = $_GET['id'];
            $sql ="SELECT * FROM userinfo WHERE id='".$id."' ";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
        ?>

        <div class="container bg-light" style="width: 600px">
        <br><br>
            <p> Hey, <?php echo htmlspecialchars($_SESSION["fname"]); ?> !! <br>
            Welcome to the dashboard. <br></p>
            <p>If you wish to change the details entered, click <a href="update.php?id=<?php echo $row['id']; ?>" >here</a></p>
            <br><br><br>
            <a href="logout.php" class="btn btn-danger" onclick="return confirm('Are you sure you want to logout?');">Logout</a>
            <br><br>
            <br><br>
            <br><br><br><br><br><br><br><br><br><br>
        </div>
    </body>
</html>