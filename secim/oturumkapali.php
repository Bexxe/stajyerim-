<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 0);
session_start();
// Kullanıcının adını alma
if (isset($_SESSION['eposta'])) {
  header("Location: ../anasayfa/index.php");
}
if (isset($_SESSION['rol'])) {
  $userRole = $_SESSION['rol'];

  // Kullanıcı tipine göre farklı sayfaları gösterme
  if ($userRole === 'firma') {
    header("Location: ../anasayfa/index.php");
      // Firma Sahibi kullanıcılar için sayfa
  } elseif ($userRole === 'stajyer') {
      // Normal kullanıcılar için sayfa
      header("Location: ../anasayfa/index.php");
  } else {
  }
} else {
  // Oturum açılmamış, giriş sayfasını göster
  
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "stajyerimdb";

$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantı kontrolü
if ($conn->connect_error) {
    die("Veritabanı bağlantısı başarısız oldu: " . $conn->connect_error);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StajYerim</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/secim.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
          <a class="navbar-brand text-white" href="../anasayfa/index.php"><img src="../image/logo/logo.png" alt="yüklenemedi"></a>
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
                <a class="nav-link active text-white me-2" href="../ilanlar/ilanlar.php">Staj İlanları</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white me-2" href="#">İletişim</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white me-2" href="#">Hakkımızda</a>
              </li>
            </ul>
            <form class="d-flex">
            <a href="../log/firmakayit.php"><button class="btn btn-ekle me-2 px-5" type="button"><i class="fa-solid fa-plus"></i> İlan
                Ver</button></a>
              <a href="secim.php"><button class="btn btn-login" type="button"><i class="fa-solid fa-user"></i> Giriş Yap / Kayıt Ol</button></a>
            </form>
          </div>
        </div> 
      </nav>

    <div class="container">
    <div class="for">
    <div class="row justify-content-center">
    <div class="firma col-10 col-sm-5 col-md-4 col-lg-4 col-xl-4">
        <div class="icon col-12 text-center">
            <i class="fa-solid fa-right-to-bracket"></i>
        </div>
        <div class="aciklama col-12 text-center">
            Firma hesabınıza giriş yapıp hızlıca ilan verin
            firmanıza uygun stajyerler bulabilirsiniz.
        </div>
        <div class="butn col-12 text-center">
       <a href="../log/firmagiris.php"><button type="button" class="text-center">Firma hesabınıza Giriş Yapın</button></a>
        </div>
    </div>

    <div class="firma col-10 col-sm-5 col-md-4 col-lg-4 col-xl-4">
        <div class="icon col-12 text-center">
            <i class="fa-solid fa-user-plus"></i>
        </div>
        <div class="aciklama col-12 text-center">
            firmanıza hesap oluşturarak kolayca firmanıza uygun stajyerler bulabilirsiniz.
        </div>
        <div class="butn col-12 text-center">
        <a href="../log/firmakayit.php"><button type="button" class="text-center">Firma hesabı oluştur</button></a>
        </div>
    </div>
</div>


<div class="row justify-content-center">
    <div class="firma col-10 col-sm-5 col-md-4 col-lg-4 col-xl-4">
        <div class="icon col-12 text-center">
            <i class="fa-solid fa-right-to-bracket"></i>
        </div>
        <div class="aciklama col-12 text-center">
            Hesabınız Varsa Hemen Giriş Yaparak Kendinize Uygun Firmalar Bulabilirsiniz
        </div>
        <div class="butn col-12 text-center">
        <a href="../log/stajyergiris.php"><button type="button" class="text-center">Stajyer hesabınıza giriş yap</button></a>
        </div>
    </div>

    <div class="firma col-10 col-sm-5 col-md-4 col-lg-4 col-xl-4">
        <div class="icon col-12 text-center">
            <i class="fa-solid fa-user-plus"></i>
        </div>
        <div class="aciklama col-12 text-center">
            Hesabınız Yoksa Hemen Stajyer Hesabı Oluşturarak Kendinize Uygun Firmalar Bulabilirsiniz
        </div>
        <div class="butn col-12 text-center">
        <a href="../log/stajyerkayit.php"><button type="button" class="text-center">Stajyer hesabı oluştur</button></a>
        </div>
    </div>
</div>
<div class="row justify-content-center mb-5">
    <div class="firma col-10 col-sm-5 col-md-4 col-lg-4 col-xl-4">
        <div class="icon col-12 text-center">
            <i class="fa-solid fa-right-to-bracket"></i>
        </div>
        <div class="aciklama col-12 text-center">
            Hesabınız Varsa Hemen Giriş Yaparak Öğrencilerinizi Yönlendirin!
        </div>
        <div class="butn col-12 text-center">
        <a href="../log/okulgiris.php"><button type="button" class="text-center">Okul hesabınıza giriş yap</button></a>
        </div>
    </div>

    <div class="firma col-10 col-sm-5 col-md-4 col-lg-4 col-xl-4">
        <div class="icon col-12 text-center">
            <i class="fa-solid fa-user-plus"></i>
        </div>
        <div class="aciklama col-12 text-center">
            Hesabınız Yoksa Hemen Okul Hesabı Oluşturarak Öğrencilerinizi Yönlendirin!
        </div>
        <div class="butn col-12 text-center">
        <a href="../log/okulkayit.php"><button type="button" class="text-center">Okul hesabı oluştur</button></a>
        </div>
    </div>
</div>
</div>
</div>
</body>

</html>