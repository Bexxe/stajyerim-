<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 0);
session_start();
if (isset($_SESSION['eposta'])) {
  header("Location: ../anasayfa/index.php");
}
if (isset($_SESSION['rol'])) {
  $userRole = $_SESSION['rol'];
  if ($userRole === 'firma') {
    header("Location: index.php");
  } elseif ($userRole === 'stajyer') {
      header("Location: index.php");
  }
  elseif ($userRole === 'okul') {
    header("Location: index.php");
}
  else {
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


<!-- Oturum açıkken gösterilecek sayfa içeriği -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>StaYerim</title>
  <link rel="stylesheet" href="../css/bootstrap.css">
  <link rel="stylesheet" href="../css/style.css">
  <script src="../js/bootstrap.js"></script>
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
      <a class="navbar-brand text-white" href="#"><img src="../image/logo/logo.png" alt="yüklenemedi"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active text-white me-2" aria-current="page" href="#">AnaSayfa</a>
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
        <a href="../log/firmakayit.php"><button class="btn btn-ekle me-2 px-5" type="button"><i class="fa-solid fa-plus"></i> İlan Ver</button></a>
          <a href="../secim/secim.php"><button class="btn btn-login" type="button"><i class="fa-solid fa-user"></i> Giriş Yap / Kayıt Ol</button></a>
        </form>
      </div>
    </div>
  </nav>
  <section>
  <div class="container">
      <div class="row justify-content-center align-self-center">
        <div class="col-10 col-sm-8 col-md-5 col-lg-4 p-2 search-back">
        <form action="../ilanlar/ilanlar.php" method="post">
            <div class="row">
              <div class="col-12">
                <div class="multiselect">
                  <div class="selectBox" onclick="showCheckboxes()">
                    <select>
                      <option class="i">Şehir</option>
                    </select>
                    <div class="overSelect"></div>
                  </div>
                  <div id="checkboxes">
                    <label class="iner" for="kocaeli">
                      <input type="checkbox" id="kocaeli" name="sehir[]" value="kocaeli" /><span class="yazi">kocaeli</span>
                      <span class="checkmark"></span>
                    </label>
                    <label class="iner" for="gümüshane">
                      <input type="checkbox" id="gümüshane" name="sehir[]" value="gümüşhane" /><span class="yazi">gümüşhane</span>
                      <span class="checkmark"></span>
                    </label>
                    <label class="iner" for="istanbul">
                      <input type="checkbox" id="istanbul" name="sehir[]" value="istanbul" /><span class="yazi">istanbul</span>
                      <span class="checkmark"></span>
                    </label>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12 my-1">
              <div class="multibolum">
                  <div class="selectbolum" onclick="showbolum()">
                    <select>
                      <option class="i">Aradığınız Staj Bölümünü Seçin</option>
                    </select>
                    <div class="bolumSelect"></div>
                  </div>
                  <div id="bolumbox">
                    <label class="bolum" for="bilisim">
                      <input type="checkbox" id="bilisim" name="bolum[]" value="Bilişim" />Bilişim<span class="checkmarkk"></span>
                    </label>
                    <label class="bolum" for="makine">
                      <input type="checkbox" id="makine" name="bolum[]" value="Makine" />Makine<span class="checkmarkk"></span>
                    </label>
                    <label class="bolum" for="elektirik">
                      <input type="checkbox" id="elektrik" name="bolum[]" value="Elektrik" />Elektrik<span class="checkmarkk"></span>
                    </label>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <button class="form-control"><i class="fa-solid fa-magnifying-glass"></i> Ara</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="container">
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <div class="d-flex justify-content-center justify-content-lg-start">
          <div class="col-6 col-lg-4 mt-4 mt-lg-6">
            <img src="../image/firma-img/Konum-cizim.png" class="img-fluid w-100" alt="">
          </div>
        </div>
      </div>
  </section>
  <div class="custom-shape-divider-top-1677618414">
    <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
      <path
        d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"
        class="shape-fill"></path>
    </svg>
  </div>
  
  <div class="container">
    <div class="row mb-5">
      <div class="col-12 text-start">
        <div class="suggested">
          <h3>Son Yayınlanan İlanlar</h3>
        </div>
      </div>
    </div>
  </div>
  <div class="container">

    <div class="row ilanlar justify-content-center">
      <div class="col-10 justify-content-center">
        <div class="row justify-content-center">
          <div class="col-12">
            <div class="row">
              <?php 
              $sql = "SELECT * FROM ilanlartb";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
              ?>
              <div class="col-12 col-sm-6 col-lg-3 mb-3 justify-content-center">
              <a href="../ilan/ilan.php?ilan_id=<?php echo $row["ilan_id"]; ?>">
                <div class="card">
                <?php echo '<img src="'.$row["logo"].'" alt="">';?>
                  <div class="card-body">
                  <?php echo '<h4 class="card-title">'.$row["firmaisim"].'</h4>';?>
                  <?php echo '<p class="card-text">'.$row["bolum"].' Stajyer Aranıyor</p>';?>
                  <div class="konum">
                  <i class="fa-sharp fa-solid fa-location-dot"></i>
                  <?php echo '<span class="konum-text">'.$row["il"] ."-".$row['ilce'].'</span>';?>
                </div>
                  </div>
                </div>
                </a>
              </div>
              <?php
            }
          } else {
              echo "Veritabanında kayıt bulunamadı.";
          }
          
        ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br><br><br><br><br><br><br>
   <footer>
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-6 text-center mt-5">
          <span class="baslik">Sosyal Medya Hesaplarımız</span>
          <div class="row mt-3 justify-content-center">
            <div class="col-2 baslik">
              <a href=""><i class="fa-brands fa-facebook"></i></a>
            </div>
            <div class="col-2 baslik">
              <a href=""><i class="fa-brands fa-instagram"></i></a>
            </div>
            <div class="col-2 baslik">
              <a href=""><i class="fa-brands fa-youtube"></i></a>
            </div>
            <div class="col-2 baslik">
              <a href=""><i class="fa-brands fa-twitter"></i></a>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-6 text-center mt-5">
          <span class="baslik">Stajyerim Mobil Uygulamasını Buradan İndirebilirsiniz!</span>
          <div class="row mt-3 justify-content-center">
            <div class="col-12">
              <a href=""><img width="200" src="../image/google-play-indir-butonu.png" alt=""></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-sm-3 text-center mt-5">
          <span class="baslik">KURUMSAL</span>
          <div class="row mt-3 justify-content-center">


          </div>
        </div>
        <div class="col-12 col-sm-3 text-center mt-5">
          <span class="baslik">İLETİŞİM</span>
          <div class="row mt-3 justify-content-center">
            
          </div>
        </div>
        <div class="col-12 col-sm-3 text-center mt-5">
          <span class="baslik">YARDIM</span>
          <div class="row mt-3 justify-content-center">
           
          </div>
        </div>
      </div>
    </div>
   </footer>
  <script src="../js/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
</body>
</html>