<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to thread</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include "./partials/nav.php" ?>
    <?php include "./partials/_dbconnect.php" ?>




    <?php
          $id = $_GET['Catid'];
          $query = "SELECT * FROM `categrories` WHERE `id` =$id";
          $result = mysqli_query($conn, $query);
          while ($row = mysqli_fetch_assoc($result)) {
            $catname = $row['categeory'];
            $catdisc = $row['c_discription'];
  }
  
  ?>

    <?php  
    $method = $_SERVER['REQUEST_METHOD'];
    if($method == 'POST' && isset($_POST['submit']) && $_POST['problem'] && $_POST['disc']){

      $th_title = htmlspecialchars($_POST['problem']);
      $th_disc = htmlspecialchars($_POST['disc']);
      $user = $_SESSION['username'];

      $query = "INSERT INTO `threads` (`thred_id`, `thred_title`, `thred_disc`, `thred_cat_id`, `thred_user_id`, `Time`) VALUES (NULL, '$th_title', '$th_disc', '$id', '$user', current_timestamp());";
      $result = mysqli_query($conn, $query);
      if($result){
        echo '
        <div class="alert alert-info">
          <strong>Resuld added</strong> 
        </div>
      ';
      }else{
         echo '
        <div class="alert alert-info">
          <strong>Something Wwent worng</strong> 
        </div>
      ';
      }
    }else{
         echo '
        <div class="alert alert-info">
          <strong>All Fields Are Require for the Problems</strong> 
        </div>
      ';
    }
    ?>

    <div class="container my-5 border border-3 fade-item">

        <div class="bg-light p-5 rounded-3">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold">Welcome to Our <?php echo $catname ?> Forum!</h1>
                <p class="col-md-8 fs-4">
                    <?php echo $catdisc ?>
                </p>
                <div class="alert alert-info">
                    <strong>Forum Guidelines:</strong> Welcome to our peer-to-peer developer community! Please be
                    respectful, stay on topic, and keep discussions helpful and inclusive. Avoid spam, self-promotion,
                    and offensive content. We're here to learn, share, and grow together — let's keep the space positive
                    and productive for everyone.
                </div>
            </div>
        </div>
    </div>z

    <div class="container border border-1 fade-item">
        <?php if (isset($_SESSION['username'])): ?>
        <h1>Ask Questions</h1>
        <form action="<?php $_SERVER['REQUEST_URI']?>" method="post">
            <div class="modal-body ">
                <div class="mb-3">
                    <label for="problem" class="form-label">Problem</label>
                    <input type="text" class="form-control" id="problem" name="problem" placeholder="Ask Problem">
                </div>
                <div class="mb-3">
                    <label for="disc" class="form-label">Problem Discription</label>
                    <textarea class="form-control" id="disc" name="disc" placeholder="Problem Discription"
                        rows="3"></textarea>
                </div>
                <button type="submit" name="submit" class="btn btn-success mb-2">Submit</button>
            </div>
        </form>
        <?php else: ?>
        <?php
          echo '
           <div class="alert alert-info">
          <strong>Login First TO ask questions</strong> 
        </div>
          ';
         ?>
        <?php endif; ?>
    </div>

    <div class="container mt-5 border border-3 fade-item">

        <h1>Browes Questions</h1>
        <?php

    $query = "SELECT * FROM `threads` WHERE `thred_cat_id`=$id";
    $result = mysqli_query($conn,$query);
    $num = mysqli_num_rows($result);
    $noresult = true;
    while ($row = mysqli_fetch_assoc($result)) {
      $noresult = false;
      $id = $row['thred_id'];
      $t_title = $row['thred_title'];
      $t_disc = $row['thred_disc'];
      $user = $row['thred_user_id'];
        echo '
          <div class="d-flex align-items-start p-3">
            <img src="./img/Useredefault.pnj.jpg" width="34px" class="me-3 rounded" alt="Media Image">
            <div>
              <p class="my-0"><b>'. $user .'</b></p>
                <h5> <a href="./thred.php?Threadid='.$id.'">' . $t_title . '</a></h5>
                <p>
                    ' . $t_disc . '
                </p>
            </div>
        </div>
      ';
    }
    if($noresult){
      echo '
        <div class="alert alert-info">
          <strong>There are no questions</strong> You are the first person who ask questions plzz ask questions
        </div>
      ';
    }
    ?>
    <script>
      $(document).ready(function(){
        $(".fade-item").hide().fadeIn(2000);
      })
    </script>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>