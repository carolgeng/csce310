<?php
session_start();
    include("db.php");
    include("functions.php");

    $user_data = check_login($conn);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Landing</title>
    </head>
    <body>
        <a href="logout.php">Logout</a>
        <h1>This is the landing page</h1>
        <br>
        Hello, <?php echo $user_data['first_name']; ?>
    </body>
</html>