<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 0);
session_start();
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
// Kullanıcının oturum açmış olduğunu kontrol et
if (!isset($_SESSION['id'])) {
    // Kullanıcı oturum açmamışsa ilan eklenemez, bir hata mesajı göster veya başka bir işlem yapabilirsiniz.
    echo "Oturum açmış bir kullanıcı değilsiniz.";
    exit;
}
// Kullanıcının ID'sini al
$userID = $_SESSION['id'];


// Kullanıcının adını alma
if (isset($_SESSION['eposta'])) {
    $username = $_SESSION['eposta'];
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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StaYerim</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"crossorigin="anonymous"></script>
    <script src="../js/ilanver.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/ilanver.css">
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
        </div> 
      </nav>

      <div class="container">
  <div class="row justify-content-center">
    <div class="col-12 col-sm-12 col-md-10 col-lg-8 col-xl-8 back">
      <center>
      <form method="post" enctype="multipart/form-data">
      <div class="col-12 my-2 logo">
        <div class="col-12">
          <img id="previewImage" src="" alt="-Lütfen Resim Seçin">
        </div>
        <label>Firma Logonuzu Seçiniz</label><br>
        <div class="file-input-wrapper">
          <div class="col-10 col-sm-8 col-lg-6 col-xl-5">
          <button class="custom-file-button">Logo Seç</button>
          </div>
          <div class="col-12">
            <input type="file" class="file-input" id="fileInput" name="resim" accept="image/*" onchange="handleFileSelect(event)" required>
          </div>
        </div>
      </div>
      <div class="col-12 firma-isim">
        <label>Firmanızın Adı :</label><br>
        <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-6">
        <input type="text" name="firma" placeholder="Firmanızın Adı">
        </div>
      </div>
      <div class="col-12 firma-bolum">
        <label>Aradığınız Stajyerin Bölumü :</label><br>
        <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-6">
        <select name="bolum" id="">
          <option value="bos">Aradığınız Stajyerin Bölumü</option>
          <option value="Bilişim">Bilişim</option>
          <option value="Makine">Makine</option>
          <option value="Elektirik">Elektirik</option>
        </select>
        </div>
      </div>
      <div class="col-12 col-sm-12 col-md-10 col-lg-10 col-xl-10 firma-hakkinda">
        <label>Firmanız Hakkında :</label><br>
        <textarea name="hakkinda" id="" cols="30" rows="12"></textarea>
      </div>
      <div class="col-12 col-sm-12 col-md-10 col-lg-10 col-xl-10 firma-kriter">
        <label>Aradığınız Stajyer deki kriterleriniz:</label><br>
        <textarea name="kriter" id="" cols="30" rows="8"></textarea>
      </div>
      <div class="col-12 firma-adres">
          <label>Firmanızın Adresi:</label><br>
        <div class="row justify-content-center">
          <div class="col-sm-6 mb-3 mb-sm-0 col-md-6 col-lg-4 col-xl-4">
            <select onchange="ilceGoster()" name="il" id="il">
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
          </div>
          <div class= "col-sm-6 col-md-6 col-lg-4 col-xl-4">
            <select name="ilce" id="ilce">
              <option value="boş">ilçe Seçin</option>
            </select>
          </div>
        </div>
        <br>
        <div class="col-12 col-sm-12 col-md-10 col-lg-10 col-xl-10">
          <textarea name="adres" id="" cols="30" rows="5" placeholder="Tam Adres"></textarea>
        </div>
        <div class="col-12 col-sm-12 col-md-10 col-lg-10 col-xl-10">
          <label for="">Yerleştime Kodu</label><br>
          <textarea name="yerlestirme" id="" cols="30" rows="5" placeholder="Yerleştirme Kodu"></textarea>
            <p><a href="#">Yerleştirme Kodu Nedir ?</a></p>
        </div>
      </div>
      <div class="col-12 iletisim">
        <label>Firmanızın Tel No :</label><br>
        <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-6">
        <input type="text" name="tel" placeholder="Tel No"><br>
        </div>
        <label>Firmanızın E-posta Adresi :</label><br>
        <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-6">
        <input type="text" name="mail" placeholder="E-posta">
        </div>
      </div>
      <div class="olustur">
      <div class="col-10 col-sm-10 col-md-8 col-lg-6 col-xl-6 mb-5"><button type="submit" onclick="cevir()" name="olustur">İlanı Oluştur</button></div>
      </div>
      </form>
      </center>
  </div>
</div>

</body>
</html>

<?php

if (isset($_POST['olustur'])) {
if (empty($_POST['firma'])||empty($_POST['bolum'])||empty($_POST['hakkinda'])||empty($_POST['kriter'])||empty($_POST['adres'])||empty($_POST['il'])||empty($_POST['ilce'])||empty($_POST['yerlestirme'])||empty($_POST['tel'])||empty($_POST['mail'])) {
echo "<div class='hata'>Lütfen Boş Alan Bırakmayın</div>";
} else {
// İlan ekleme formundan gelen verileri al
$firmaisim = $_POST['firma'];
$bolum = $_POST['bolum'];
$hakkinda = $_POST['hakkinda'];
$kriter = $_POST['kriter'];
$adres = $_POST['adres'];
$il = $_POST['il']; 
$ilce = $_POST['ilce']; 
$yerlestirme = $_POST['yerlestirme'];
$tel = $_POST['tel'];
$mail = $_POST['mail'];
$targetDir = "../image/ilan-img/"; // Resimlerin yükleneceği dizin
$fileName = basename($_FILES["resim"]["name"]); // Yüklenen resmin dosya adı
$targetFilePath = $targetDir . $fileName; // Dosya yolunu oluşturma
$iframeKod = $yerlestirme;
$yerlestirmeKod = str_replace('width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"', '', $iframeKod);
$randomNumber = mt_rand(100000, 999999);
date_default_timezone_set('Europe/Istanbul');
$tarih = date("Y/m/d");
if (move_uploaded_file($_FILES["resim"]["tmp_name"], $targetFilePath)) {
$sql = "INSERT INTO ilanlartb (kullanici_id, ilan_id, logo, firmaisim, bolum, hakkinda, kriter, adres, il, ilce, yerlestirme, telno, mail, tarih, ziyaret) VALUES ($userID, $randomNumber, '$targetFilePath', '$firmaisim', '$bolum', '$hakkinda', '$kriter', '$adres','$il', '$ilce', '$yerlestirmeKod', '$tel', '$mail', '$tarih','0')";
if ($conn->query($sql) === TRUE) {
    echo "İlan başarıyla eklendi.";
    echo'<script>window.location.href="../ilanlar/ilanlar.php";</script>';
} else {
    echo "İlan eklenirken hata oluştu: " . $conn->error;
}
}
}
}
// Bağlantıyı kapat
$conn->close();
?>
