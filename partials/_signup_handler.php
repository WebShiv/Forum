<?php
include "_dbconnect.php";
$user = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $user_name = htmlspecialchars($_POST['user']);
    $password = htmlspecialchars($_POST['passsword']);
    $cpwd = htmlspecialchars($_POST['cpassword']);

    $query = "SELECT * FROM `users` WHERE `user_name`='$user_name'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_num_rows($result);

    if ($row > 0) {
        $user = "exists";
        header("Location: /Forum/index.php?user=$user");
    } else {
        if ($password == $cpwd) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` (`srno`, `user_name`, `user_password`, `time`) 
                    VALUES (NULL, '$user_name', '$hash', current_timestamp())";
            $run = mysqli_query($conn, $sql);
            if ($run) {
                $user = "created";
                header("Location: /Forum/index.php?user=$user");
                
            } else {
                $user = "sqlerror";
                header("Location: /Forum/index.php?user=$user");
                
            }
        } else {
            $user = "passwordmismatch";
            header("Location: /Forum/index.php?user=$user");
            
        }
    }
}
?>