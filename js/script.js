var expanded = false;

function showCheckboxes() {
  var checkboxes = document.getElementById("checkboxes");
  if (!expanded) {
    checkboxes.style.display = "block";
    expanded = true;
    checkboxes.style.maxHeight="160px";
    document.getElementById("bolumbox").style.display = "none";
    expan = false;
  } else {
    checkboxes.style.display = "none";
    expanded = false;
  }
}

var expan = false;

function showbolum() {
  var check = document.getElementById("bolumbox");
  if (!expan) {
    check.style.display = "block";
    expan = true;
    check.style.maxHeight="160px";
    checkboxes.style.display = "none";
    expanded = false;
  } else {
    check.style.display = "none";
    expan = false;
  }
}


document.getElementById("postButton").addEventListener("click", function() {
  fetch(document.getElementById("myForm").action, {
    method: "POST",
    body: new FormData(document.getElementById("myForm"))
  })
  .then(function(response) {
    console.log("POST isteği başarıyla gönderildi.");
    setTimeout(function() {
      document.getElementById("dropButton").click(); // Belirli bir süre sonra açılır menü düğmesine tıklama işlemi
    }, 1000); // 1 saniye (1000 milisaniye) bekletme süresi
  })
  .catch(function(error) {
    console.log("POST isteği gönderilirken bir hata oluştu: " + error);
  });
});

var kontrol = false;

function goster() {
  if (!kontrol) {
    document.getElementById("box").style.display = "inline";
    kontrol = true;
  } else {
    document.getElementById("box").style.display = "none";
    kontrol = false;
  }
}
