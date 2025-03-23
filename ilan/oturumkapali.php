<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 0);
session_start();
// Kullanıcının adını alma
if (isset($_SESSION['eposta'])) {
  header("Location: ../ilan/ilan.php");
}
if (isset($_SESSION['rol'])) {
  $userRole = $_SESSION['rol'];
  if ($userRole === 'firma') {
    header("Location: ilan.php");
  } elseif ($userRole === 'stajyer') {
      header("Location: ilan.php");
  }
  elseif ($userRole === 'okul') {
    header("Location: ilan.php");
}
  else {
  }
} else {
  // Oturum açılmamış, giriş sayfasını göster
  
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
    <script src="../js/firmagiris.js"></script>
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
              <a href="../log/firmakayit.php"><button class="btn btn-ekle me-2 px-5" type="button"><i class="fa-solid fa-plus"></i> İlan
                Ver</button></a>
              <a href="../secim/secim.php"><button class="btn btn-login" type="button"><i class="fa-solid fa-user"></i> Giriş Yap / Kayıt Ol</button></a>
            </form>
          </div>
        </div> 
      </nav>
      <div class="container">
      <div class="row justify-content-center">
    <div class="ilan col-10">
        <div class="row">
      <div class="resim col-4">
        <?php echo '<div class="col-12"><img src="'.$row["logo"].'"alt=""></div>';?>
      </div>
      <div class="basliklar col-8">
      <?php echo '<div class="firma-isim col-12">'.$row["firmaisim"].'</div>';?>
      <?php echo '<div class="Bolum col-12">'.$row["bolum"].' Bölümü Stajyer Aranıyor</div>';?>
        <div class="basvuru col-12">
              <div class="col-12 col-sm-6 col-md-6 col-lg-4"><a href="../log/stajyergiris.php"><button class="btn btn-primary basvur"><i class="fa-solid fa-pen-to-square"></i> Başvur</button></a></div>
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