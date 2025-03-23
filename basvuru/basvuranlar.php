<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 0);
session_start();

if (isset($_SESSION['eposta'])||isset($_SESSION['okul_isim'])) {
    $kulad = $_SESSION['okul_isim'];
    
}
else{
      header("Location: ../log/okulgiris.php");
      exit();
}

if (isset($_SESSION['rol'])) {
    $userRole = $_SESSION['rol'];
    if ($userRole === 'okul') {
      
    } elseif ($userRole === 'firma') {
      header("Location: ../anasayfa/index.php");
    }
    elseif ($userRole === 'stajyer') {
      header("Location: ../anasayfa/index.php");
  }
     else {
    }
} else {
  header("Location: ../anasayfa/index.php");
}
if (isset($_SESSION['id'])) {
  $okul_id = $_SESSION['id'];
}
if (isset($_GET['ilan_id'])) {
    $ilanId = $_GET['ilan_id'];
// Veritabanı bağlantısı
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
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/basvuru.css">
    <script src="../js/basvuru.js"></script>
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
      crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
      integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
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
        <button class="btn btn-login-lg" onclick="goster()" type="button"><i class="fa-solid fa-user"></i>  <?php echo $kulad;?>  <i class="fa-solid fa-caret-down"></i></button>
          <div class="box" id="box">
          <a href="../basvuru/basvuru.php"><div class="sec">Başvuranlar</div></a>
            <a href="../cikis.php"><div class="sec">Çıkış</div></a>
          </div>
        </form>
      </div>
    </div> 
  </nav>
  <div class="container">
  <center>
  <div class="row justify-content-center">
    <div class="baslik col-12 text-center">
       Bu İlana Başvuru Yapan Öğrenciler
    </div>
    <div class="col-12 col-sm-12 col-md-10 col-lg-9 col-xl-8 back mb-5">
    <?php        
$sqlli = "SELECT * FROM basvuruokul WHERE ilan_id='$ilanId' AND okul_id='$okul_id'";
$resultt = $conn->query($sqlli);
if ($resultt->num_rows > 0) {
// İlan bilgilerini al
while ($rows = $resultt->fetch_assoc()) {
        ?>
      <div class="col-12 col-sm-12 col-md-10 col-lg-10 col-xl-10 kutu ms-2 ms-sm-0 mb-2">
      <div class="stajyer-ilan">
        <div class="row">
        <div class="col-12 col-sm-3 profil">
          <i class="fa-solid fa-user"></i>
        </div>
        <div class="col-12 col-sm-4 body text-center">
        <?php echo '<div class="isim mt-0 mt-sm-3">'.$rows["ad"]." ".$rows["soyad"].'</div>';?>
        <?php echo '<div class="okul-no">Okul No:'.$rows["okul_no"].'</div>';?>
        </div>
        <div class="col-12 col-sm-4 text-sm-end body">
        <?php echo '<div class="okul-no mt-3 mt-sm-4">'.$rows["telno"].'</div>';?>
        <?php echo '<div class="okul-no">'.$rows["eposta"].'</div>';?>
        </div>
      </div>
      </div>

    </div>
    <?php
    }
  }
else {
      echo "Bu İlana Başvuran Öğrenci Yok.";
    }
}
?>
  </div>
  
</center>
</div>
</body>
</html>