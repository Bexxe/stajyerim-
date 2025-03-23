<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 0);
session_start();
if (isset($_SESSION['eposta'])) {
    $kulad = $_SESSION['eposta'];
}
else{
      header("Location: ../log/stajyergiris.php");
      exit();
}
if (isset($_SESSION['rol'])) {
  $userRole = $_SESSION['rol'];

  if ($userRole === 'stajyer') {

  } 
  elseif ($userRole === 'firma') {
      header("Location: ilanlar.php");
  }

  elseif ($userRole === 'okul') {
    header("Location: ilanlar.php");
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
  <title>StajYerim</title>
  <link rel="stylesheet" href="../css/bootstrap.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <script src="../js/ilanlar.js"></script>
  <link rel="stylesheet" href="../css/ilanlar.css">
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
            <a class="nav-link active text-white me-2" href="#">Staj İlanları</a>
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
  <div class="row justify-content-center ilanlar">
  <div class="col-12 col-sm-12 col-md-9 col-lg-7 col-xl-8 flitre"><button onclick="Filtre()" type="button"><i class="fa-solid fa-sliders"></i></button></i></div>
      <div class="col-12 col-sm-12 col-md-9 col-lg-7 col-xl-8">
      <?php
      
      if (isset($_POST["sehir"]) && isset($_POST["ilce"]) && isset($_POST["tarih"])&&isset($_POST["bolum"])) {
    $sehirler = $_POST["sehir"];
    $ilceler = $_POST["ilce"];
    $tarihler = $_POST["tarih"];
    $bolumler = $_POST["bolum"];
    $count = count($sehirler);
    for ($i = 0; $i < $count; $i++) {
    $sehir = $sehirler[$i];
    $ilce = $ilceler[$i];
    $tarih = $tarihler[$i];
    $bolum = $bolumler[$i];
    $sql = "SELECT * FROM ilanlartb WHERE il = ? AND ilce = ? AND tarih = ? AND bolum = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $sehir, $ilce, $tarih, $bolum);
    $stmt->execute();
    $result = $stmt->get_result();
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
     ?>
      <div class="col-12 text-center bulunamadi">
      <i class="fa-solid fa-magnifying-glass"></i>
      <div class="col-12 text">
        Aradığınız Kriterlerde İlan Bulunamadı
      </div>
    </div>
     <?php
    }
  }
  
} 
else if (isset($_POST["sehir"])) {
  $sehirler = $_POST["sehir"];
  $ilceler = $_POST["ilce"];
  for ($i = 0; $i < count($sehirler); $i++) {
    $sehir = $sehirler[$i];
    $ilce = $ilceler[$i];
    
    $sql = "SELECT * FROM ilanlartb WHERE il = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $sehir);
    $stmt->execute();
    $result = $stmt->get_result();
    
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
    } 
  }


}


else if (isset($_POST["ilce"])) {
  $sehirler = $_POST["sehir"];
  $ilceler = $_POST["ilce"];
  for ($i = 0; $i < count($sehirler); $i++) {
    $sehir = $sehirler[$i];
    $ilce = $ilceler[$i];
    
    $sql = "SELECT * FROM ilanlartb WHERE ilce = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s",$ilce);
    $stmt->execute();
    $result = $stmt->get_result();
    
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
    } 
  }
}

else if (isset($_POST["tarih"])) {
  $tarihler = $_POST["tarih"];
  for ($i = 0; $i < count($tarihler); $i++) {
    $tarih = $tarihler[$i];
    
    $sql = "SELECT * FROM ilanlartb WHERE tarih = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s",$tarih);
    $stmt->execute();
    $result = $stmt->get_result();
    
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
    }
  }
}
else if (isset($_POST["bolum"])) {
  $bolumler = $_POST["bolum"];
  for ($i = 0; $i < count($bolumler); $i++) {
    $bolum = $bolumler[$i];
    
    $sql = "SELECT * FROM ilanlartb WHERE bolum = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s",$bolum);
    $stmt->execute();
    $result = $stmt->get_result();
    
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
    } 
  }
}
else {
  $sql = "SELECT * FROM ilanlartb";
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
       <?php echo '<span class="konum-text">'.$row["il"] ."-".$row['ilce'].'</span>';?>
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
  ?>
  <div class="col-12 text-center bulunamadi">
  <i class="fa-solid fa-magnifying-glass"></i>
  <div class="col-12 text">
    Aradığınız Kriterlerde İlan Bulunamadı
  </div>
</div>
 <?php
}
}
?>

    </div>
  </div>
</div>

<div class="nav-left-sm">
  <form method="post">
    <div class="col-2 col-sm-2 col-md-3 col-lg-3 col-xl-3 col-xxl-3 nav-left" id="navleft">
      <button class="kapat" type="button" onclick="kapat()"><i class="fa-solid fa-xmark"></i></button>
      <div class="nav">
        
  <div class="multiselect">
  <div class="selectBox" onclick="showbolum()">
    <select id="bolumSelect">
      <option class="i">Staj Yapmak İstediğiniz Bölümü Seçin</option>
    </select>
    <div class="overSelect"></div>
  </div>
  <div id="checkbolum">
    <label class="iner" for="bilisim">
      <input type="checkbox" name="bolum[]" value="BİLİŞİM" id="bilisim"/>BİLİŞİM<span class="checkmark"></span>
    </label>
    <label class="iner" for="makine">
      <input type="checkbox" name="bolum[]" value="MAKİNE" id="makine" />MAKİNE<span class="checkmark"></span>
    </label>
    <label class="iner" for="elektrik">
      <input type="checkbox" name="bolum[]" value="ELEKTİRİK" id="elektrik"/>ELEKTRİK<span class="checkmark"></span>
    </label>
  </div>
</div>
    <div class="multiselect">
  <div class="selectBox" onclick="showCheckboxes()">
    <select id="ilSelect">
      <option class="i">İl</option>
    </select>
    <div class="overSelect"></div>
  </div>
  <div id="checkboxes">
    <label class="iner" for="kocaeli">
      <input type="checkbox" name="sehir[]" value="kocaeli" id="kocaeli"/>KOCAELİ<span class="checkmark"></span>
    </label>
    <label class="iner" for="gumushane">
      <input type="checkbox" name="sehir[]" value="gümüşhane" id="gumushane" />GÜMÜŞHANE<span class="checkmark"></span>
    </label>
    <label class="iner" for="istanbul">
      <input type="checkbox" name="sehir[]" value="istanbul" id="istanbul"/>İSTANBUL<span class="checkmark"></span>
    </label>
  </div>
</div>

<div class="multisecim" id="ilceContainer">
  <div class="secim-box" onclick="secimbox()">
    <select id="ilceSelect">
      <option class="i">İlçe</option>
    </select>
    <div class="oversecim"></div>
  </div>
  <div id="checkbox">
  </div>
</div>


<div class="multiilan">
  <div class="ilan-box" onclick="ilanbox()">
    <select id="bolumSelect">
      <option class="i">İlan Tarihi </option>
</select>
<div class="overilan"></div>
  </div>
  <div id="ilanlar">
    <label class="ilan" for="bugun">
      <input type="checkbox" name="tarih[]" id="bugun" value="<?php echo date("Y")."/".date("m")."/".date("d"); ?>" />Bugün Yayınlanan<span class="checkmarkkk"></span>
    </label>
    <label class="ilan" for="ikigun">
      <input type="checkbox" name="tarih[]" id="ikigun" value="<?php echo date("Y")."/".date("m")."/".date("d")-2; ?>" />Son 2 Günde Yayınlanan<span class="checkmarkkk"></span>
    </label>
    <label class="ilan" for="yedi">
      <input type="checkbox" name="tarih[]" id="yedi" value="<?php echo date("Y")."/".date("m")."/".date("d")-7; ?>" />Son 7 Günde Yayınlanan<span class="checkmarkkk"></span>
    </label>
    
  </div>
<button class="ilan-Ara" name="ara" type="submit">İlanı Ara</button>
</div>

        </div>
      </div>
      
    </div>
    </form>
  </div>
</body>
</html>
<?php


?>