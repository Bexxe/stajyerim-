<?php
session_start();
// Kullanıcının adını alma
if (isset($_SESSION['eposta'])) {
    $kulad = $_SESSION['eposta'];
}
else{
      // Oturum açılmamışsa, giriş sayfasına yönlendir
      header("Location: ../log/stajyergiris.php");
      exit();
}
if (isset($_SESSION['rol'])) {
  $userRole = $_SESSION['rol'];
  if ($userRole === 'stajyer') {
    
  } elseif ($userRole === 'firma') {
      header("Location: ilan.php");
  }
  elseif ($userRole === 'okul') {
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
if (isset($_SESSION['id'])) {
  $id = $_SESSION['id'];
}
if (isset($_SESSION['okul_id'])) {
  $okul_id = $_SESSION['okul_id'];
}
if (isset($_GET['ilan_id'])) {
  $ilanId = $_GET['ilan_id'];

  // Veritabanından ilanı seç
  $sql = "SELECT * FROM ilanlartb WHERE ilan_id = '$ilanId'";
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
            <a href="../cv/cv.php"><button class="btn btn-login me-2" type="button"><i class="fa-solid fa-pen-to-square"></i> CV Oluştur</i></button></a>
          <button class="btn btn-login-lg" onclick="goster()" type="button"><i class="fa-solid fa-user"></i>  <?php echo $kulad;?>  <i class="fa-solid fa-caret-down"></i></button>
          <?php
            $sql = "SELECT * FROM bildirimtb WHERE stajyer_id='$id' AND durum='bakilmadi'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) == 1) {
             ?>
             <a class="bildirim" href="../bildirim/bildirim.php"><div class="bell"><i class="fa-solid fa-bell"></i><i class="fa-solid fa-circle"></i></div></a>
             <?php
            }
            else{
              ?>
             <a class="bildirim" href="../bildirim/bildirim.php"><div class="bell"><i class="fa-solid fa-bell"></i></div></a>
              <?php
            }
          ?>
          <div class="box" id="box">
          <a href="../basvuru/basvurdugum.php"><div class="sec">Başvurduğum Firmalar</div></a>
          <a href="../cvler/cvler.php"><div class="sec">Cvleriniz</div></a>
            <a href="../cikis.php"><div class="sec">Çıkış</div></a>
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
        <?php echo '<div class="col-12"><img src="'.$row["logo"].'"alt=""></div>';?>
      </div>
      <div class="basliklar col-8">
      <?php echo '<div class="firma-isim col-12">'.$row["firmaisim"].'</div>';?>
      <?php echo '<div class="Bolum col-12">'.$row["bolum"].' Bölümü Stajyer Aranıyor</div>';?>
        <div class="col-12">
          <form method="post">
              <div class="col-12 col-sm-6 col-md-6 col-lg-4"><button type="button" class="btn btn-primary basvur" data-bs-toggle="modal" data-bs-target="#exampleModal"></i><i class="fa-solid fa-pen-to-square"></i> Başvur</button></div>
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
?>
<?php
  // Veritabanından ilanı seç
  $sql2 = "SELECT * FROM cvdb WHERE kullanici_id = $id";
  $result2 = $conn->query($sql2);

  if ($result2->num_rows > 0) {
    // İlan bilgilerini al
    foreach ($result2 as $row2) {
?>
<form method="post">
         <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hangi Cv İle Başvurmak İstersiniz</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-12">
                        <select name="isim" id="">
                            <option value="">Cv Seçin</option>
                            <?php
                            foreach ($result2 as $row2) {
                                echo '<option value="'.$row2["cvisim"].'">'.$row2["cvisim"].'</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="col-5 col-sm-3">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
                    </div>
                    <div class="col-5 col-sm-4">
                        <button type="submit" name="gonder" class="btn btn-primary">Gönder</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
<?php
    }
    } else {
      ?>
         <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">İlana Başvurmak İçin Cv Oluşturmalısınız</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-footer justify-content-center">
                <div class="col-5 col-sm-4">
                        <a href="../cv/cv.php"><button type="submit" name="gonder" class="btn btn-primary">Cv Oluştur</button></a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
      <?php
    }
  
  
  if (isset($_POST['gonder'])) {
    $cvisim = $_POST['isim'];
    $sql = "SELECT * FROM cvdb WHERE kullanici_id = '$id' AND cvisim = '$cvisim'";

    $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        // İlan bilgilerini al
        while ($row = $result->fetch_assoc()) {
          $ad =  $row["ad"];
          $soyad = $row["soyad"];
          $il = $row["il"];
          $ilce = $row["ilce"];
          $adres = $row["adres"];
          $eposta = $row["eposta"];
          $telno = $row["telno"];
          $okul = $row["okul"];
          $okulno = $row["okul_no"];
          $bolum = $row["bolum"];
          $dil = $row["dil"];
          $yetenek = $row["yetenek"];
        }
        $sql = "SELECT * FROM basvuruokul WHERE stajyer_id='$id' AND ilan_id='$ilanId'";
        $result = mysqli_query($conn, $sql);
        $sql2 = "SELECT * FROM basvurufirma WHERE stajyer_id='$id' AND ilan_id='$ilanId'";
        $result2 = mysqli_query($conn, $sql2);
        if (mysqli_num_rows($result) > 0 || mysqli_num_rows($result2) > 0) {
          echo '
          ';
      } else {
          // Yeni kullanıcı ekleme işlemi
          $sql = "INSERT INTO basvuruokul (okul_id, stajyer_id, ilan_id, ad, soyad, il, ilce, adres, eposta, telno, okul, okul_no, bolum, dil, yetenek) VALUES ('$okul_id', '$id', '$ilanId', '$ad', '$soyad', '$il', '$ilce', '$adres', '$eposta', '$telno', '$okul', '$okulno', '$bolum', '$dil', '$yetenek')";
                        
          if (mysqli_query($conn, $sql)) {
              // Kayıt işlemi başarılı, başka bir sayfaya yönlendir
              echo "kayıt başarılı";
          } else {
              echo "Hata: " . $sql . "<br>" . mysqli_error($conn);
          }
          $sql = "INSERT INTO basvurdugum (okul_id, stajyer_id, ilan_id, ad, soyad, il, ilce, adres, eposta, telno, okul, okul_no, bolum, dil, yetenek, durum) VALUES ('$okul_id', '$id', '$ilanId', '$ad', '$soyad', '$il', '$ilce', '$adres', '$eposta', '$telno', '$okul', '$okulno', '$bolum', '$dil', '$yetenek' ,'Okul Onayında')";
                        
          if (mysqli_query($conn, $sql)) {
              // Kayıt işlemi başarılı, başka bir sayfaya yönlendir
              echo "kayıt başarılı";
          } else {
              echo "Hata: " . $sql . "<br>" . mysqli_error($conn);
          }
      }
      
      }
    }
  }
  else {
    echo "Geçersiz ilan ID.";
  }
    $conn->close();
?>
