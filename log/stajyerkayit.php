<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 0);
session_start();
// Kullanıcının adını alma
if (isset($_SESSION['eposta'])) {
  header("Location: ../anasayfa/index.php");
}

// Veri tabanı bağlantısı oluşturuluyor
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "stajyerimdb";

$conn = mysqli_connect($servername, $username, $password, $dbname);
             
// Bağlantı kontrol ediliyor
if (!$conn) {
die("Bağlantı hatası: " . mysqli_connect_error());
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StaYerim</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"crossorigin="anonymous"></script>
    <script src="../js/stajyer.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/kayit.css">
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
              <button class="btn btn-ekle me-2 px-5" type="button"><i class="fa-solid fa-plus"></i> İlan
                Ver</button>
              <a href="../secim/secim.php"><button class="btn btn-login" type="button"><i class="fa-solid fa-user"></i> Giriş Yap / Kayıt Ol</button></a>
            </form>
          </div>
        </div> 
      </nav>

    <div class="row col-sm-0 col-md-12">
        <div class="col-12 col-sm-12 col-md-6 col-lg-5 col-xl-4 kayit">
        <div class="baslik text-center">StajYer Kayıt</div>
        <div class="box text-center">
            <form method="post">
                <input name="adsoyad" type="text" placeholder="Ad Soyad"><br>
                <select class="il" onchange="ilceGoster()" name="il" id="il">
                    <option value="">İl Giriniz</option>
                    <option value="Adana">Adana</option>
                    <option value="AdıYaman">AdıYaman</option>
                    <option value="Afyonkarahisar">Afyonkarahisar</option>
                    <option value="Ağrı">Ağrı</option>
                    <option value="Aksaray">Aksaray</option>
                    <option value="Amasya">Amasya</option>
                    <option value="Ankara">Ankara</option>
                    <option value="Antalya">Antalya</option>
                    <option value="Ardahan">Ardahan</option>
                    <option value="Artvin">Artvin</option>
                    <option value="Aydın">Aydın</option>
                    <option value="Balıkesir">Balıkesir</option>
                    <option value="Bartın">Bartın</option>
                    <option value="Batman">Batman</option>
                    <option value="Bayburt">Bayburt</option>
                    <option value="Bilecik">Bilecik</option>
                    <option value="Bingöl">Bingöl</option>
                    <option value="Bolu">Bolu</option>
                    <option value="Burdur">Burdur</option>
                    <option value="Bursa">Bursa</option>
                    <option value="Çanakkale">Çanakkale</option>
                    <option value="Çankırı">Çankırı</option>
                    <option value="Çorum">Çorum</option>
                    <option value="Denizli">Denizli</option>
                    <option value="Diyarbakır">Diyarbakır</option>
                    <option value="Düzce">Düzce</option>
                    <option value="Edirne">Edirne</option>
                    <option value="Elazığ">Elazığ</option>
                    <option value="Erzincan">Erzincan</option>
                    <option value="Erzurum">Erzurum</option>
                    <option value="Eskişehir">Eskişehir</option>
                    <option value="Gaziantep">Gaziantep</option>
                    <option value="Giresun">Giresun</option>
                    <option value="Gümüşhane">Gümüşhane</option>
                    <option value="Hakkâri">Hakkâri</option>
                    <option value="Hatay">Hatay</option>
                    <option value="Iğdır">Iğdır</option>
                    <option value="Isparta">Isparta</option>
                    <option value="İstanbul">İstanbul</option>
                    <option value="İzmir">İzmir</option>
                    <option value="Kars">Kars</option>
                    <option value="Kastamonu">Kastamonu</option>
                    <option value="Kayseri">Kayseri</option>
                    <option value="Kırklareli">Kırklareli</option>
                    <option value="Kırşehir">Kırşehir</option>
                    <option value="Kocaeli">Kocaeli</option>
                    <option value="Konya">Konya</option>
                    <option value="Kütahya">Kütahya</option>
                    <option value="Malatya">Malatya</option>
                    <option value="Manisa">Manisa</option>
                    <option value="Kahramanmaraş">Kahramanmaraş</option>
                    <option value="Mardin">Mardin</option>
                    <option value="Muğla">Muğla</option>
                    <option value="Muş">Muş</option>
                    <option value="Nevşehir">Nevşehir</option>
                    <option value="Niğde">Niğde</option>
                    <option value="Ordu">Ordu</option>
                    <option value="Rize">Rize</option>
                    <option value="Sakarya">Sakarya</option>
                    <option value="Samsun">Samsun</option>
                    <option value="Siirt">Siirt</option>
                    <option value="Sinop">Sinop</option>
                    <option value="Sivas">Sivas</option>
                    <option value="Tekirdağ">Tekirdağ</option>
                    <option value="Tokat">Tokat</option>
                    <option value="Trabzon">Trabzon</option>
                    <option value="Tunceli">Tunceli</option>
                    <option value="Şanlıurfa">Şanlıurfa</option>
                    <option value="Uşak">Uşak</option>
                    <option value="Van">Van</option>
                    <option value="Yozgat">Yozgat</option>
                    <option value="Zonguldak">Zonguldak</option>
                    <option value="Aksaray">Aksaray</option>
                    <option value="Bayburt">Bayburt</option>
                    <option value="Karaman">Karaman</option>
                    <option value="Kırıkkale">Kırıkkale</option>
                    <option value="Batman">Batman</option>
                    <option value="Şırnak">Şırnak</option>
                    <option value="Bartın">Bartın</option>
                    <option value="Ardahan">Ardahan</option>
                    <option value="Iğdır">Iğdır</option>
                    <option value="Yalova">Yalova</option>
                    <option value="Karabük">Karabük</option>
                    <option value="Kilis">Kilis</option>
                    <option value="Osmaniye">Osmaniye</option>
                    <option value="Düzce">Düzce</option>
                </select>
                <select class="il" name="ilce" onchange="okulGoster()" id="ilce">
              <option value="boş">ilçe Seçin</option>
            </select>
                <br>
                <select class="okul" name="okul" id="okul">
              <option value="">Hangi Okulda Okuyorsunuz</option>
            </select>
                <input name="eposta" type="text" placeholder="E-posta"><br>
                <input onkeypress="return isNumber(event)" name="tel" maxlength="10" type="text" placeholder="Telefon Numarası"><br>
                <input name="sifre" type="password" placeholder="Şifre">
                <br>
                <button class="buton" name="kayitbtn" type="submit">Kayıt Ol</button>
            </form>
            <?php
                  
            
               if (isset($_POST['kayitbtn'])) {
                if (empty($_POST['adsoyad'])||empty($_POST['il'])||empty($_POST['ilce'])||empty($_POST['okul'])||empty($_POST['eposta'])||empty($_POST['tel'])||empty($_POST['sifre'])) {
                  echo "<div class='hata'>Lütfen Boş Alan Bırakmayın</div>";
                } else {
                  $adsoyad = $_POST['adsoyad'];
                  $il = $_POST['il'];
                  $ilce = $_POST['ilce'];
                  $okul = $_POST['okul'];
                  $eposta = $_POST['eposta'];
                  $telefon = $_POST['tel'];
                  $sifre = $_POST['sifre'];
                  $sqlli = "SELECT * FROM okultb WHERE okul_isim = '$okul'";
                  $resultt = $conn->query($sqlli);
                  if ($resultt->num_rows > 0) {
                   // İlan bilgilerini al
                   while ($rows = $resultt->fetch_assoc()) {
                     $okulid =  $rows["id"];
                   }
                  }
                   $sql = "SELECT * FROM stajyerlertb WHERE eposta='$eposta'";
                   $result = mysqli_query($conn, $sql);
                   if (mysqli_num_rows($result) == 1) {
                   echo "<div class='hata'>Zaten Böyle Bir Hesap Var</div>";
                  } else {        
                      if (filter_var($eposta, FILTER_VALIDATE_EMAIL)) {
                    // Yeni kullanıcı ekleme işlemi
                    $sql = "INSERT INTO stajyerlertb (adsoyad, il, ilce, okul, eposta, tel, sifre, rol, okul_id) VALUES ('$adsoyad', '$il', '$ilce', '$okul', '$eposta', '$telefon', '$sifre', 'stajyer','$okulid')";
                                 
                    if (mysqli_query($conn, $sql)) {
                      // Kayıt işlemi başarılı, başka bir sayfaya yönlendir
                      echo'<script>window.location.href="stajyergiris.php";</script>';
                      exit();
                    } else {
                      echo "Hata: " . $sql . "<br>" . mysqli_error($conn);
                    }
                  }
                  else {
                    echo "<div class='hata'>Geçersiz bir e-posta adresi girdiniz.</div>";
                  } 
                  }
                 
                }
              }
             
              ?>
        </div>
        </div>

        <div class="col-12 col-sm-12 col-md-6 col-lg-7 col-xl-8 section-right">
            <center>
                <div class="inclusive">
                <div class="title">
                   Hemen Giriş Yap Firmana Uygun Stajyerleri Bul :)
                </div>
                <div class="text">
                  Kolaylıkla Staj Yeri Bulmanın Tek adresi <br>
                  Endişelenme Bize Güven!
                </div>
            </div>
                <div class="col-8"><img src="../image/logo/elyazilogo.png" alt="Resim Yüklenemedi"></div>
            </center>
        </div>
    </div>
</body>
</html>