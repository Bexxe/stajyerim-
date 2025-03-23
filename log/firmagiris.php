<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 0);
session_start();
// Kullanıcının adını alma
if (isset($_SESSION['eposta'])) {
  header("Location: ../anasayfa/index.php");
}


// Veri tabanı bağlantısı oluşturuluyor
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "stajyerimdb";

$conn = mysqli_connect($servername, $username, $password, $dbname);
             
// Bağlantı kontrol ediliyor
if (!$conn) {
die("Bağlantı hatası: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StaYerim</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"crossorigin="anonymous"></script>
    <script src="../js/firmagiris.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/giris.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
          <a class="navbar-brand text-white" href="../anasayfa/index.php"><img src="../image/logo/logo.png" alt="Yüklenemedi"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link text-white me-2" aria-current="page" href="../anasayfa/index.php">AnaSayfa</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white me-2" href="../ilanlar/ilanlar.php">Staj İlanları</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white me-2" href="#">İletişim</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white me-2" href="#">Hakkımızda</a>
              </li>
            </ul>
            <form class="d-flex">
              <button class="btn btn-ekle me-2 px-5" type="button"><i class="fa-solid fa-plus"></i> İlan Ver</button>
              <a href="../secim/secim.php"><button class="btn btn-login" type="button"><i class="fa-solid fa-user"></i> Giriş Yap / Kayıt Ol</button></a>
            </form>
          </div>
        </div> 
      </nav>

    <div class="row col-sm-0 col-md-12">
        <div class="col-12 col-sm-12 col-md-6 col-lg-5 col-xl-4 giris">
        <div class="baslik text-center">Firma Giriş</div>
        <div class="box text-center">
            <form method="post">
                <input type="text" name="eposta" placeholder="E-posta">
                <br>
                <input id="sif" name="sifre" type="password" placeholder="Şifre">
                <br>
                <button onclick="type()" name="buton" class="buton" type="submit">Giriş Yap</button>
            </form>
            <?php
session_start();
if (isset($_POST['buton'])) {
    if (empty($_POST['eposta']) || empty($_POST['sifre'])) {
        echo "<div class='hata'>Lütfen Boş Alan Bırakmayın</div>";
    } else {
        $eposta = $_POST['eposta'];
        $sifre = $_POST['sifre'];

        // Kullanıcı adı ve parolayı veritabanındaki bilgilerle karşılaştır
        $sql = "SELECT * FROM firmalartb WHERE eposta='$eposta' AND sifre='$sifre'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 1) {
            // Oturum verilerini sakla
            $row = mysqli_fetch_assoc($result); // Veritabanından satırı al
            $_SESSION['eposta'] = $eposta;
            $_SESSION['rol'] = 'firma';
            $_SESSION['firmaisim'] = $row['firmaisim'];
            $_SESSION['id'] = $row['id'];

            // Kullanıcıyı ana sayfaya yönlendir
            header('Location: ../anasayfa/index.php');
        } else {
            echo "<div class='hata'>E-Posta Adresi Veya Parola Hatalı.</div>";
        }
    }
}
?>

        </div>
        </div>
        
        <div class="col-12 col-sm-12 col-md-6 col-lg-7 col-xl-8 section-right">
            <center>
                <div class="inclusive">
                <div class="title">
                   Hemen Giriş Yap Firmana Uygun Stajyerleri Bul :)
                </div>
                <div class="text">
                  Kolaylıkla Staj Yeri Bulmanın Tek adresi <br>
                  Endişelenme Bize Güven!
                </div>
            </div>
                <div class="col-8"><img src="../image/logo/elyazilogo.png" alt="Resim Yüklenemedi"></div>
            </center>
        </div>
    </div>
</body>
</html>