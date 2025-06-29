 <?php 
    require "./_dbconnect.php";
    session_start();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if( isset($_SESSION['username'])){
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $massage = htmlspecialchars($_POST['message']);
        $user = $_SESSION['username'];
        $query = "INSERT INTO `contact` (`name`, `email`, `massage`, `user_id`, `time`) VALUES ('$name', '$email', '$massage', '$user', current_timestamp())";
        $run = mysqli_query($conn,$query);
        if($run){
          
            $_SESSION['usermail'] = $email;
            $_SESSION['username'] = $name;
            
            header("Location: /Forum/mail_send.php");
        }
    }else{
      header("Location: /Forum/mail_send.php");
    }
    }
    ?>