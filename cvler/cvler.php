<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 0);
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
if (isset($_SESSION['id'])) {
  $id = $_SESSION['id'];
}
if (isset($_SESSION['rol'])) {
  $userRole = $_SESSION['rol'];
  if ($userRole === 'stajyer') {

  } 
  elseif ($userRole === 'okul') {
    header("Location: ../anasayfa/index.php");
  }
  elseif ($userRole === 'firma') {
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
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/cvler.css">
    <script src="../js/ilan.js"></script>
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
  <center>
  <div class="row justify-content-center">
    <div class="baslik col-12 text-center">
       Oluşturduğunuz Cvler
    </div>
    <?php 
          $sql = "SELECT * FROM cvdb WHERE kullanici_id='$id'";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
          ?>
      <form method="post">
    <div class="col-12 col-sm-12 col-md-10 col-lg-9 col-xl-8 back mb-3">
      <div class="col-12 col-sm-12 col-md-10 col-lg-9 col-xl-8 kutu">
        <div class="row">
        <div class="col-12 col-sm-2 profil">
          <i class="fa-solid fa-newspaper"></i>
        </div>
        <div class="col-12 col-sm-5 body text-center">
          <?php echo '<div class="isim mt-0 mt-sm-3">'.$row["cvisim"].'</div>';?>
          <?php echo '<div class="okul-no">'.$row["ad"].$row["soyad"].'</div>';?>
        </div>
        <div class="col-12 col-sm-4 text-sm-end body">
          <div class="cop mt-1"><button type="submit" name="cop"><i class="fa-solid fa-trash"></i></button></div>
        <?php echo '<div class="okul-no mt-3 mt-sm-4">'.$row["telno"].'</div>';?>
        <?php echo '<div class="mail">'.$row["eposta"].'</div>';?>
        </div>
      </div>
      </div>
    </div>
    </form>
    <?php
          }
        } else {
            echo "Veritabanında kayıt bulunamadı.";
        }
        
      ?>
  </div>
</center>
</div>
</body>
</html>
<?php
if(isset($_POST['cop'])){
  $sql = "DELETE FROM cvdb WHERE kullanici_id = '$id'";
  if ($conn->query($sql) === TRUE) {
    echo'<script>window.location.href="cvler.php";</script>';
} else {
    echo "Hata: " . $sql . "<br>" . $conn->error;
}
}
?>