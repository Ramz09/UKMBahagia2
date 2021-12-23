<?php
include 'connect.php';

$username = $_POST['user'];
$password = $_POST['pass'];

$selectUser = "SELECT * FROM `users` WHERE `username` = '$username'";

$userQuery = $connection->query($selectUser);

if ($userQuery->num_rows > 0) {
    $row = $userQuery->fetch_assoc();
    $correctPassword = $row["password"];
    session_start();
    $_SESSION["userfound"] = TRUE;

    if($password != $correctPassword)
    {
        session_start();
        $_SESSION["passwordiscorrect"] = FALSE;
        header("Location:../loginjadi.php");
        echo "GAGAL LOGIN";
    }
    else
    {
        $id = $row["account_id"];

        session_start();
        
        $_SESSION["currentid"] = $id;
        $_SESSION["passwordiscorrect"] = TRUE;
        
        header("Location:../dashboard.php");
    }
}
else{
    session_start();
    $_SESSION["userfound"] = FALSE;
    header("Location:../loginjadi.php");
    echo "GAGAL LOGIN";
}
?>