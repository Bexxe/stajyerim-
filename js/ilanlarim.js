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