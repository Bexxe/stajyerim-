function isNumber(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
      return false;
    }
    return true;
  }
  function ilceGoster() {
    const il = document.getElementById("il");
    const ilce = document.getElementById("ilce");
    // Seçili ilin değerini al
    const seciliIl = il.options[il.selectedIndex].value;
  
    // Seçili ilin ilçelerini getir
    switch (seciliIl) {
      case "Adana":
        ilce.innerHTML = `
          <option value="İl Seçiniz">İl Seçiniz</option>
          <option value="Aladağ">Aladağ</option>
          <option value="Ceyhan">Ceyhan</option>
          <option value="Çukurova">Çukurova</option>
          <option value="Feke">Feke</option>
          <option value="İmamoğlu">İmamoğlu</option>
          <option value="Karaisalı">Karaisalı</option>
          <option value="Karataş">Karataş</option>
          <option value="Kozan">Kozan</option>
          <option value="Pozantı">Pozantı</option>
          <option value="Saimbeyli">Saimbeyli</option>
          <option value="Sarıçam">Sarıçam</option>
          <option value="Seyhan">Seyhan</option>
          <option value="Tufanbeyli">Tufanbeyli</option>
          <option value="Yumurtalık">Yumurtalık</option>
          <option value="Yüreğir">Yüreğir</option>
  
  
        `;
        break;
  
      case "AdıYaman":
        ilce.innerHTML = `
          <option value="İlçe Seçiniz">İlçe Seçiniz</option>
          <option value="Merkez">Merkez</option>
          <option value="Besni">Besni</option>
          <option value="Çelikhan">Çelikhan</option>
          <option value="Gerger">Gerger</option>
          <option value="Gölbaşı">Gölbaşı</option>
          <option value="Kâhta">Kâhta</option>
          <option value="Samsat">Samsat</option>
          option value="Sincik">Sincik</option>
          option value="Tut">Tut</option>
        `;
        break;
  
      case "Afyonkarahisar":
        ilce.innerHTML = `
        <option value="İlçe Seçiniz">İlçe Seçiniz</option>
          <option value="Merkez">Merkez</option>
          <option value="Başmakçı">Başmakçı</option>
          <option value="Bayat">Bayat</option>
          <option value="Bolvadin">Bolvadin</option>
          <option value="Çay">Çay</option>
          <option value="Çobanlar">Çobanlar</option>
          <option value="Dazkırı">Dazkırı</option>
          <option value="Dinar">Dinar</option>
          <option value="Emirdağ">Emirdağ</option>
          <option value="Evciler">Evciler</option>
          <option value="Hocalar">Hocalar</option>
          <option value="İhsaniye">İhsaniye</option>
          <option value="İscehisar">İscehisar</option>
          <option value="Kızılören">Kızılören</option>
          <option value="Sandıklı">Sandıklı</option>
          <option value="Sinanpaşa">Sinanpaşa</option>
          <option value="Sultandağı">Sultandağı</option>
          <option value="Şuhut">Şuhut</option>
        `;
        break;
  
      case "Ağrı":
        ilce.innerHTML = `
          <option value="İlçe Seçiniz">İlçe Seçiniz</option>
          <option value="Merkez">Merkez</option>
          <option value="Diyadin">Diyadin</option>
          <option value="Doğubayazıt">Doğubayazıt</option>
          <option value="Eleşkirt">Eleşkirt</option>
          <option value="Hamur">Hamur</option>
          <option value="Patnos">Patnos</option>
          <option value="Taşlıçay">Taşlıçay</option>
          <option value="Tutak">Tutak</option>
        `;
        break;
  
        case "Aksaray":
            ilce.innerHTML = `
              <option value="İlçe Seçiniz">İlçe Seçiniz</option>
              <option value="Merkez">Merkez</option>
              <option value="Ağaçören">Ağaçören</option>
              <option value="Eskil">Eskil</option>
              <option value="Gülağaç">Gülağaç</option>
              <option value="Güzelyurt">Güzelyurt</option>
              <option value="Ortaköy">Ortaköy</option>
              <option value="Sarıyahşi">Sarıyahşi</option>
              <option value="Sultanhanı">Sultanhanı</option>
            `;
            break;
  
            case "Amasya":
                ilce.innerHTML = `
                  <option value="İlçe Seçiniz">İlçe Seçiniz</option>
                  <option value="Merkez">Merkez</option>
                  <option value="Göynücek">Göynücek</option>
                  <option value="Gümüşhacıköy">Gümüşhacıköy</option>
                  <option value="Hamamözü">Hamamözü</option>
                  <option value="Merzifon">Merzifon</option>
                  <option value="Suluova">Suluova</option>
                  <option value="Taşova">Taşova</option>
                `;
                break;
  
                case "Ankara":
                    ilce.innerHTML = `
                      <option value="İlçe Seçiniz">İlçe Seçiniz</option>
                      <option value="Akyurt">Akyurt</option>
                      <option value="Altındağ">Altındağ</option>
                      <option value="Ayaş">Ayaş</option>
                      <option value="Balâ">Balâ</option>
                      <option value="Beypazarı">Beypazarı</option>
                      <option value="Çamlıdere">Çamlıdere</option>
                      <option value="Çankaya">Çankaya</option>
                      <option value="Çubuk">Çubuk</option>
                      <option value="Elmadağ">Elmadağ</option>
                      <option value="Etimesgut">Etimesgut</option>
                      <option value="Evren">Evren</option>
                      <option value="Gölbaşı">Gölbaşı</option>
                      <option value="Güdül">Güdül</option>
                      <option value="Haymana">Haymana</option>
                      <option value="Kalecik">Kalecik</option>
                      <option value="Kahramankazan">Kahramankazan</option>
                      <option value="Keçiören">Keçiören</option>
                      <option value="Kızılcahamam">Kızılcahamam</option>
                      <option value="Mamak">Mamak</option>
                      <option value="Nallıhan">Nallıhan</option>
                      <option value="Polatlı">Polatlı</option>
                      <option value="Pursaklar">Pursaklar</option>
                      <option value="Sincan">Sincan</option>
                      <option value="Şereflikoçhisar">Şereflikoçhisar</option>
                      <option value="Yenimahalle">Yenimahalle</option>
                    `;
                    break;
  
                    case "Antalya":
                        ilce.innerHTML = `
                          <option value="İlçe Seçiniz">İlçe Seçiniz</option>
                          <option value="Akseki">Akseki</option>
                          <option value="Aksu">Aksu</option>
                          <option value="Alanya">Alanya</option>
                          <option value="Demre">Demre</option>
                          <option value="Döşemealtı">Döşemealtı</option>
                          <option value="Elmalı">Elmalı</option>
                          <option value="Finike">Finike</option>
                          <option value="Gazipaşa">Gazipaşa</option>
                          <option value="Gündoğmuş">Gündoğmuş</option>
                          <option value="İbradı">İbradı</option>
                          <option value="Kaş">Kaş</option>
                          <option value="Kemer">Kemer</option>
                          <option value="Kepez">Kepez</option>
                          <option value="Konyaaltı">Konyaaltı</option>
                          <option value="Korkuteli">Korkuteli</option>
                          <option value="Kumluca">Kumluca</option>
                          <option value="Manavgat">Manavgat</option>
                          <option value="Muratpaşa">Muratpaşa</option>
                          <option value="Serik">Serik</option>
                        `;
                        break;
  
                        case "Ardahan":
                            ilce.innerHTML = `
                              <option value="İlçe Seçiniz">İlçe Seçiniz</option>
                              <option value="Merkez">Merkez</option>
                              <option value="Çıldır">Çıldır</option>
                              <option value="Damal">Damal</option>
                              <option value="Göle">Göle</option>
                              <option value="Hanak">Hanak</option>
                              <option value="Posof">Posof</option>
                            `;
                            break;
  
                            case "Artvin":
                                ilce.innerHTML = `
                                  <option value="İlçe Seçiniz">İlçe Seçiniz</option>
                                  <option value="Merkez">Merkez</option>
                                  <option value="Ardanuç">Ardanuç</option>
                                  <option value="Arhavi">Arhavi</option>
                                  <option value="Borçka">Borçka</option>
                                  <option value="Hopa">Hopa</option>
                                  <option value="Kemalpaşa">Kemalpaşa</option>
                                  <option value="Murgul">Murgul</option>
                                  <option value="Şavşat">Şavşat</option>
                                  <option value="Yusufeli">Yusufeli</option>
                                `;
                                break;    
  
                                case "Aydın":
                                    ilce.innerHTML = `
                                      <option value="İlçe Seçiniz">İlçe Seçiniz</option>
                                      <option value="Bozdoğan">Bozdoğan</option>
                                      <option value="Buharkent">Buharkent</option>
                                      <option value="Çine">Çine</option>
                                      <option value="Didim">Didim</option>
                                      <option value="Efeler">Efeler</option>
                                      <option value="Germencik">Germencik</option>
                                      <option value="İncirliova">İncirliova</option>
                                      <option value="Karacasu">Karacasu</option>
                                      <option value="Karpuzlu">Karpuzlu</option>
                                      <option value="Koçarlı">Koçarlı</option>
                                      <option value="Köşk">Köşk</option>
                                      <option value="Kuşadası">Kuşadası</option>
                                      <option value="Kuyucak">Kuyucak</option>
                                      <option value="Nazilli">Nazilli</option>
                                      <option value="Söke">Söke</option>
                                      <option value="Sultanhisar">Sultanhisar</option>
                                      <option value="Yenipazar">Yenipazar</option>
                                    `;
                                    break; 
                                    case "Balıkesir":
                                        ilce.innerHTML = `
                                          <option value="İlçe Seçiniz">İlçe Seçiniz</option>
                                          <option value="Altıeylül">Altıeylül</option>
                                          <option value="Ayvalık">Ayvalık</option>
                                          <option value="Balya">Balya</option>
                                          <option value="Bandırma">Bandırma</option>
                                          <option value="Bigadiç">Bigadiç</option>
                                          <option value="Burhaniye">Burhaniye</option>
                                          <option value="Dursunbey">Dursunbey</option>
                                          <option value="Edremit">Edremit</option>
                                          <option value="Erdek">Erdek</option>
                                          <option value="Gömeç">Gömeç</option>
                                          <option value="Gönen">Gönen</option>
                                          <option value="Havran">Havran</option>
                                          <option value="İvrindi">İvrindi</option>
                                          <option value="Karesi">Karesi</option>
                                          <option value="Kepsut">Kepsut</option>
                                          <option value="Manyas">Manyas</option>
                                          <option value="Marmara">Marmara</option>
                                          <option value="Savaştepe">Savaştepe</option>
                                          <option value="Sındırgı">Sındırgı</option>
                                          <option value="Susurluk">Susurluk</option>
                                        `;
                                        break;   
  
                                        case "Bartın":
                                            ilce.innerHTML = `
                                              <option value="İlçe Seçiniz">İlçe Seçiniz</option>
                                              <option value="Merkez">Merkez</option>
                                              <option value="Amasra">Amasra</option>
                                              <option value="Kurucaşile">Kurucaşile</option>
                                              <option value="Ulus">Ulus</option>
                                            `;
                                            break;   
  
                                            case "Batman":
                                                ilce.innerHTML = `
                                                  <option value="İlçe Seçiniz">İlçe Seçiniz</option>
                                                  <option value="Merkez">Merkez</option>
                                                  <option value="Beşiri">Beşiri</option>
                                                  <option value="Gercüş">Gercüş</option>
                                                  <option value="Hasankeyf">Hasankeyf</option>
                                                  <option value="Kozluk">Kozluk</option>
                                                  <option value="Sason">Sason</option>
                                                `;
                                                break;
  
                                                case "Bayburt":
                                                    ilce.innerHTML = `
                                                      <option value="İlçe Seçiniz">İlçe Seçiniz</option>
                                                      <option value="Merkez">Merkez</option>
                                                      <option value="Aydıntepe">Aydıntepe</option>
                                                      <option value="Demirözü">Demirözü</option>
                                                    `;
                                                    break;  
                                                    
                                                    
                                                case "Bilecik":
                                                    ilce.innerHTML = `
                                                      <option value="İlçe Seçiniz">İlçe Seçiniz</option>
                                                      <option value="Merkez">Merkez</option>
                                                      <option value="Bozüyük">Bozüyük</option>
                                                      <option value="Gölpazarı">Gölpazarı</option>
                                                      <option value="İnhisar">İnhisar</option>
                                                      <option value="Osmaneli">Osmaneli</option>
                                                      <option value="Pazaryeri">Pazaryeri</option>
                                                      <option value="Söğüt">Söğüt</option>
                                                      <option value="Yenipazar">Yenipazar</option>
                                                    `;
                                                    break;   
                                                    
                                                    case "Bingöl":
                                                        ilce.innerHTML = `
                                                          <option value="İlçe Seçiniz">İlçe Seçiniz</option>
                                                          <option value="Merkez">Merkez</option>
                                                          <option value="Adaklı">Adaklı</option>
                                                          <option value="Genç">Genç</option>
                                                          <option value="Karlıova">Karlıova</option>
                                                          <option value="Kiğı">Kiğı</option>
                                                          <option value="Solhan">Solhan</option>
                                                          <option value="Yayladere">Yayladere</option>
                                                          <option value="Yedisu">Yedisu</option>
                                                        `;
                                                        break;   
  
                                                        case "Bitlis":
                                                            ilce.innerHTML = `
                                                              <option value="İlçe Seçiniz">İlçe Seçiniz</option>
                                                              <option value="Merkez">Merkez</option>
                                                              <option value="Adilcevaz">Adilcevaz</option>
                                                              <option value="Ahlat">Ahlat</option>
                                                              <option value="Güroymak">Güroymak</option>
                                                              <option value="Hizan">Hizan</option>
                                                              <option value="Mutki">Mutki</option>
                                                              <option value="Tatvan">Tatvan</option>
                                                            `;
                                                            break;
  
                                                            case "Bolu":
                                                                ilce.innerHTML = `
                                                                  <option value="İlçe Seçiniz">İlçe Seçiniz</option>
                                                                  <option value="Merkez">Merkez</option>
                                                                  <option value="Dörtdivan">Dörtdivan</option>
                                                                  <option value="Gerede">Gerede</option>
                                                                  <option value="Göynük">Göynük</option>
                                                                  <option value="Kıbrıscık">Kıbrıscık</option>
                                                                  <option value="Mengen">Mengen</option>
                                                                  <option value="Mudurnu">Mudurnu</option>
                                                                  <option value="Seben">Seben</option>
                                                                  <option value="Yeniçağa">Yeniçağa</option>
                                                                `;
                                                                break;
  
                                                                case "Burdur":
                                                                    ilce.innerHTML = `
                                                                      <option value="İlçe Seçiniz">İlçe Seçiniz</option>
                                                                      <option value="Merkez">Merkez</option>
                                                                      <option value="Ağlasun">Ağlasun</option>
                                                                      <option value="Altınyayla">Altınyayla</option>
                                                                      <option value="Bucak">Bucak</option>
                                                                      <option value="Çavdır">Çavdır</option>
                                                                      <option value="Çeltikçi">Çeltikçi</option>
                                                                      <option value="Gölhisar">Gölhisar</option>
                                                                      <option value="Karamanlı">Karamanlı</option>
                                                                      <option value="Kemer">Kemer</option>
                                                                      <option value="Tefenni">Tefenni</option>
                                                                      <option value="Yeşilova">Yeşilova</option>
                                                                    `;
                                                                    break;
  
                                                                    case "Bursa":
                                                                        ilce.innerHTML = `
                                                                          <option value="İlçe Seçiniz">İlçe Seçiniz</option>
                                                                          <option value="Büyükorhan">Büyükorhan</option>
                                                                          <option value="Gemlik">Gemlik</option>
                                                                          <option value="Gürsu">Gürsu</option>
                                                                          <option value="Harmancık">Harmancık</option>
                                                                          <option value="İnegöl">İnegöl</option>
                                                                          <option value="İznik">İznik</option>
                                                                          <option value="Karacabey">Karacabey</option>
                                                                          <option value="Keles">Keles</option>
                                                                          <option value="Kestel">Kestel</option>
                                                                          <option value="Mudanya">Mudanya</option>
                                                                          <option value="Mustafakemalpaşa">Mustafakemalpaşa</option>
                                                                          <option value="Nilüfer">Nilüfer</option>
                                                                          <option value="Orhaneli">Orhaneli</option>
                                                                          <option value="Orhangazi">Orhangazi</option>
                                                                          <option value="Osmangazi">Osmangazi</option>
                                                                          <option value="Yenişehir">Yenişehir</option>
                                                                          <option value="Yıldırım">Yıldırım</option>
                                                                        `;
                                                                        break;
  
                                                                        case "Çanakkale":
                                                                            ilce.innerHTML = `
                                                                              <option value="İlçe Seçiniz">İlçe Seçiniz</option>
                                                                              <option value="Merkez">Merkez</option>
                                                                              <option value="Ayvacık">Ayvacık</option>
                                                                              <option value="Bayramiç">Bayramiç</option>
                                                                              <option value="Biga">Biga</option>
                                                                              <option value="Bozcaada">Bozcaada</option>
                                                                              <option value="Çan">Çan</option>
                                                                              <option value="Eceabat">Eceabat</option>
                                                                              <option value="Ezine">Ezine</option>
                                                                              <option value="Gelibolu">Gelibolu</option>
                                                                              <option value="Gökçeada">Gökçeada</option>
                                                                              <option value="Lapseki">Lapseki</option>
                                                                              <option value="Yenice">Yenice</option>
                                                                            `;
                                                                            break;
  
                                                                            case "Çankırı":
                                                                                ilce.innerHTML = `
                                                                                  <option value="İlçe Seçiniz">İlçe Seçiniz</option>
                                                                                  <option value="Merkez">Merkez</option>
                                                                                  <option value="Atkaracalar">Atkaracalar</option>
                                                                                  <option value="Bayramören">Bayramören</option>
                                                                                  <option value="Çerkeş">Çerkeş</option>
                                                                                  <option value="Eldivan">Eldivan</option>
                                                                                  <option value="Ilgaz">Ilgaz</option>
                                                                                  <option value="Kızılırmak">Kızılırmak</option>
                                                                                  <option value="Korgun">Korgun</option>
                                                                                  <option value="Kurşunlu">Kurşunlu</option>
                                                                                  <option value="Orta">Orta</option>
                                                                                  <option value="Şabanözü">Şabanözü</option>
                                                                                  <option value="Yapraklı">Yapraklı</option>
                                                                                `;
                                                                                break;
  
  
                                                                                case "Çorum":
                                                                                    ilce.innerHTML = `
                                                                                      <option value="İlçe Seçiniz">İlçe Seçiniz</option>
                                                                                      <option value="Merkez">Merkez</option>
                                                                                      <option value="Alaca">Alaca</option>
                                                                                      <option value="Bayat">Bayat</option>
                                                                                      <option value="Boğazkale">Boğazkale</option>
                                                                                      <option value="Dodurga">Dodurga</option>
                                                                                      <option value="İskilip">İskilip</option>
                                                                                      <option value="Kargı">Kargı</option>
                                                                                      <option value="Laçin">Laçin</option>
                                                                                      <option value="Mecitözü">Mecitözü</option>
                                                                                      <option value="Oğuzlar">Oğuzlar</option>
                                                                                      <option value="Ortaköy">Ortaköy</option>
                                                                                      <option value="Osmancık">Osmancık</option>
                                                                                      <option value="Sungurlu">Sungurlu</option>
                                                                                      <option value="Uğurludağ">Uğurludağ</option>
                                                                                    `;
                                                                                    break;
                                                                                    
                                                                                    case "Çorum":
                                                                                        ilce.innerHTML = `
                                                                                          <option value="İlçe Seçiniz">İlçe Seçiniz</option>
                                                                                          <option value="Merkez">Merkez</option>
                                                                                          <option value="Alaca">Alaca</option>
                                                                                          <option value="Bayat">Bayat</option>
                                                                                          <option value="Boğazkale">Boğazkale</option>
                                                                                          <option value="Dodurga">Dodurga</option>
                                                                                          <option value="İskilip">İskilip</option>
                                                                                          <option value="Kargı">Kargı</option>
                                                                                          <option value="Laçin">Laçin</option>
                                                                                          <option value="Mecitözü">Mecitözü</option>
                                                                                          <option value="Oğuzlar">Oğuzlar</option>
                                                                                          <option value="Ortaköy">Ortaköy</option>
                                                                                          <option value="Osmancık">Osmancık</option>
                                                                                          <option value="Sungurlu">Sungurlu</option>
                                                                                          <option value="Uğurludağ">Uğurludağ</option>
                                                                                        `;
                                                                                        break;
  
                                                                                        case "Denizli":
                                                                                            ilce.innerHTML = `
                                                                                              <option value="İlçe Seçiniz">İlçe Seçiniz</option>
                                                                                              <option value="Acıpayam">Acıpayam</option>
                                                                                              <option value="Babadağ">Babadağ</option>
                                                                                              <option value="Baklan">Baklan</option>
                                                                                              <option value="Bekilli">Bekilli</option>
                                                                                              <option value="Beyağaç">Beyağaç</option>
                                                                                              <option value="Bozkurt">Bozkurt</option>
                                                                                              <option value="Buldan">Buldan</option>
                                                                                              <option value="Çal">Çal</option>
                                                                                              <option value="Çameli">Çameli</option>
                                                                                              <option value="Çardak">Çardak</option>
                                                                                              <option value="Çivril">Çivril</option>
                                                                                              <option value="Güney">Güney</option>
                                                                                              <option value="Honaz">Honaz</option>
                                                                                              <option value="Kale">Kale</option>
                                                                                              <option value="Merkezefendi">Merkezefendi</option>
                                                                                              <option value="Pamukkale">Pamukkale</option>
                                                                                              <option value="Sarayköy">Sarayköy</option>
                                                                                              <option value="Serinhisar">Serinhisar</option>
                                                                                              <option value="Tavas">Tavas</option>
                                                                                            `;
                                                                                            break;
  
                                                                                            case "Diyarbakır":
                                                                                                ilce.innerHTML = `
                                                                                                  <option value="İlçe Seçiniz">İlçe Seçiniz</option>
                                                                                                  <option value="Bağlar">Bağlar</option>
                                                                                                  <option value="Bismil">Bismil</option>
                                                                                                  <option value="Çermik">Çermik</option>
                                                                                                  <option value="Çınar">Çınar</option>
                                                                                                  <option value="Çüngüş">Çüngüş</option>
                                                                                                  <option value="Dicle">Dicle</option>
                                                                                                  <option value="Eğil">Eğil</option>
                                                                                                  <option value="Ergani">Ergani</option>
                                                                                                  <option value="Hani">Hani</option>
                                                                                                  <option value="Hazro">Hazro</option>
                                                                                                  <option value="Kayapınar">Kayapınar</option>
                                                                                                  <option value="Kocaköy">Kocaköy</option>
                                                                                                  <option value="Kulp">Kulp</option>
                                                                                                  <option value="Lice">Lice</option>
                                                                                                  <option value="Silvan">Silvan</option>
                                                                                                  <option value="Sur">Sur</option>
                                                                                                  <option value="Yenişehir">Yenişehir</option>
                                                                                                `;
                                                                                                break;
  
                                                                                                case "Düzce":
                                                                                                ilce.innerHTML = `
                                                                                                  <option value="İlçe Seçiniz">İlçe Seçiniz</option>
                                                                                                  <option value="Merkez">Merkez</option>
                                                                                                  <option value="Akçakoca">Akçakoca</option>
                                                                                                  <option value="Cumayeri">Cumayeri</option>
                                                                                                  <option value="Çilimli">Çilimli</option>
                                                                                                  <option value="Gölyaka">Gölyaka</option>
                                                                                                  <option value="Gümüşova">Gümüşova</option>
                                                                                                  <option value="Kaynaşlı">Kaynaşlı</option>
                                                                                                  <option value="Yığılca">Yığılca</option>
                                                                                                `;
                                                                                                break;
  
                                                                                                case "Edirne":
                                                                                                ilce.innerHTML = `
                                                                                                  <option value="İlçe Seçiniz">İlçe Seçiniz</option>
                                                                                                  <option value="Merkez">Merkez</option>
                                                                                                  <option value="Enez">Enez</option>
                                                                                                  <option value="Havsa">Havsa</option>
                                                                                                  <option value="İpsala">İpsala</option>
                                                                                                  <option value="Keşan">Keşan</option>
                                                                                                  <option value="Lalapaşa">Lalapaşa</option>
                                                                                                  <option value="Meriç">Meriç</option>
                                                                                                  <option value="Süloğlu">Süloğlu</option>
                                                                                                  <option value="Uzunköprü">Uzunköprü</option>
                                                                                                `;
                                                                                                break;
  
                                                                                                case "Elâzığ":
                                                                                                ilce.innerHTML = `
                                                                                                  <option value="İlçe Seçiniz">İlçe Seçiniz</option>
                                                                                                  <option value="Merkez">Merkez</option>
                                                                                                  <option value="Ağın">Ağın</option>
                                                                                                  <option value="Alacakaya">Alacakaya</option>
                                                                                                  <option value="Arıcak">Arıcak</option>
                                                                                                  <option value="Baskil">Baskil</option>
                                                                                                  <option value="Karakoçan">Karakoçan</option>
                                                                                                  <option value="Keban">Keban</option>
                                                                                                  <option value="Kovancılar">Kovancılar</option>
                                                                                                  <option value="Maden">Maden</option>
                                                                                                  <option value="Palu">Palu</option>
                                                                                                  <option value="Sivrice">Sivrice</option>
                                                                                                `;
                                                                                                break;
  
                                                                                                case "Erzincan":
                                                                                                    ilce.innerHTML = `
                                                                                                      <option value="İlçe Seçiniz">İlçe Seçiniz</option>
                                                                                                      <option value="Merkez">Merkez</option>
                                                                                                      <option value="Çayırlı">Çayırlı</option>
                                                                                                      <option value="İliç">İliç</option>
                                                                                                      <option value="Kemah">Kemah</option>
                                                                                                      <option value="Kemaliye">Kemaliye</option>
                                                                                                      <option value="Otlukbeli">Otlukbeli</option>
                                                                                                      <option value="Refahiye">Refahiye</option>
                                                                                                      <option value="Tercan">Tercan</option>
                                                                                                      <option value="Üzümlü">Üzümlü</option>
                                                                                                    `;
                                                                                                    break;
  
                                                                                                    case "Erzurum":
                                                                                                    ilce.innerHTML = `
                                                                                                      <option value="İlçe Seçiniz">İlçe Seçiniz</option>
                                                                                                      <option value="Aşkale">Aşkale</option>
                                                                                                      <option value="Aziziye">Aziziye</option>
                                                                                                      <option value="Çat">Çat</option>
                                                                                                      <option value="Hınıs">Hınıs</option>
                                                                                                      <option value="İspir">İspir</option>
                                                                                                      <option value="Karaçoban">Karaçoban</option>
                                                                                                      <option value="Karayazı">Karayazı</option>
                                                                                                      <option value="Köprüköy">Köprüköy</option>
                                                                                                      <option value="Narman">Narman</option>
                                                                                                      <option value="Oltu">Oltu</option>
                                                                                                      <option value="Olur">Olur</option>
                                                                                                      <option value="Palandöken">Palandöken</option>
                                                                                                      <option value="Pasinler">Pasinler</option>
                                                                                                      <option value="Pazaryolu">Pazaryolu</option>
                                                                                                      <option value="Şenkaya">Şenkaya</option>
                                                                                                      <option value="Tekman">Tekman</option>
                                                                                                      <option value="Tortum">Tortum</option>
                                                                                                      <option value="Uzundere">Uzundere</option>
                                                                                                      <option value="Yakutiye">Yakutiye</option>
                                                                                                    `;
                                                                                                    break;
  
                                                                                                    case "Eskişehir":
                                                                                                    ilce.innerHTML = `
                                                                                                      <option value="İlçe Seçiniz">İlçe Seçiniz</option>
                                                                                                      <option value="Alpu">Alpu</option>
                                                                                                      <option value="Beylikova">Beylikova</option>
                                                                                                      <option value="Çifteler">Çifteler</option>
                                                                                                      <option value="Günyüzü">Günyüzü</option>
                                                                                                      <option value="Han">Han</option>
                                                                                                      <option value="İnönü">İnönü</option>
                                                                                                      <option value="Mahmudiye">Mahmudiye</option>
                                                                                                      <option value="Mihalgazi">Mihalgazi</option>
                                                                                                      <option value="Mihalıççık">Mihalıççık</option>
                                                                                                      <option value="Odunpazarı">Odunpazarı</option>
                                                                                                      <option value="Sarıcakaya">Sarıcakaya</option>
                                                                                                      <option value="Seyitgazi">Seyitgazi</option>
                                                                                                      <option value="Sivrihisar">Sivrihisar</option>
                                                                                                      <option value="Tepebaşı">Tepebaşı</option>
                                                                                                    `;
                                                                                                    break;
  
                                                                                                    case "Gaziantep":
                                                                                                    ilce.innerHTML = `
                                                                                                      <option value="İlçe Seçiniz">İlçe Seçiniz</option>
                                                                                                      <option value="Araban">Araban</option>
                                                                                                      <option value="İslahiye">İslahiye</option>
                                                                                                      <option value="Karkamış">Karkamış</option>
                                                                                                      <option value="Nizip">Nizip</option>
                                                                                                      <option value="Nurdağı">Nurdağı</option>
                                                                                                      <option value="Oğuzeli">Oğuzeli</option>
                                                                                                      <option value="Şahinbey">Şahinbey</option>
                                                                                                      <option value="Şehitkamil">Şehitkamil</option>
                                                                                                      <option value="Yavuzeli">Yavuzeli</option>
                                                                                                    `;
                                                                                                    break;
  
                                                                                                    case "Giresun":
                                                                                                    ilce.innerHTML = `
                                                                                                      <option value="İlçe Seçiniz">İlçe Seçiniz</option>
                                                                                                      <option value="Merkez">Merkez</option>
                                                                                                      <option value="Alucra">Alucra</option>
                                                                                                      <option value="Bulancak">Bulancak</option>
                                                                                                      <option value="Çamoluk">Çamoluk</option>
                                                                                                      <option value="Çanakçı">Çanakçı</option>
                                                                                                      <option value="Dereli">Dereli</option>
                                                                                                      <option value="Doğankent">Doğankent</option>
                                                                                                      <option value="Espiye">Espiye</option>
                                                                                                      <option value="Eynesil">Eynesil</option>
                                                                                                      <option value="Görele">Görele</option>
                                                                                                      <option value="Güce">Güce</option>
                                                                                                      <option value="Keşap">Keşap</option>
                                                                                                      <option value="Piraziz">Piraziz</option>
                                                                                                      <option value="Şebinkarahisar">Şebinkarahisar</option>
                                                                                                      <option value="Tirebolu">Tirebolu</option>
                                                                                                      <option value="Yağlıdere">Yağlıdere</option>
                                                                                                    `;
                                                                                                    break;
  
                                                                                                    case "Gümüşhane":
                                                                                                    ilce.innerHTML = `
                                                                                                      <option value="İlçe Seçiniz">İlçe Seçiniz</option>
                                                                                                      <option value="Merkez">Merkez</option>
                                                                                                      <option value="Kelkit">Kelkit</option>
                                                                                                      <option value="Köse">Köse</option>
                                                                                                      <option value="Kürtün">Kürtün</option>
                                                                                                      <option value="Şiran">Şiran</option>
                                                                                                      <option value="Torul">Torul</option>
                                                                                                    `;
                                                                                                    break;
  
                                                                                                    case "Hakkâri":
                                                                                                    ilce.innerHTML = `
                                                                                                      <option value="İlçe Seçiniz">İlçe Seçiniz</option>
                                                                                                      <option value="Merkez">Merkez</option>
                                                                                                      <option value="Çukurca">Çukurca</option>
                                                                                                      <option value="Derecik">Derecik</option>
                                                                                                      <option value="Şemdinli">Şemdinli</option>
                                                                                                      <option value="Yüksekova">Yüksekova</option>
                                                                                                     
                                                                                                    `;
                                                                                                    break;
  
                                                                                                    case "Hatay":
                                                                                                    ilce.innerHTML = `
                                                                                                      <option value="İlçe Seçiniz">İlçe Seçiniz</option>
                                                                                                      <option value="Altınözü">Altınözü</option>
                                                                                                      <option value="Antakya">Antakya</option>
                                                                                                      <option value="Arsuz">Arsuz</option>
                                                                                                      <option value="Belen">Belen</option>
                                                                                                      <option value="Defne">Defne</option>
                                                                                                      <option value="Dörtyol">Dörtyol</option>
                                                                                                      <option value="Erzin">Erzin</option>
                                                                                                      <option value="Hassa">Hassa</option>
                                                                                                      <option value="İskenderun">İskenderun</option>
                                                                                                      <option value="Kırıkhan">Kırıkhan</option>
                                                                                                      <option value="Kumlu">Kumlu</option>
                                                                                                      <option value="Payas">Payas</option>
                                                                                                      <option value="Reyhanlı">Reyhanlı</option>
                                                                                                      <option value="Samandağ">Samandağ</option>
                                                                                                      <option value="Yayladağı">Yayladağı</option>
                                                                                                    `;
                                                                                                    break;
  
                                                                                                    case "Iğdır":
                                                                                                        ilce.innerHTML = `
                                                                                                          <option value="İlçe Seçiniz">İlçe Seçiniz</option>
                                                                                                          <option value="Merkez">Merkez</option>
                                                                                                          <option value="Aralık">Aralık</option>
                                                                                                          <option value="Karakoyunlu">Karakoyunlu</option>
                                                                                                          <option value="Tuzluca">Tuzluca</option>
                                                                                                        `;
                                                                                                        break;
  
                                                                                                        case "Isparta":
                                                                                                            ilce.innerHTML = `
                                                                                                              <option value="İlçe Seçiniz">İlçe Seçiniz</option>
                                                                                                              <option value="Merkez">Merkez</option>
                                                                                                              <option value="Aksu">Aksu</option>
                                                                                                              <option value="Atabey">Atabey</option>
                                                                                                              <option value="Eğirdir">Eğirdir</option>
                                                                                                              <option value="Gelendost">Gelendost</option>
                                                                                                              <option value="Gönen">Gönen</option>
                                                                                                              <option value="Keçiborlu">Keçiborlu</option>
                                                                                                              <option value="Senirkent">Senirkent</option>
                                                                                                              <option value="Sütçüler">Sütçüler</option>
                                                                                                              <option value="Şarkikaraağaç">Şarkikaraağaç</option>
                                                                                                              <option value="Uluborlu">Uluborlu</option>
                                                                                                              <option value="Yalvaç">Yalvaç</option>
                                                                                                              <option value="Yenişarbademli">Yenişarbademli</option>
                                                                                                            `;
                                                                                                            break;
  
                                                                                                            case "İstanbul":
                                                                                                            ilce.innerHTML = `
                                                                                                              <option value="İlçe Seçiniz">İlçe Seçiniz</option>
                                                                                                              <option value="Merkez">Merkez</option>
                                                                                                              <option value="Aksu">Aksu</option>
                                                                                                              <option value="Atabey">Atabey</option>
                                                                                                              <option value="Eğirdir">Eğirdir</option>
                                                                                                              <option value="Gelendost">Gelendost</option>
                                                                                                              <option value="Gönen">Gönen</option>
                                                                                                              <option value="Keçiborlu">Keçiborlu</option>
                                                                                                              <option value="Senirkent">Senirkent</option>
                                                                                                              <option value="Sütçüler">Sütçüler</option>
                                                                                                              <option value="Şarkikaraağaç">Şarkikaraağaç</option>
                                                                                                              <option value="Uluborlu">Uluborlu</option>
                                                                                                              <option value="Yalvaç">Yalvaç</option>
                                                                                                              <option value="Yenişarbademli">Yenişarbademli</option>
                                                                                                            `;
                                                                                                            break;
                                                                                                            case "Kocaeli":
                                                                                                              ilce.innerHTML = `
                                                                                                                <option value="İlçe Seçiniz">İlçe Seçiniz</option>
                                                                                                                <option value="Gebze">Gebze</option>
                                                                                                                <option value="İzmit">İzmit</option>
                                                                                                                <option value="Darıca">Darıca</option>
                                                                                                                <option value="Körfez">Körfez</option>
                                                                                                                <option value="Gölcük">Gölcük</option>
                                                                                                                <option value="Çayırova">Çayırova</option>
                                                                                                                <option value="Derince">Derince</option>
                                                                                                                <option value="Kartepe">Kartepe</option>
                                                                                                                <option value="Başiskele">Başiskele</option>
                                                                                                                <option value="Karamürsel">Karamürsel</option>
                                                                                                                <option value="Dilovası">Dilovası</option>
                                                                                                                <option value="Kandıra">Kandıra</option>
                                                                                                              `;
                                                                                                              break;
      default:
        ilce.innerHTML = `<option value="">İl Seçiniz</option>`;
    }
  }
  function okulGoster() {
    const ilcee = document.getElementById("ilce");
    const okul = document.getElementById("okul");
    // Seçili ilin değerini al
    const seciliIlce = ilcee.options[ilcee.selectedIndex].value;
  
    switch (seciliIlce) {
      case "Çayırova":
        okul.innerHTML = `
          <option value="Hangi Okulda Okuyorsunuz">Hangi Okulda Okuyorsunuz</option>
          <option value="Hatice Bayraktar Mesleki ve Teknik Anadolu Lisesi">Hatice Bayraktar Mesleki ve Teknik Anadolu Lisesi</option>
          <option value="GOSB-TADIM Jale Yücel Teknik ve Endüstri Meslek Lisesi">GOSB-TADIM Jale Yücel Teknik ve Endüstri Meslek Lisesi</option>
          <option value="Şehit Davut Ali Karadağ Mesleki ve Teknik Anadolu Lisesi">Şehit Davut Ali Karadağ Mesleki ve Teknik Anadolu Lisesi</option>
          <option value="Yapı Kredi Bankası Kız Meslek Lisesi">Yapı Kredi Bankası Kız Meslek Lisesi</option>
        `;
        break;
        
        default:
        okul.innerHTML = `<option value="">Hangi Okulda Okuyorsunuz</option>`;
    }
    
  }