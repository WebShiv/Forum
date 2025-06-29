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
  $id = isset($_GET['Threadid']) ? (int) $_GET['Threadid'] : 0;
  $query = "SELECT * FROM `threads` WHERE `thred_id`=$id";
  $result = mysqli_query($conn, $query);
  while ($row = mysqli_fetch_assoc($result)) {
    $thred_title = htmlspecialchars($row['thred_title']);
    $thred_discription = htmlspecialchars($row['thred_disc']);
    $thred_user = htmlspecialchars($row['thred_user_id']);
  }

  ?>

    <?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['disc']) && !empty(trim($_POST['disc']))) {
    $content = $_POST['disc'];
    $user = $_SESSION['username'];
    $query = "INSERT INTO `comment` (`comment_id`, `comment_disc`, `thred_id`, `comment_time`, `comment_by`) VALUES (NULL, '$content', '$id', current_timestamp(), '$user');";
    $result = mysqli_query($conn,$query);

    if ($result) {
        echo '
            <div class="alert alert-info">
              <strong>Your Comment Added</strong> 
            </div>
        ';
    } else {
        echo '
            <div class="alert alert-danger">
              <strong>Comment not Added: ' .mysqli_error($conn)  . '</strong> 
            </div>
        ';
    }

} else {
    echo '
        <div class="alert alert-warning">
          <strong>Description is required</strong> 
        </div>
    ';
}

  ?>

    <div class="container my-5 border border-3 fade-item">

        <div class="bg-light p-5 rounded-3">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold"><?php echo $thred_title ?> </h1>
                <p class="col-md-8 fs-4">
                    <?php echo $thred_discription ?>
                </p>
                <div class="alert alert-info">
                    <strong>Forum Guidelines:</strong> Welcome to our peer-to-peer developer community! Please be
                    respectful, stay on topic, and keep discussions helpful and inclusive. Avoid spam, self-promotion,
                    and offensive content. We're here to learn, share, and grow together — let's keep the space positive
                    and productive for everyone.
                </div>
                <p><b>Posted by : <?php echo htmlspecialchars($thred_user); ?></b></p>
            </div>
        </div>
    </div>

    <div class="container fade-item">
        <?php if (isset($_SESSION['username'])): ?>
        <h1>Post The Comment</h1>
        <form action="<?php $_SERVER['REQUEST_URI']?>" method="post">
            <div class="modal-body ">
                <div class="mb-3">
                    <label for="disc" class="form-label">Comment</label>
                    <textarea class="form-control" id="disc" name="disc" placeholder="Write Comment"
                        rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-success mb-2">Add Comment</button>
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

    <div class="container mt-5 border border-3 ">

        <h1>Disscussion</h1>
        <?php

    // $id = $_GET['Threadid'];
    $query = "SELECT * FROM `comment` WHERE thred_id = $id";
    $result = mysqli_query($conn,$query);
    while ($row = mysqli_fetch_assoc($result)) {
      $id = $row['comment_id'];
      $user = $row['comment_by'];
      $content = $row['comment_disc'];
      echo '
          <div class="d-flex align-items-start p-3">
            <img src="./img/Useredefault.pnj.jpg" width="34px" class="me-3 rounded" alt="Media Image">
            <div>
            <p class="my-0"><b>'. htmlspecialchars($user) .'</b></p>
            
                <p>
                    ' . htmlspecialchars($content) . '
                </p>
            </div>
        </div>
      ';
    }
    ?>
<Script>
    $(document).ready(function(){
        $(".fade-item").hide().fadeIn(2000);
    })
</Script>
    </div>
    <?php include "./partials/footer.php" ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>