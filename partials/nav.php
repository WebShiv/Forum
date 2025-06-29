<?php
session_start();
include "_dbconnect.php";

$query = "SELECT * FROM `categrories`";
$run = mysqli_query($conn,$query);

?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<nav class="navbar navbar-expand-lg bg-body-tertiary " >
    <div class="container-fluid bg-dark py-3">
        <a class="navbar-brand text-white" href="#">IDiscuss</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item"> 
                    <a class="nav-link active text-white" aria-current="page" href="/Forum/index.php">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white" href="/Forum/about.php">About</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Category
                    </a>

                    <ul class="dropdown-menu">
                        <?php
                        while($row = mysqli_fetch_assoc($run)){
                            $id = $row['id'];
                                echo '
                            <li><a class="dropdown-item" href="/Forum/Threadslist.php?Catid='. $id .'">' . htmlspecialchars($row['categeory']) . '</a></li>

                            ';                      
                        }
                        ?>
                    </ul>

                </li>

                <li class="nav-item">
                    <a class="nav-link text-white" aria-current="page" href="/Forum/contact.php">Contact</a>
                </li>
            </ul>


            <form class="d-flex mx-5" role="search" method="get" action="serch.php">
                <input class=" form-control me-2" name="search" type="search" placeholder="Search..."
                    aria-label="Search">
                <button class="btn btn-success" type="submit">Search</button>
            </form>

            <div class="d-flex gap-2">
                <?php if (!isset($_SESSION['username'])): ?>
                <button class="btn btn-sm btn-outline-success ml-2 p-2" data-bs-toggle="modal"
                    data-bs-target="#loginModalLabel">Login</button>
                <button class="btn btn-sm btn-outline-success mx-2 p-2" data-bs-toggle="modal"
                    data-bs-target="#signupModalLabel">Signup</button>
                <?php else: ?>
                <?php echo '
            <img src="./img/Useredefault.pnj.jpg" width="34px" class="me-3 rounded" alt="Media Image">
            <p class="text-light my-2">' . htmlspecialchars($_SESSION['username']) . '</p>
            <div>
              '; ?>
                <button class="btn btn-sm btn-outline-success mx-2 p-2" data-bs-toggle="modal"
                    data-bs-target="#logoutmodallabel">Logout</button>
                <?php endif; ?>

            </div>


        </div>
    </div>
</nav>
<?php include "./partials/logout_modal.php"?>
<?php include "./partials/login_modal.php"?>
<?php include "./partials/signup_modal.php"?>