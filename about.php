<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <title>Idiscuss</title>
</head>

<body>
    <?php include "./partials/nav.php" ?>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-10 bg-white border border-2 rounded-4 shadow-sm p-4">

                <h1 class="text-center mb-4 border-bottom pb-2">About Our Forum</h1>

                <p class="lead text-secondary">
                    Welcome to our collaborative tech community. This forum was created for passionate learners, coders,
                    and curious minds who believe in growing together through peer-to-peer learning.
                </p>

                <h3 class="mt-4 border-bottom pb-2">Our Mission</h3>
                <p>
                    Our mission is to offer a focused, respectful space where anyone—from beginners to advanced
                    developers—can share knowledge, ask questions, and help others with practical, real-world solutions.
                </p>

                <h3 class="mt-4 border-bottom pb-2">Why Join Us?</h3>
                <ul class="list-group list-group-flush mb-4">
                    <li class="list-group-item">🤝 Peer-to-peer support and learning</li>
                    <li class="list-group-item">📚 Well-organized topic categories</li>
                    <li class="list-group-item">🛠️ Practical, real-time coding help</li>
                    <li class="list-group-item">🌍 Inclusive for all experience levels</li>
                </ul>

                <h3 class="border-bottom pb-2">Technology Stack</h3>
                <p>
                    Built using <strong>PHP</strong>, <strong>MySQL</strong>, <strong>Bootstrap 5</strong>, and
                    <strong>JavaScript</strong>, our forum is fast, responsive, and mobile-friendly.
                </p>

                <h3 class="border-bottom pb-2">Stay Connected</h3>
                <p>
                    Got feedback, questions, or suggestions? We'd love to hear from you.
                </p>

                <div class="text-center mt-4">
                    <a href="/Forum/contact.php" class="btn btn-outline-primary rounded-pill px-4">Contact Us</a>
                </div>

            </div>
        </div>
    </div>


    <?php include "./partials/footer.php" ?>


    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous">
    </script>

</body>

</html>