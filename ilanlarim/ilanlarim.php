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
if (isset($_SESSION['id'])) {
  $id = $_SESSION['id'];
}
if (isset($_SESSION['rol'])) {
  $userRole = $_SESSION['rol'];
  if ($userRole === 'firma') {

  } 
  elseif ($userRole === 'okul') {
    header("Location: ../anasayfa/index.php");
  }
  elseif ($userRole === 'stajyer') {
    header("Location: ../anasayfa/index.php");
}
   else {
  }
} else {
  header("Location: ilanlar.php");
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
    <title>StaYerim</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/ilanlarim.css">
    <script src="../js/ilanlarim.js"></script>
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
      </div>
          <?php
            $sql = "SELECT * FROM bildirimfirmatb WHERE firma_id='$id' AND durum='bakilmadi'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) == 1) {
             ?>
            <div class="dropdown bell">
            <button class="btn-secondary" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <div class="bell"><i class="fa-solid fa-bell"></i><i class="fa-solid fa-circle"></i></div>
            </button>
            <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">sahinberat255@gmail.com</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
      </ul>
    </div>
             <?php
            }
            else{
              ?>
            <div class="dropdown bell">
            <button class="btn-secondary" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <div class="bell"><i class="fa-solid fa-bell"></i></i></div>
            </button>
            <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">sahinberat255@gmail.com</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
      </ul>
    </div>
              <?php
            }
          ?>
        </form>
            </form>
          </div>
        </div>
      </nav>
      <div class="container">
        <div class="row justify-content-center ilanlar">
        <div class="yayinlanan text-center">Yayınladığınız İlanlar</div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-10 col-xl-8">
            <?php 
          $sql = "SELECT * FROM ilanlartb WHERE kullanici_id='$id'";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
          ?>
            <a href="../ilan/ilan.php?ilan_id=<?php echo $row["ilan_id"]; ?>">
              <div class="card">
                <div class="row">
                  <div class="col-4 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                    <?php echo '<img src="'.$row["logo"].'" class="card-img-top" alt="">';?>
                  </div>
                  <div class="col-8 col-sm-9 col-md-9 col-lg-9 col-xl-9">
                    <div class="card-body">
                    <?php echo '<h5 class="baslik">'.$row["firmaisim"].'</h5>';?>
                    <?php echo '<p class="yayimlayan">'.$row["bolum"].' Stajyer Aranıyor</p>';?>
                      <div class="konum">
                        <i class="fa-sharp fa-solid fa-location-dot"></i>
                        <?php echo '<span class="konum-text">'.$row["il"]."-".$row['ilce'].'</span>';?>
                      </div>
                      <?php echo '<div class="tarih text-end">'.$row["tarih"].' tarihinde yayınlandı</div>';?>
                    </div>
                  </div>
                </div>
              </div>
            </a>
            <?php
          }
        } else {
            echo "Veritabanında kayıt bulunamadı.";
        }
        
      ?>
          </div>
        </div>
      </div>
</body>
</html>