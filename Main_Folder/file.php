<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checking</title>
</head>
<body>
    <h1>Inserting User</h1>

    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="number" placeholder="Enter your ID" name="uidname"> <br> <br>
        <input type="text" placeholder="Enter your name" name="uname"> <br><br> 
        <input type="password" placeholder="Enter your password" name="upass"> <br><br>
        <input type="text" placeholder="Enter your email" name="umail"><br><br>
        <input type="number" placeholder="Enter deposited amount" name="udeposit"> <br><br>
        <input type="submit" name="btnsbmt">
    </form>


    <?php
            if(isset($_POST['btnsbmt'])){
            $connection = mysqli_connect("localhost", "root", "", "crud");

    // Check the connection
            if (!$connection) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $userID = $_POST['uidname'];
            $userPassword = $_POST['upass'];
            $userName = $_POST['uname'];
            $userMail = $_POST['umail'];
            $udeposited = $_POST['udeposit'];

    // Use prepared statements to avoid SQL injection
            $sql = "INSERT INTO tbl_user (u_id, u_password, u_name, u_email, u_deposit) 
                    VALUES ($userID, '$userPassword', '$userName', '$userMail', $udeposited)";
            $stmt = mysqli_prepare($connection, $sql);

            if (mysqli_stmt_execute($stmt)) {
                echo "Data inserted successfully!";
            } else {
                echo "Error: " . mysqli_error($connection);
            }

    // Close the statement and the connection
            mysqli_stmt_close($stmt);
            mysqli_close($connection);
            }
?>




</body>
</html>
