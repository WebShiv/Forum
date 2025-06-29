<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Idiscuss</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
        <script src="/JS/jquery-3.7.1.js"></script>
         <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

    <?php include "./partials/nav.php" ?>
    <?php include "./partials/_dbconnect.php" ?>
    <?php  
    if(isset($_GET['user'])){
    $r = htmlspecialchars($_GET['user']);
    if($r == 'created'){
            echo '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>SignUp Success!</strong> You should Go to Login !
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
                '; 
    }elseif($r == 'exists'){
        echo '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>User Already Exist!</strong> You should Try Unique Usrname !
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
                '; 
    }elseif($r == 'passwordmismatch'){
        echo '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Confirm Correct Password!</strong> You should ReEntering password !
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
                '; 
    }
}
    ?>
    <?php  
    if(isset($_GET['log'])){
    $r = $_GET['log'];
    if($r == 'Login'){
            echo '
                <div class="alert alert-Info alert-dismissible fade show" role="alert">
  <strong>Login Success!</strong> Explore the Dissussion!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
                '; 
    }elseif($r == 'invalide'){
        echo '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Invalide Credentials!</strong> You Should ReLogin !
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
                '; 
    }elseif($r == 'nofound'){
        echo '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>User Not Found!</strong> please Signup First !
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
                '; 
    }
}
    ?>


    <div id="carouselExampleIndicators" class="carousel slide fade-item" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./img/python-programming-syntax-4k-1s-1600x900.jpg" class="d-block w-100" alt="..."
                    style="height: 400px; object-fit: cover;">
            </div>
            <div class="carousel-item">
                <img src="./img/OIP.jpg" class="d-block w-100" alt="..." style="height: 400px; object-fit: cover;">
            </div>
            <div class="carousel-item">
                <img src="./img/reactjs-javascript-programming-programming-language-hd-wallpaper-preview.jpg"
                    class="d-block w-100" alt="..." style="height: 400px; object-fit: cover;">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


    <div class="container my-5 fade-item">
        <h2 class="text-center mb-4">IDiscuss - Categories</h2>

        <div class="d-flex flex-wrap justify-content-center gap-4">
            <?php
            $query = "SELECT * FROM `categrories`";
            $result = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['id'];
                echo '
                <div class="card" style="width: 18rem;">
                    <img src="./img/python-programming-syntax-4k-1s-1600x900.jpg" class="card-img-top" alt="..." style="height: 180px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title"><a href="Threadslist.php?Catid='. $id .'">' . htmlspecialchars($row['categeory']) . ' </a></h5>
                        <p class="card-text">' . htmlspecialchars(substr($row['c_discription'], 0, 90)) . '...</p>
                        <a  href="Threadslist.php?Catid='. $id .'" class="fetchbtn btn btn-primary">Explore</a>
                    </div>
                </div>';
            }
            ?>
        </div>
    </div>
    <div class="container" id="container">

    </div>

    <?php include "./partials/footer.php" ?>

    <script>
    $(document).ready(function () {
        $(".navbar").hide().fadeIn(2000);
        $(".fade-item").hide().fadeIn(2000);


        });
</script>

   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous">
    </script>
</body>

</html>