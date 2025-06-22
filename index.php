<?php
$servername = "localhost";
$username = "root";
$password = "";
$basename = "webvijesti";
$conn = mysqli_connect($servername, $username, $password, $basename);
mysqli_set_charset($conn, "utf8");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Logo i naslovna stranice -->
    <link rel="icon" type="image/x-icon" href="img/logoSamo.png">
    <title>Debate | Homepage</title>
    <!-- Bootstrap i CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
</head>
<body>

<!-- Header -->
<header class="py-3">
    <div class="container text-center">
        <a class="navbar-brand d-block mb-3" href="index.html">
            <img src="img/logo.png" alt="Debate" class="img-fluid logo-img">
        </a>
        <nav>
            <button class="btn btn-outline-secondary d-md-none dropdown-toggle" type="button" id="menuToggle"> Menu </button>

            <ul class="nav justify-content-center d-none d-md-flex mt-3">
                <li class="nav-item"><a class="nav-link custom-nav" href="index.php">HOME</a></li>
                <li class="nav-item"><a class="nav-link custom-nav" href="kategorija.php?kategorija=Svijet">SVIJET</a></li>
                <li class="nav-item"><a class="nav-link custom-nav" href="kategorija.php?kategorija=Sport">SPORT</a></li>
                <li class="nav-item"><a class="nav-link custom-nav" href="unos.html">DODAJ ČLANAK</a></li>

            </ul>

            <div id="dropdownMenu" class="d-md-none d-none mt-3">
                <ul class="list-group">
                    <li class="list-group-item"><a class="nav-link dropdownlink" href="index.php">HOME</a></li>
                    <li class="list-group-item"><a class="nav-link dropdownlink" href="kategorija.php?kategorija=Svijet">SVIJET</a></li>
                    <li class="list-group-item"><a class="nav-link dropdownlink" href="kategorija.php?kategorija=Sport">SPORT</a></li>
                    <li class="list-group-item"><a class="nav-link dropdownlink" href="unos.html">DODAJ ČLANAK</a></li>

                </ul>
            </div>
        </nav>
    </div>
</header>

<section class="container py-5">
    <h2 class="section-title">Sport</h2>
    <div class="row row-cols-1 row-cols-md-4 g-4">
        <?php
        $query = "SELECT * FROM clanci WHERE kategorija='Sport' AND prikazi=1 ORDER BY datum_objave DESC";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)):
            ?>
                <a href="clanak.php?id=<?php echo $row['id']; ?>" class="text-decoration-none">
                    <article class="col">
                        <div class="card h-100 border-0 shadow-sm news-card">
                            <img src="images_upload/<?php echo htmlspecialchars($row['slika']); ?>" class="card-img-top rounded-2" alt="...">
                            <div class="card-body">
                                <h3 class="card-title mb-2"><?php echo htmlspecialchars($row['naslov']); ?></h3>
                                <small class="text-secondary  d-block mb-1"><?php echo htmlspecialchars($row['sazetak']); ?></small>
                                <small class="text-muted">BY <?php echo htmlspecialchars($row['autor']); ?> - <?php echo date("d.m.Y", strtotime($row['datum_objave'])); ?></small>
                            </div>
                        </div>
                    </article>
                </a
        <?php endwhile; ?>
    </div>
</section>

<section class="container py-5">
    <h2 class="section-title">Svijet</h2>
    <div class="row row-cols-1 row-cols-md-4 g-4">
        <?php
        $query = "SELECT * FROM clanci WHERE kategorija='Svijet' AND prikazi=1 ORDER BY datum_objave DESC";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)):
            ?>
            <a href="clanak.php?id=<?php echo $row['id']; ?>" class="text-decoration-none">
                <article class="col">
                    <div class="card h-100 border-0 shadow-sm news-card">
                        <img src="images_upload/<?php echo htmlspecialchars($row['slika']); ?>" class="card-img-top rounded-2" alt="...">
                        <div class="card-body">
                            <h3 class="card-title mb-2"><?php echo htmlspecialchars($row['naslov']); ?></h3>
                            <small class="text-secondary  d-block mb-1"><?php echo htmlspecialchars($row['sazetak']); ?></small>
                            <small class="text-muted">BY <?php echo htmlspecialchars($row['autor']); ?> - <?php echo date("d.m.Y", strtotime($row['datum_objave'])); ?></small>
                        </div>
                    </div>
                </article>
            </a
        <?php endwhile; ?>
    </div>
</section>

<!-- Footer -->
<footer>
    <div class="footer-top py-4 text-white"></div>
    <div class="footer-bottom py-3 text-white">
        <div class="container text-left">
            <p>&copy; Copyright EL DEBATE. All rights reserved.</p>
        </div>
    </div>
</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="skripta.js"></script>
</body>
</html>