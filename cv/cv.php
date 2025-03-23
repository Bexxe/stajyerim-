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
}
else{
      // Oturum açılmamışsa, giriş sayfasına yönlendir
      header("Location: ../log/firmagiris.php");
      exit();
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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/cv.css">
    <script src="../js/cv.js"></script>
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
          <button class="btn btn-login-lg" onclick="goster()" type="button"><i class="fa-solid fa-user"></i>  <?php echo $username;?>  <i class="fa-solid fa-caret-down"></i></button>
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
    <div class="text-center baslik">
      <h1>Cv Olustur</h1>
    </div>
    <div class="row justify-content-center">
      <div class="col-12 col-sm-10 col-md-9 col-lg-7 col-xl-6 back">
        <form method="post">
          <div class="row kapsa">
          <div class="col-12 col-md-10 col-lg-8 col-xl-8 mb-3 cv-isim">
            <input type="text" name="cvisim" placeholder="Cv'ne İsim Ver">
          </div>
          <div class="row ad mb-3">
         <div class="col-6 col-md-5 col-lg-4 col-xl-4">
          <input type="text" name="ad" placeholder="Ad">
         </div>
         <div class="col-6 col-md-5 col-lg-4 col-xl-4">
          <input type="text" name="soyad" placeholder="Soyad">
         </div>
        </div>
        <div class="row ad il mb-3">
          <div class="col-12 col-md-10 col-lg-8 col-xl-8 mb-3">
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
          <div class="col-12 col-md-10 col-lg-8 col-xl-8">
            <select name="ilce" onchange="okulGoster()" id="ilce">
              <option value="boş">ilçe Seçin</option>
            </select>
          </div>
         </div>
        
        <div class="col-12 col-md-10 col-lg-8 col-xl-8 adres mb-3">
          <textarea name="adres" id="" cols="30" rows="" placeholder="Tam Adres"></textarea>
        </div>
        <div class="col-12 iletisim">
          <div class="col-12 col-md-10 col-lg-8 col-xl-8 mb-3">
            <input type="mail" name="eposta" placeholder="E-posta">
          </div>
          <div class="col-12 col-md-10 col-lg-8 col-xl-8 mb-3">
            <input type="text" name="tel" placeholder="Tel No">
          </div>
        </div>
        <div class="col-12 col-md-10 col-lg-8 col-xl-8 mb-3 okul">
            <select name="okul" id="okul">
              <option value="">Hangi Okulda Okuyorsunuz</option>
            </select>
        </div>
        <div class="col-12 col-md-10 col-lg-8 col-xl-8 mb-3 okul-no">
            <input type="text" name="okulno" placeholder="Okul Numaranız">
          </div>
        <div class="col-12 col-md-10 col-lg-8 col-xl-8 okul mb-3">
          <select name="bolum" id="">
            <option value="">Staj Yapmak İstediğiniz Bölüm</option>
            <option value="Bilişim">Bilişim</option>
            <option value="Makine">Makine</option>
            <option value="Elektirik">Elektirik</option>
          </select>
      </div>
      <div class="col-12 col-md-10 col-lg-8 col-xl-8 dil mb-3">
        <textarea name="dil" id="" cols="30" rows="" placeholder="Bildiğiniz Diller Örnek:İngilizce (Temel Seviye) 
Lütfen Temel Orta Akıcı diye belirtiniz
"></textarea>
    </div>
    <div class="col-12 col-md-10 col-lg-8 col-xl-8 adres mb-3">
      <textarea name="yetenek" id="" cols="30" rows="" placeholder="Yetenekler Ve Beceriler"></textarea>
    </div>
    <div class="col-10 col-md-8 col-lg-6 col-xl-6 olustur mb-3">
        <button type="submit" name="olustur">Oluştur</button>
    </div>
    </form>
      </div>
    </div>
  </div>
</body>
</html>
<?php
if (isset($_POST['olustur'])) {
  if (empty($_POST['cvisim'])||empty($_POST['ad'])||empty($_POST['soyad'])||empty($_POST['il'])||empty($_POST['ilce'])||empty($_POST['adres'])||empty($_POST['eposta'])||empty($_POST['tel'])||empty($_POST['okul'])||empty($_POST['okulno'])||empty($_POST['bolum'])||empty($_POST['dil'])||empty($_POST['yetenek'])) {
    echo "<div class='hata'>Lütfen Boş Alan Bırakmayın</div>";
  } else {
  $cvisim = $_POST['cvisim'];
  $ad = $_POST['ad'];
  $soyad = $_POST['soyad'];
  $il = $_POST['il'];
  $ilce = $_POST['ilce'];
  $adres = $_POST['adres'];
  $eposta = $_POST['eposta'];
  $tel = $_POST['tel'];
  $okul = $_POST['okul'];
  $okulno = $_POST['okulno'];
  $bolum = $_POST['bolum'];
  $dil = $_POST['dil'];
  $yetenek = $_POST['yetenek'];

  // Veritabanına verileri ekleme
  $sql = "INSERT INTO cvdb (kullanici_id, cvisim, ad, soyad, il, ilce, adres, eposta, telno, okul, okul_no, bolum, dil, yetenek) VALUES ('$userID', '$cvisim', '$ad', '$soyad', '$il', '$ilce', '$adres', '$eposta', '$tel', '$okul', '$okulno', '$bolum', '$dil', '$yetenek')";

  if ($conn->query($sql) === TRUE) {
    echo'<script>window.location.href="../cvler/cvler.php";</script>';
      echo "Cv başarıyla oluşturuldu.";
  } else {
      echo "Cv oluşturma hatası: " . $conn->error;
  }
}
}
$conn->close();
?>
