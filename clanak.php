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

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Nevažeći ID članka.");
}

$id = (int)$_GET['id'];

$stmt = $conn->prepare("SELECT * FROM clanci WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("Članak nije pronađen.");
}

$clanak = $result->fetch_assoc();

$naslov = $clanak['naslov'];
$sazetak = $clanak['sazetak'];
$sadrzaj = $clanak['sadrzaj'];
$kategorija = $clanak['kategorija'];
$slika = $clanak['slika'];
$datum = date("d.m.Y", strtotime($clanak['datum_objave']));
$autor = $clanak['autor'];
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Logo i naslovna stranice -->
    <link rel="icon" type="image/x-icon" href="img/logoSamo.png">
    <title>Debate | <?php echo htmlspecialchars($naslov); ?></title>
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
    <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
            <p class="text-uppercase text-primary fw-semibold mb-2"><?php echo htmlspecialchars($kategorija); ?></p>
            <h1 class="fw-bold mb-3"><?php echo htmlspecialchars($naslov); ?></h1>
            <h5 class="text-muted fw-normal mb-1"><?php echo htmlspecialchars($sazetak); ?></h5>
            <p class="text-muted mb-4"><small>Autor: <?php echo htmlspecialchars($autor); ?> | Datum: <?php echo $datum; ?></small></p>
            <img src="images_upload/<?php echo htmlspecialchars($slika); ?>" class="img-fluid mb-4 rounded" alt="Slika">
            <div class="text-start">
                <p><?php echo nl2br(htmlspecialchars($sadrzaj)); ?></p>
            </div>
        </div>
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

