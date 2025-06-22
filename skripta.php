<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webvijesti";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Greška pri povezivanju s bazom: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $autor = $_POST["autor"];
    $naslov = $_POST["naslov"];
    $sazetak = $_POST["sazetak"];
    $sadrzaj = $_POST["sadrzaj"];
    $kategorija = $_POST["kategorija"];
    $arhiva = isset($_POST["arhiva"]) ? 1 : 0;

    $uploadOk = true;
    $image_name = "";
    $target_dir = "images_upload/";

    if (isset($_FILES["slika"]) && $_FILES["slika"]["error"] == 0) {
        $ext = strtolower(pathinfo($_FILES["slika"]["name"], PATHINFO_EXTENSION));
        $allowed = ["jpg", "jpeg", "png"];
        $check = getimagesize($_FILES["slika"]["tmp_name"]);

        if ($check === false || !in_array($ext, $allowed)) {
            $uploadOk = false;
            $error = "Datoteka nije slika ili nije dopušteni format.";
        } else {
            $image_name = uniqid("img_") . "." . $ext;
            $target_file = $target_dir . $image_name;
            if (!move_uploaded_file($_FILES["slika"]["tmp_name"], $target_file)) {
                $uploadOk = false;
                $error = "Greška pri prijenosu slike.";
            }
        }
    } else {
        $uploadOk = false;
        $error = "Nije odabrana slika.";
    }

    if ($uploadOk) {
        $stmt = $conn->prepare("INSERT INTO clanci (autor, naslov, sazetak, sadrzaj, kategorija, slika, prikazi) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssi", $autor, $naslov, $sazetak, $sadrzaj, $kategorija, $image_name, $arhiva);

        if ($stmt->execute()) {
            echo '<!DOCTYPE html>
            <html lang="hr">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <!-- Logo i naslovna stranice -->
                <link rel="icon" type="image/x-icon" href="img/logoSamo.png">
                <title>Debate | Novi članak</title>
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

            <!-- Main Content -->
            <div class="container py-5">
                    <div class="text-center py-5 alert alert-success">
                        <h1 style="padding-bottom: 3rem; font-size: 2rem">✅ Članak je uspješno dodan!</h1>
                        <a href="unos.html" class="btn btn-primary"><- Unesi novi članak</a>
                    </div>
                    <div class="row justify-content-center"> 
                        <div class="col-lg-8 text-center">
                          <p class="text-uppercase text-primary fw-semibold mb-2">'.htmlspecialchars($kategorija).'</p>                      
                          <h1 class="fw-bold mb-3">'. htmlspecialchars($naslov) .'</h1>                      
                          <h5 class="text-muted fw-normal mb-1">'. htmlspecialchars($sazetak) .'</h5>                     
                          <img src="'.$target_file.'" class="img-fluid mb-4 rounded" alt="Tigres vs Monterrey">
                          <div class="text-start">
                            <p>'. htmlspecialchars($sadrzaj) .'</p>
                          </div>
                        </div>
                    </div>                    
            </div>
            
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
            </html>';
        } else {
            echo '<div class="alert alert-danger">❌ Greška pri unosu u bazu: ' . $stmt->error . '</div>';
        }
        $stmt->close();
    } else {
        echo '<div class="container py-5"><div class="alert alert-danger text-center">❌ ' . $error . '</div></div>';
    }

    $conn->close();
} else {
    echo '<div class="alert alert-danger">Forma nije poslana ispravno.</div>';
}
?>
