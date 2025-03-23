<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 0);
session_start();
// Kullanıcının adını alma
if (isset($_SESSION['eposta'])) {
    $kulad = $_SESSION['eposta'];
    $firmaisim = $_SESSION['firmaisim'];
}
else{
      // Oturum açılmamışsa, giriş sayfasına yönlendir
      header("Location: ../log/firmagiris.php");
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

if (isset($_GET['ilan_id'])) {
  $ilanId = $_GET['ilan_id'];

  // Veritabanından ilanı seç
  $sql = "SELECT * FROM ilanlartb WHERE ilan_id = $ilanId";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // İlan bilgilerini al
    while ($row = $result->fetch_assoc()) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StaYerim</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"crossorigin="anonymous"></script>
    <script src="../js/ilan.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/ilan.css">
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
      <div class="row justify-content-center">
    <div class="ilan col-10">
        <div class="row">
      <div class="resim col-4">
        <?php echo '<div class="col-10"><img src="'.$row["logo"].'"alt=""></div>';?>
      </div>
      <div class="basliklar col-8">
      <?php echo '<div class="firma-isim col-12">'.$row["firmaisim"].'</div>';?>
      <?php echo '<div class="Bolum col-12">'.$row["bolum"].' Bölümü Stajyer Aranıyor</div>';?>
        <div class="basvuru col-12">
          <form method="post">
          </form>
        </div>
      </div>
      <div class="baslik col-12">
        Firma Hakkında
      </div>
      <div class="tanim text-center col-12">
      <?php echo $row["hakkinda"];?>
        </div>
        <div class="baslik col-12">
        Firma kriterleri
      </div>
      <div class="tanim text-center col-12">
      <?php echo $row["kriter"];?>
        </div>
        <div class="baslik col-12">
         Firma Adres
        </div>
        <div class="adres text-center col-12">
          <i class="fa-sharp fa-solid fa-location-dot"></i> <?php echo $row["adres"];?>
        </div>
        <div class="harita text-center">
        <?php echo $row["yerlestirme"];?>
      </div>
      <div class="baslik col-12">
        Firma İletişim
       </div>
       <div class="iletisim text-center col-12">
        <i class="fa-solid fa-phone"></i>  Tel No: <?php echo $row["telno"];?><br>
        <i class="fa-solid fa-envelope"></i> E-Posta: <?php echo $row["mail"];?>
    </div>
    <div class="iletisim text-center col-12">
    <?php echo '<div class="tarih text-end">'.$row["tarih"].' tarihinde yayınlandı</div>';?>
    </div>
  </div>
    </div>
    </div>
    </div>
</div>
</body>
</html>
<?php
    }
    } else {
      echo "İlan bulunamadı.";
    }
  } else {
    echo "Geçersiz ilan ID.";
  }
  
  $conn->close();
  
?>