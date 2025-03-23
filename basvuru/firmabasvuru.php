<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 0);
session_start();

if (isset($_SESSION['eposta'])) {
  $kulad = $_SESSION['eposta'];
  $firmaisim = $_SESSION['firmaisim'];
}
else{
      header("Location: ../log/okulgiris.php");
      exit();
}

if (isset($_SESSION['rol'])) {
    $userRole = $_SESSION['rol'];
    if ($userRole === 'firma') {
      
    } elseif ($userRole === 'okul') {
        header("Location: ilan.php");
    }
    elseif ($userRole === 'stajyer') {
      header("Location: ilan.php");
  }
     else {
    }
} else {
    header("Location: ilan.php");
}

if (isset($_SESSION['id'])) {
  $firma_id = $_SESSION['id'];
}
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
          <a href="../ilanver/ilanver.php"><button class="btn btn-ekle me-2 px-5" type="button"><i class="fa-solid fa-plus"></i> İlan Ver</button></a>
        <div class="dropdown login">
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fa-solid fa-building"></i>  <?php echo $firmaisim;?>
        </button>
        <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#">sahinberat255@gmail.com</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="#">Another action</a></li>
        <li><a class="dropdown-item" href="#">Action</a></li>
        <li><a class="dropdown-item" href="#">Something else here</a></li>
  </ul>
</div>
        </form>
      </div>
    </div> 
  </nav>
  <div class="container">
  <center>
  <div class="row justify-content-center">
    <div class="baslik col-12 text-center">
       İlanınıza Başvuran Stajyerler
    </div>
    <div class="col-12 col-sm-12 col-md-10 col-lg-9 col-xl-8 back mb-5">
    <?php 
$sql = "SELECT * FROM basvurufirma WHERE firma_id='$firma_id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {
$ilanid = $row["ilan_id"];       
$sqlli = "SELECT * FROM ilanlartb WHERE ilan_id='$ilanid'";
$resultt = $conn->query($sqlli);
if ($resultt->num_rows > 0) {
while ($rows = $resultt->fetch_assoc()) {
        ?>
       <form method="post">
      <div class="col-12 col-sm-12 col-md-10 col-lg-10 col-xl-10 kutu ms-2 ms-sm-0 mb-5">
      <div class="stajyer-ilan">
        <div class="row">
          <div class="col-12 text-start ms-4 my-3 mb-5 firma">
            Stajyerin Bilgileri
          </div>
        </div>
        <div class="row">
        <div class="col-12 col-sm-3 profil">
          <i class="fa-solid fa-user"></i>
        </div>
        <div class="col-12 col-sm-4 body text-center">
        <?php echo '<div class="isim mt-0 mt-sm-3">'.$row["ad"]." ".$row["soyad"].'</div>';?>
        <?php echo '<div class="okul-no">Okul No:'.$row["okul_no"].'</div>';?>
        </div>
        <div class="col-12 col-sm-4 text-sm-end body">
        <?php echo '<div class="okul-no mt-3 mt-sm-4">'.$row["telno"].'</div>';?>
        <?php echo '<div class="okul-no">'.$row["eposta"].'</div>';?>
        </div>
      </div>
      </div>
      <div class="firma-ilan">
      <div class="row">
        <div class="col-12 text-start ms-4 my-2 firma">
          Başvurduğu İlanın Bilgileri
        </div>
      </div>
      <div class="row">
        <div class="col-12 col-sm-3 profil">
        <?php echo '<img src="'.$rows["logo"].'"alt="">';?>
        </div>
        <div class="col-12 col-sm-4 body mt-4 text-center">
        <?php echo '<div class="isim mt-0 mt-sm-4">'.$rows["firmaisim"].'</div>';?>
        <?php echo '<div class="okul-no">'.$rows["bolum"].' Bölümü Stajyer Aranıyor</div>';?>
        </div>
        <div class="col-12 col-sm-4 mt-5 text-sm-end body">
        <?php echo '<div class="okul-no mt-sm-4">'.$rows["telno"].'</div>';?>
        <?php echo '<div class="okul-no">'.$rows["mail"].'</div>';?>
        </div>
      </div>
      </div>
    </div>
    </form>
    <?php
       }
      }
     }
    } 
    else {
      echo "İlan bulunamadı.";
    }
?>
    </div>
  </div>
</center>
</div>
</body>
</html>