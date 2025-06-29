<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Idiscuss</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>

<body>

    <?php include "./partials/nav.php" ?>
    <?php include "./partials/_dbconnect.php" ?>

    <div class="container mt-5 border border-3 ">

        <h1>Serch results <?php echo htmlspecialchars($_GET['search']) ?></h1>
        <?php  
        $noresult = true;
        $serch = htmlspecialchars( $_GET['search']);
        $query = "SELECT * FROM threads WHERE MATCH (thred_title,thred_disc) against('$serch')";
        $run = mysqli_query($conn, $query);
        while($row = mysqli_fetch_assoc($run)){
        $title = htmlspecialchars($row['thred_title']);
        $discription = htmlspecialchars($row['thred_disc']);
        $id = htmlspecialchars($row['thred_id']);
        $noresult =false;
        echo '
          <div class="d-flex align-items-start p-3">
            <div>
                <h5> <a href="./thred.php?Threadid='.$id.'">' . htmlspecialchars($title) . '</a></h5>
                <p>
                    ' . htmlspecialchars($discription) . '
                </p>
            </div>
        </div>
      ';
    }
    if($noresult){
      echo '
        <div class="alert alert-info">
          <strong>not Found Any Search</strong>
        </div>
      ';
    }
    ?>
    </div>

    <?php include "./partials/footer.php" ?>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous">
    </script>
</body>

</html>