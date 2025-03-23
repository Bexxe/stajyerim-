document.addEventListener('DOMContentLoaded', function() {
  var checkboxDüzce = document.getElementById('kocaeli');
  var checkboxOsmaniye = document.getElementById('gumushane');
  var checkboxIstanbul = document.getElementById('istanbul');
  var ilceContainer = document.getElementById("checkbox");

  checkboxDüzce.addEventListener('change', function() {
    if (this.checked) {
      var ilceCheckbox = document.createElement("label");
      ilceCheckbox.className = "inerr";
      ilceCheckbox.htmlFor = "bir";
      ilceCheckbox.innerHTML = `
        <input type="checkbox" value="ÇAYIROVA" name="ilce[]" id="bir" />ÇAYIROVA<span class="checkmarkk"></span>
      `;
      ilceContainer.appendChild(ilceCheckbox);
    } else {
      removeIlceCheckboxes("bir");
    }
  });

  checkboxOsmaniye.addEventListener('change', function() {
    if (this.checked) {
      var ilceCheckbox = document.createElement("label");
      ilceCheckbox.className = "inerr";
      ilceCheckbox.htmlFor = "iki";
      ilceCheckbox.innerHTML = `
        <input type="checkbox" value="KELKİT" name="ilce[]" id="iki" />KELKİT<span class="checkmarkk"></span>
      `;
      ilceContainer.appendChild(ilceCheckbox);
    } else {
      removeIlceCheckboxes("iki");
    }
  });

  checkboxIstanbul.addEventListener('change', function() {
    if (this.checked) {
      var ilceCheckbox = document.createElement("label");
      ilceCheckbox.className = "inerr";
      ilceCheckbox.htmlFor = "uc";
      ilceCheckbox.innerHTML = `
        <input type="checkbox" value="KADIKÖY" name="ilce[]" id="uc" />KADIKÖY<span class="checkmarkk"></span>
      `;
      ilceContainer.appendChild(ilceCheckbox);
    } else {
      removeIlceCheckboxes("uc");
    }
  });

  function removeIlceCheckboxes(ilceId) {
    var ilceCheckbox = document.getElementById(ilceId);
    if (ilceCheckbox) {
      ilceCheckbox.parentNode.remove();
    }
  }
});






var expanded = false;

function showCheckboxes() {
  var checkboxes = document.getElementById("checkboxes");
  if (!expanded) {
    checkboxes.style.display = "block";
    expanded = true;
    checkboxes.style.maxHeight = "160px";
  } else {
    checkboxes.style.display = "none";
    expanded = false;
  }
}

var expan = false;

function secimbox() {
  var checkbox = document.getElementById("checkbox");
  if (!expan) {
    checkbox.style.display = "block";
    expan = true;
    checkbox.style.maxHeight = "160px";
  } else {
    checkbox.style.display = "none";
    expan = false;
  }
}

var ex = false;

function ilanbox() {
  var ilanbox = document.getElementById("ilanlar");
  if (!ex) {
    ilanbox.style.display = "block";
    ex = true;
    ilanbox.style.maxHeight = "160px";
  } else {
    ilanbox.style.display = "none";
    ex = false;
  }
}

var bolum = false;

function showbolum() {
  var checkboxes = document.getElementById("checkbolum");
  if (!bolum) {
    checkboxes.style.display = "block";
    bolum = true;
    checkboxes.style.maxHeight = "160px";
  } else {
    checkboxes.style.display = "none";
    bolum = false;
  }
}

var control = 0;

function Filtre() {
  var nav = document.getElementById("a");
  nav.id = "navleft";
  document.getElementById("navleft").style.display = "inline";
  control = 1;
}

function kapat() {
  var nav = document.getElementById("navleft");
  nav.id = "a";
  document.getElementById("a").style.display = "none";
  control = 0;
}

var kontrol = true;

function goster() {
  if (kontrol) {
    document.getElementById("box").style.display = "inline";
    kontrol = false;
  } else {
    document.getElementById("box").style.display = "none";
    kontrol = true;
  }
}

window.addEventListener("resize", function () {
  if (window.innerWidth >= 991) {
    document.getElementById("a").style.display = "inline";
  } else {
    document.getElementById("a").style.display = "none";
  }
});
