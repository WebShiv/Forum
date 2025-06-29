<?php

include "_dbconnect.php";
$logincheck = false;

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $user = $_POST['Loginuser'];
    $pass = $_POST['loginpassword'];


    $query = "SELECT * FROM `users` WHERE `user_name` LIKE '$user'";
    $result = mysqli_query($conn,$query);
    $num = mysqli_num_rows($result);
    if($num === 1){
        $row = mysqli_fetch_assoc($result);
        if(password_verify($pass,$row['user_password'])){
            session_start();
            $_SESSION['username'] = $user;
            $logincheck = "Login";
            header("Location: /Forum/index.php?log=$logincheck");
        }
        else{
           $logincheck = "invalide";
           header("Location: /Forum/index.php?log=$logincheck");

        }
    }else{
       $logincheck = "nofound";
       header("Location: /Forum/index.php?log=$logincheck");
    }
}

?>