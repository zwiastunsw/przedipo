<?php
$park = true;
$city = true;
$name = true;
$mail = true;
$title = true;
$match = true;
$error = false;
$pass  = false;
if(isset($_POST['submit'])) {
  $submit = true;
  /* check submission values */
  if(!isset($_POST['res'])) {
    $res = 0;
    $error = true;
    $park = false; /* favorite park not selected */
  } else {
    $res = $_POST['res'];
  }
  if(!isset($_POST['cc'])) {
    $cc = 0;
    $error = true;
    $city = false; /* greenest city not selected */
  } else {
    $cc = $_POST['cc'];
    if($cc === "0") {
      $error = true;
      $city = false; /* greenest city not selected */
    }
  }
  if(isset($_POST['n'])||isset($_POST['em'])||isset($_POST['ev'])) {
    if(isset($_POST['t'])) { $t = $_POST['t']; } else { $t = ""; }
    if(isset($_POST['n'])) { $n = $_POST['n']; } else { $n = ""; }
    if(isset($_POST['em'])) { $em = $_POST['em']; } else { $em = ""; }
    if(isset($_POST['ev'])) { $ev = $_POST['ev']; } else { $ev = ""; }
    if((strlen($n)>0)||(strlen($em)>0)||(strlen($ev)>0)) {
      /* some values provided -> check details */
      if(strlen($n)<1) {
        $error = true;
        $name = false; /* no name provided */
      }
      if(!isset($_POST['t'])) {
        $error = true;
        $title = false; /* no title set */
      }
      if((strlen($em)<6)||(preg_match("/^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-.]+$/", $em)==0)) {
        $error = true;
        $mail = false; /* invalid e-mail */
      }
      if((strlen($ev)<6)||($em!=$ev)) {
        $error = true;
        $match = false; /* e-mail mismatch */
      }
    }
  }
  if (!$error) {
    $pass = true;
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
  <head>
    <title><?php
if(isset($submit)) {
  if (!$error) {
    echo "Sondaż Świateł Miasta - Wysyłka zakończona Dostępna strona Ankieta z komentarzami]";
  } else {
    echo "Sondaż Świateł Miasta - Wysyłka nieudana [Dostępna strona Ankieta z komentarzami]";
  }
} else {
  echo "Sondaż Świateł Miasta [Dostępna strona Ankieta z komentarzami]";
}
    ?></title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400&display=swap&subset=latin-ext" rel="stylesheet">		
    <link href="../../css/main.css" rel="stylesheet" type="text/css">
    <link href="../../css/inbetween.css" rel="stylesheet" type="text/css">
	<link href="../../css/github.css" rel="stylesheet" type="text/css">	
	
    <script src="../../js/onload.js" type="text/javascript"></script>	
    <script src="../../js/localdate.js" type="text/javascript"></script>
    <script src="../../js/annotations.js" type="text/javascript"></script>
	<script src="../../js/highlight.pack.js" type="text/javascript"></script>	
	
  </head>
  <body>
    <div id="meta-header">
      <p id="skipnav">
		<ul class="skip">
			<li><a href="#page">Przejdź na początek demo dostępnej strony</a></li>
			<li><a href="#annotations">Przejdź na początek demo dostępnej strony z adnotacjami</a></li>
		</ul>
      <p id="logos"><a href="https://lepszyweb.pl"><img alt="LepszyWeb.pl. Pracownia Dostępności Cyfrowej" src="../../img/logo_lepszyweb_na-pp.png" ></a></p>
		<div id="pagetitle">
		  <h1>Demo Przed i Po: Dostępna strona Ankieta z komentarzami</h1>
        <p class="subline">Ulepsz witrynę, stosując Web Content Accessibility Guidelines (WCAG) 2.1</p>
		</div>
      <div id="mnav" class="accessible">
        <ul>
          <li class="first"><a href="../../index.html">Przegląd</a></li>
          <li class="first"><a href="home.html">Start</a></li>
          <li><a href="news.html">Nowiny</a></li>
          <li><a href="tickets.html">Bilety</a></li>
          <li class="current"><span class="hidden">Jesteś tutaj:: </span>Ankieta
            <div class="subnav"><ul>
              <li class="inaccessible"><strong>Niedostępna:</strong><a href="../../before/annotated/survey.html" class="page"><span class="hidden">Niedostępna </span>strona Ankieta</a><a href="../../before/reports/survey.html" class="report"><span class="hidden">Niedostępna strona Ankieta </span> Raport</a></li>
              <li class="accessible"><strong>Dostępna:</strong><a class="page current"><span class="hidden">Dostępna </span>strona Ankieta</a><a href="../reports/survey.html" class="report"><span class="hidden">Dostępna strona Ankieta </span> Raport</a></li>
            </ul><a href="../survey.html" class="annotoggle">Ukryj <br>komentarze</a></div>
          </li>
          <li><a href="template.html">Szablon</a></li>
        </ul>
      </div>

    </div>
    <div id="page">
      <div id="border_t"></div>
      <div id="border_l">
        <div id="border_r">
          <p class="skip" id="startcontent">Demo zaczyna się tutaj</p>
          <ul class="skip">
            <li><a href="#content">Przejdź do zawartości (na stronie demo)</a></li>
            <li><a href="#navtarget">Przejdź do nawigacji (na stronie demo)</a></li>
          </ul>
          <div id="header">
            <a href="home.html"><img src="../img/toplogo.png" alt="Światła Miasta: Twoje okno na miasto."></a><img src="../img/weather.png" alt="Przejaśnienia">
            <form action="../../offsite.html" method="post" onsubmit="if(qkmenu.value=='0'){return false;}">
              <div>
                <label for="qkmenu" id="qklabel">Eksploruj stronę według tematów:</label> <select name="qkemnu" id="qkmenu">
                  <option value="0">Wybierz temat</option>
				  <option>Bezpieczeństwo</option>
				  <option>Biblioteki publiczne</option>
				  <option>Domy społeczne</option>	
				  <option>Edukacja</option>
				  <option>Energetyka</option>
				  <option>Gospodarka odpadami</option>
				  <option>Pogotowie gazowe</option>
				  <option>Policja</option>
				  <option>Polityka rozwoju</option>
				  <option>Radio i telewizja</option>
				  <option>Sport</option>
				  <option>Straż pożarna</option>
				  <option>Telekomunikacja</option>
				  <option>Transport</option>
				  <option>Turystyka</option>
				  <option>Usługi socjalne</option>
				  <option>Wodociągi i kanalizacja</option>
				  <option>Wypoczynek</option>
				  <option>Zdrowie</option>
                </select> <input type="submit" value="Idź">
              </div>
            </form>
          </div>
          <div id="info">
            <p class="left"><strong>Ruch:</strong> Roboty budowlane na głównej drodze</p>
            <p class="right" id="weather"><strong>Dzisiaj:</strong> Czwartek 25 stycznia 2012, Przejaśnienia, 23&deg;C</p>
          </div>
		  <!--// END HEADER AREA //-->
		  <!--// START NAV AREA //-->			  
          <div id="main">
            <h2 id="navtarget" class="skip">Menu nawigacyjne:</h2>
           <nav id="nav" aria-labelledby="navtarget">
              <ul>
                <li class="home"><a href="home.html">Start</a></li>
                <li class="news"><a href="news.html">Nowiny</a></li>
                <li class="facts"><a href="tickets.html">Bilety</a></li>
                <li class="survey_set"><a>Ankieta</a></li>
              </ul>
            </nav>
		  <!--// START MAIN AREA //-->	
		  
            <main id="content">
              <div id="contentmain" class="wide annot_link_parent">
                <h1><?php
if (isset($submit)&&(!$error)) {
  echo "Sondaż Świateł Miasta - Submission Completed";
} else if($error) {
  echo "Sondaż Świateł Miasta - Submission Failed";
} else {
  echo "Sondaż Świateł Miasta";
}
                ?></h1>
                <h1>Sondaż Świateł Miasta</h1>
                <h2 class="header">Ankieta tygodnia: Więcej parków miejskich - strata czy zysk?</h2><?php
if(isset($submit)&&(!$error)) { /* successful submission */ ?>
                <p id="submissionsuccess">Dziękujemy Ci za przesłanie ankiety, która została pomyślnie zarejestrowana.</p><span id="annot_link_12" class="annot_link prev_sib" style="margin-left: -11.2em !important;padding-right: 10em;margin-top:8em;"><a href="#annot_12" title="12: Poinformowanie o pomyślym wypełnieniu formularza">12</a></span>
                <p><strong>Uwaga:</strong> Ta ankieta jest częścią Demo; żadne z przesłanych danych nie są przechowywane. Nie ma również subskrypcji newslettera.</p><?php
} else { /* print submission form */ ?>
 
                <form action="survey.php" method="post"><?php
  if($error) {?>
                <div><span id="annot_link_08" class="annot_link next_sib" style="margin-left: -11.2em !important;padding-right: 10em;margin-top:6.3em;"><a href="#annot_08" title="08: Komunikat informujący o błędzi">08</a></span></div>
                <div id="submissionerrors" class="annot_link_parent"><?php
    /* construct error messages */
    $inol = "                  <ol>";
    $olcnt = 0;
    if(!$park) { 
      $inol .= "\n                    <li>Nie wybrano <a href='#park'>ulubionego parku</a></li>";
      $olcnt++;
    } if(!$city) {
      $inol .= "\n                    <li><label for='cc'>Nie wybrano <a href='#city'>zielonego miasta</a></label></li>";
      $olcnt++;
    } if(!$name) {
      $inol .= "\n                    <li><label for='name'>Nie podano <a href='#namenewsletter'>Nazwy w opcjach biuletynu informacyjnego</a></label></li>";
      $olcnt++;
    } if(!$title) {
      $inol .= "\n                    <li><label for='t'>Nie podano <a href='#namenewsletter'>Tytułu w opcjach biuletynu informacyjnego</a></label></li>";
      $olcnt++;
    } if(!$mail) {
      $inol .= "\n                    <li><label for='em'>Nie podano <a href='#emailinput'>poprawnego adresu e-mail w opcjach biuletynu informacyjnego</a></label></li>";
      $olcnt++;
    } if(!$match) {
      $inol .= "\n                    <li><label for='ev'>Adres e-mail i powtórzony adres e-mail w opcjach biuletynu informacyjnego <a href='#emailvalid'>nie pasują do siebie</a></label></li>";
      $olcnt++;
    }
    $inol .= "\n                  </ol>\n";
?>
                  <p><strong>Błąd</strong> - Przesłanie ankiety nie powiodło się z powodu  <?php echo $olcnt ?> problem<?php echo ($olcnt > 1) ? "ów" : ""; ?>:</p>
<?php
    echo $inol;
?>
                  <span id="annot_link_09" class="annot_link prev_sib" style="margin-left: -11.4em !important;padding-right: 11em;margin-top:2em;"><a href="#annot_09" title="09: Opisane błędy i połączenie z miejscem błędu">09</a></span><p>Wymagane pol<?php echo ($olcnt > 1) ? "a zostały" : " a zostało"; ?> oznaczone gwiazdką (<abbr title="Wymagane">*</abbr>) in the form below.</p><span id="annot_link_11" class="annot_link prev_sib" style="margin-left: -11.2em !important;padding-right: 10em;margin-top:10em;"><a href="#annot_11" title="11: Błędy wyraźnie zidentyfikowane i związane z instrukcją">11</a></span>
                </div><?php
  }?>

	
                <p class="annot_link_parent">Pola są wymagane, jeśli nie zaznaczono inaczej.</p><?php
  if (!isset($submit)) {?>
                <div><span id="annot_link_01" class="annot_link prev_sib" style="margin-left: -16.2em !important;padding-right: 15em; margin-top: 6em;"><a href="#annot_01" title="01: Zapewnione instrukcje dotyczące formularzy">01</a></span></div><?php
  } elseif($error) {?>
                  <div><span id="annot_link_10" class="annot_link prev_sib" style="margin-left: -11.2em !important;padding-right: 10em;margin-top:13em;"><a href="#annot_10" title="10: Zapewniona instrukcja wypełniania formularza">10</a></span></div><?php
  }?>
                <fieldset id="park">
                  <legend>Ulubiony park</legend>
                  <p<?php if(!$park) { echo " class=\"highlight\""; } ?>><?php if(!$park) { echo '<strong><abbr title="Wymagane">*</abbr></strong> '; } ?>Jaki jest twój ulubiony park miejski?<?php if(!$park) { echo " <br /><strong>Wybierz jeden z poniższych:</strong>"; } ?></p>
                  <div style="float:left; width:40%;" class="annot_link_parent">
                    <p class="input"><input type="radio" name="res" id="nn" value="1"<?php if($res=="1") { echo " checked=\"yes\""; } ?>> <label for="nn">Żaden</label></p><?php if(!isset($submit)) {?>
                    <span id="annot_link_03" class="annot_link prev_sib" style="margin-left: -16.9em !important;padding-right: 15em;"><a href="#annot_03" title="03: Przycisk radiowy jest powiązany z jego etykietą">03</a></span><?php }?>                    <p class="input"><input type="radio" name="res" id="cp" value="2"<?php if($res=="2") { echo " checked=\"yes\""; } ?>> <label for="cp">Park Centralny</label></p>
                    <p class="input"><input type="radio" name="res" id="gp" value="3"<?php if($res=="3") { echo " checked=\"yes\""; } ?>> <label for="gp">Park Wielki</label></p>
                  </div>
                  <div style="float:left; width:40%;">
                    <p class="input"><input type="radio" name="res" id="jp" value="4"<?php if($res=="4") { echo " checked=\"yes\""; } ?>> <label for="jp">Park Jurajski</label></p>
                    <p class="input"><input type="radio" name="res" id="sp" value="5"<?php if($res=="5") { echo " checked=\"yes\""; } ?>> <label for="sp">Park Południowy</label></p>
                    <p class="input"><input type="radio" name="res" id="ot" value="6"<?php if($res=="6") { echo " checked=\"yes\""; } ?>> <label for="ot">Inny</label></p>
                  </div>
                </fieldset><?php if(!isset($submit)) {?>					

                <div><span id="annot_link_02" class="annot_link prev_sib" style="margin-left: -16.2em !important;padding-right: 10em;margin-top:8em;"><a href="#annot_02" title="02: Przyciski radiowe są pogrupowane w ramach kodu">02</a></span></div><?php }?>
                <fieldset id="city" class="annot_link_parent">
                  <legend>Zielone miasto</legend>
                  <p<?php if(!$city) { echo " class=\"highlight\""; } ?>><?php if(!$city) { echo '<strong><abbr title="Wymagane">*</abbr></strong> '; } ?>Które miasto uważasz za najbardziej ekologiczne?<?php if(!$city) { echo " <br /><strong>Wybierz jedno z poniższych:</strong>"; } ?></p><?php if(!isset($submit)) {?>
                  <span id="annot_link_04" class="annot_link prev_sib" style="margin-left: -16.5em !important;padding-right: 12em;margin-top:-0.5em;border-right: dashed blue 1px !important;height:1.5em;"><a href="#annot_04" title="04: Select box has title">04</a></span><?php }?>
                  <p class="input"><select name="cc" id="cc" title="Miasta świata">
                    <option value="0">Wybierz miasto z tej listy</option>

                    <optgroup label="A">
                      <option <?php $x=1; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Abu Dhabi, United Arab Emirates</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Abuja, Nigeria</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Accra, Ghana</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Addis Ababa, Ethiopia</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Algiers, Algeria</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Amman, Jordan</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Amsterdam, The Netherlands</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Andorra la Vella, Andorra</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Ankara, Turkey</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Antananarivo, Madagascar</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Apia, Samoa</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Ashgabat, Turkmenistan</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Asmara, Eritrea</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Astana, Kazakhstan</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Asuncion, Paraguay</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Athens, Greece</option>
                    </optgroup>
                    <optgroup label="B">
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Baghdad, Iraq</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Baku, Azerbaijan</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Bamako, Mali</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Bandar Seri Begawan, Brunei</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Bangkok, Thailand</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Bangu, Central African Republic</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Banjul, Gambia</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Basseterre, St. Kitts and Nevis</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Beijing, China</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Beirut, Lebanon</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Belmopan, Belize</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Berlin, Germany</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Bern, Switzerland</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Bishkek, Kyrgyzstan</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Bissau, Guinea-Bissau</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Bogota, Colombia</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Brasilia, Brazil</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Bratislava, Slovakia</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Brazzaville, Congo, Republic of</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Bridgetown, Barbados</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Brussels, Belgium</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Bucharest, Romania</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Budapest, Hungary</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Buenos Aires, Argentina</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Bujumbura, Burundi</option>
                    </optgroup>
                    <optgroup label="C">
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Cairo, Egypt</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Canberra, Australia</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Caracas, Venezuela</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Castries, St. Lucia</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Chisinau, Moldova</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Colombo, Sri Lanka</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Conakry, Guinea</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Copenhagen, Denmark</option>
                    </optgroup>
                    <optgroup label="D">
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Dakar, Senegal</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Damascus, Syria</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Dar es Salaam, Tanzania</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Dhaka, Bangladesh</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Dili, East Timor</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Djibouti, Djibouti</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Doha, Qatar</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Dublin, Ireland</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Dushanbe, Tajikistan</option>
                    </optgroup>
                    <optgroup label="E">
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>El Aaiun, Western Sahara</option>
                    </optgroup>
                    <optgroup label="F">
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Freetown, Sierra Leone</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Funafuti, Tuvalu</option>
                    </optgroup>
                    <optgroup label="G">
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Gaborone, Botswana</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Georgetown, Guyana</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Guatemala City, Guatemala</option>
                    </optgroup>
                    <optgroup label="H">
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Hanoi, Vietnam</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Harare, Zimbabwe</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Havana, Cuba</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Helsinki, Finland</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Honiara, Solomon Islands</option>
                    </optgroup>
                    <optgroup label="I">
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Islamabad, Pakistan</option>
                    </optgroup>
                    <optgroup label="J">
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Jakarta, Indonesia</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Jerusalem, Israel</option>
                    </optgroup>
                    <optgroup label="K">
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Kabul, Afghanistan</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Kampala, Uganda</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Kathmandu, Nepal</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Khartoum, Sudan</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Kiev, Ukraine</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Kigali, Rwanda</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Kingston, Jamaica</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Kingstown, St. Vincent and The Grenadines</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Kinshasa, Congo, Democratic Republic of the</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Koror, Palau</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Kuala Lumpur, Malaysia</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Kuwait City, Kuwait</option>
                    </optgroup>
                    <optgroup label="L">
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Libreville, Gabon</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Lilongwe, Malawi</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Lima, Peru</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Lisbon, Portugal</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Ljubljana, Slovenia</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Lome, Togo</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>London, United Kingdom</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Luanda, Angola</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Lusaka, Zambia</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Luxembourg, Luxembourg</option>
                    </optgroup>
                    <optgroup label="M">
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Madrid, Spain</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Majuro, Marshall Islands</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Malabo, Equatorial Guinea</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Male, Maldives</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Managua, Nicaragua</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Manama, Bahrain</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Manila, Philippines</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Maputo, Mozambique</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Maseru, Lesotho</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Mbabane, Swaziland</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Mexico City, Mexico</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Minsk, Belarus</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Mogadishu, Somalia</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Monaco, Monaco</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Monrovia, Liberia</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Montevideo, Uruguay</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Moroni, Comoros</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Moscow, Russian Federation</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Muscat, Oman</option>
                    </optgroup>
                    <optgroup label="N">
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>N'Djamena, Chad</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Nairobi, Kenya</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Nassau, Bahamas</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>New Delhi, India</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Niamey, Niger</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Nicosia, Cyprus</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Nouakchott, Mauritania</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Nuku'alofa, Tonga</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Nuuk, Greenland</option>
                    </optgroup>
                    <optgroup label="O">
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Oslo, Norway</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Ottawa - Ontario, Canada</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Ouagadougou, Burkina Faso</option>
                    </optgroup>
                    <optgroup label="P">
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Paris, France</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Palikir, Micronesia</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Panama City, Panama</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Paramaribo, Suriname</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Phnom Penh, Cambodia</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Podgorica, Montenegro</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Port Louis, Mauritius</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Port Moresby, Papua New Guinea</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Port Vila, Vanuatu</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Port-au-Prince, Haiti</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Port-of-Spain, Trinidad and Tobago</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Porto-Novo, Benin</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Prague, Czech Republic</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Praia, Cape Verde</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Pretoria, South Africa</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Pyongyang, Korea, North</option>
                    </optgroup>
                    <optgroup label="Q">
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Quito, Ecuador</option>
                    </optgroup>
                    <optgroup label="R">
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Rabat, Morocco</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Rangoon, Burma</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Reykjavik, Iceland</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Riga, Latvia</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Riyadh, Saudi Arabia</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Rome, Italy</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Roseau, Dominica</option>
                    </optgroup>
                    <optgroup label="S">
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>San Jose, Costa Rica</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>San Marino, San Marino</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>San Salvador, El Salvador</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Sana, Yemen</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Santiago, Chile</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Santo Domingo, Dominican Republic</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Sao Tome, Sao Tome and Principe</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Sarajevo, Bosnia and Herzegovina</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Seoul, Korea, South</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Singapore, Singapore</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Skopje, Macedonia</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Sofia, Bulgaria</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>St. George's, Grenada</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>St. John's, Antigua and Barbuda</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Stockholm, Sweden</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Suva, Fiji</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Sucre, Bolivia</option>
                    </optgroup>
                    <optgroup label="T">
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Taipei, Taiwan</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Tallinn, Estonia</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Tarawa, Kiribati</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Tashkent, Uzbekistan</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Tbilisi, Georgia</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Tegucigalpa, Honduras</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Teheran, Iran</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Thimphu, Bhutan</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Tirana, Albania</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Tokyo, Japan</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Tripoli, Libya</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Tunis, Tunisia</option>
                    </optgroup>
                    <optgroup label="U">
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Ulan Bator, Mongolia</option>
                    </optgroup>
                    <optgroup label="V">
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Vaduz, Liechtenstein</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Valletta, Malta</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Victoria, Seychelles</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Vienna, Austria</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Vientiane, Laos</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Vilnius, Lithuania</option>
                    </optgroup>
                    <optgroup label="W">
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Warsaw, Poland</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Washington D.C., United States</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Wellington, New Zealand</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Windhoek, Namibia</option>
                    </optgroup>
                    <optgroup label="X">
                      <option disabled="disabled">-- none --</option>
                    </optgroup>
                    <optgroup label="Y">
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Yamoussoukro, Cote d'Ivoire</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Yaounde, Cameroon</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Yaren, Nauru</option>
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Yerevan, Armenia</option>
                    </optgroup>
                    <optgroup label="Z">
                      <option <?php $x++; echo "value=\"".$x."\""; if($cc==$x) { echo " selected=\"yes\""; } ?>>Zagreb, Croatia</option>
                    </optgroup>
                  </select></p><?php if (!isset($submit)) {?>
                  <span id="annot_link_05" class="annot_link next_sib" style="margin-left: -11.95em !important;padding-right: 11em;margin-top:1.5em;"><a href="#annot_05" title="05: Pole wyboru z ulepszoną funkcjonalnością klawiatury">05</a></span><?php }?>
                </fieldset>
                <fieldset class="annot_link_parent">
                  <legend>Bezpłatny Biuletyn informacyjny (opcjonalnie)</legend>
                  <p>Aby otrzymać nasz bezpłatny newsletter, wypełnij następujące dane:</p>
                  <div style="width: 32em">
                    <p id="namenewsletter" class="input<?php if((!$name)||(!$title)) { echo " highlight"; } ?>"><?php if(!$name) { echo '<strong><abbr title="Required">*</abbr> Type your name'; if(!$title) { echo ' and select your title'; } echo '</strong><br> '; } elseif(!$title) { echo '<strong><abbr title="Required">*</abbr> Select your title</strong><br> '; } ?><label for="mr">Pan <input type="radio" name="t" id="mr" value="mr" title="title"<?php if($t=="mr") { echo " checked=\"yes\""; } ?>></label> <label for="mrs">Pani <input type="radio" name="t" id="mrs" value="mrs" title="title"<?php if($t=="mrs") { echo " checked=\"yes\""; } ?>></label> <label for="n">Nazwa: <input type="text" name="n" id="n" size="30" style="margin-left: 0.5em;"<?php if(strlen($n)>0) { echo " value=\"".$n."\""; } ?>></label></p>
                    <p id="emailinput" class="input<?php if(!$mail) { echo " highlight"; } ?>" style="width: 16em; float: left; margin-top: 0.5em;"><label for="em"><?php if(!$mail) { echo '<strong><abbr title="Required">*</abbr> Invalid '; } ?>Adres e-mail:<?php if(!$mail) { echo '</strong>'; } ?> <br><input type="text" name="em" id="em" size="20"<?php if(strlen($em)>0) { echo " value=\"".$em."\""; } ?>></label></p>
                    <p id="emailvalid" class="input<?php if(!$match) { echo " highlight"; } ?>" style="width: 16em; float: left; margin-top: 0.5em;"><label for="ev"><?php if(!$match) { echo '<strong><abbr title="Required">*</abbr> '; } ?>Powtórz adres e-mail:<?php if(!$match) { echo '</strong>'; } ?> <br><input type="text" name="ev" id="ev" size="20"<?php if(strlen($ev)>0) { echo " value=\"".$ev."\""; } ?>></label></p>
                  </div><?php if (!isset($submit)) {?>
                  <span id="annot_link_06" class="annot_link parent_node" style="margin-left: -11.95em !important;padding-right: 11em;margin-top:1.5em;"><a href="#annot_06" title="06: Znacząca sekwencja czytania">06</a></span><?php }?>
                </fieldset>
                <p class="input"><input type="submit" id="submit" value="submit" alt="submit" name="submit"></p>
                </form><?php
}?>
                <hr>
                <h2 id="surveyresults">Wyniki ankiety z ostatniego tygodnia</h2>
                <table class="qtable">
                  <caption>What is your favorite and least favorite organ?</caption>
                  <thead>
                    <tr>
                      <th></th>
                      <th scope="col">Lung</th>
                      <th scope="col">Pancreas</th>
                      <th scope="col">Spleen</th>
                      <th scope="col">Liver</th>
                      <th scope="col">Skin</th>
                      <th scope="col">Brain</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">hate it</th>
                      <td>4</td>
                      <td>10</td>
                      <td>4</td>
                      <td>0</td>
                      <td>1</td>
                      <td>0</td>
                    </tr>
                    <tr class="alt">
                      <th scope="row">love it</th>
                      <td>5</td>
                      <td>6</td>
                      <td>0</td>
                      <td>14</td>
                      <td>1</td>
                      <td>0</td>
                    </tr>
                  </tbody>
                </table><?php if (!isset($submit)) {?>
                <span id="annot_link_07" class="annot_link prev_sib" style="margin-left: -11.2em !important;padding-right: 10em;top: auto !important;bottom:7em;"><a href="#annot_07" title="07: Dane tabeli zostały poprawnie uporządkowane">07</a></span><?php }?>
              </div>
            </div>
            </main>
          </div>
          <!--// START FOOTER AREA //-->			  
          <footer id="footer">
            <p><a rel="Copyright" href="https://lepszyweb.pl">LepszyWeb.pl. Pracownia Dostępności Cyfrowej</a> &copy; 2019 &nbsp;&nbsp;&nbsp;<a rel="Copyright" href="http://www.w3.org/Consortium/Legal/ipr-notice#Copyright">Copyright</a> &copy; 2012 <a href="http://www.w3.org/"><acronym title="World Wide Web Consortium">W3C</acronym></a><sup>&reg;</sup> (<a href="http://www.csail.mit.edu/"><acronym title="Massachusetts Institute of Technology">MIT</acronym></a>, <a href="http://www.ercim.org/"><acronym title="European Research Consortium for Informatics and Mathematics">ERCIM</acronym></a>, <a href="http://www.keio.ac.jp/">Keio</a>)
            </p>
          </footer><!--// END FOOTER AREA //-->	
        </div>
      </div>
      <div id="border_b"></div>
    <div id="annotations">
      <hr>
      <h2>Adnotacje</h2><?php
if (!isset($submit)) {?>
      <div id="annot_01">
        <h3>Uwaga 01: Zapewnione instrukcje dotyczące formularzy</h3>
<p>Podano instrukcje dotyczące formularzy, szczególnie w odniesieniu do wymaganych pól.</p><p class="code"><code>&lt;form action=&quot;&quot; method=&quot;post&quot;&gt; &lt;p&gt;Pola są wymagane, jeśli nie zaznaczono inaczej.&lt;/p&gt;</code></p>
        <dl>
          <dt><a href="http://www.w3.org/WAI/WCAG20/quickref/#minimize-error-cues">Kryterium sukcesu 3.3.2 - Etykiety lub instrukcje</a></dt>
          <dd><a href="http://www.w3.org/TR/WCAG20-TECHS/G184">Technika ogólna G184</a>: Zapewnienie instrukcji tekstowych na początku formularza lub zestawu pól opisujących niezbędne dane wejściowe</dd>
        </dl>
        <p><a href="#annot_link_01">Wróć do demo</a></p>
      </div>
      <div id="annot_02">
      <div id="annot_02">
        <h3>Uwaga 02: Przyciski radiowe są pogrupowane w ramach kodu</h3>
		<p>Przyciski radiowe pogrupowane elementem <code>fieldset</code> i opisane za pomocą elementu <code>legend</code>.</p><p class="code"><code>&lt;fieldset id=&quot;park&quot;&gt; &lt;legend&gt;Favorite Park&lt;/legend&gt; ... &lt;/fieldset&gt;</code></p>
        <dl>
          <dt><a href="https://wcag.lepszyweb.pl/#labels-or-instructions">Kryterium sukcesu 3.3.2 - Etykiety lub instrukcje</a></dt>
          <dd><a href="https://www.w3.org/TR/WCAG20-TECHS/H71.html">Technika HTML H71</a>: Zapewnienie opisu dla grup formantów formularzy przy użyciu elementów fieldset i legendy</dd>
        </dl>
        <p><a href="#annot_link_02">Wróć do demo</a></p>
      </div>
      <div id="annot_03">
        <h3>Uwaga 03: Przycisk radiowy jest powiązany z jego etykietą</h3>
		<p>Przycisk radiowy jest powiązany z etykietą &quot;none&quot;  przy użyciu elementu <code>label</code>.</p><p class="code"><code>&lt;input type=&quot;radio&quot; name=&quot;res&quot; id=&quot;nn&quot; value=&quot;1&quot;&gt; &lt;label for="nn"&gt;Żaden&lt;/label&gt; </code></p>
        <dl>
          <dt><a href="https://wcag.lepszyweb.pl/#labels-or-instructions">Kryterium sukcesu 3.3.2 - Etykiety lub instrukcje</a></dt>
          <dd><ul><li><a href="https://www.w3.org/TR/WCAG20-TECHS/G162.html">Technika ogólna G162</a>: Pozycjonowanie etykiet w celu maksymalizacji przewidywalności relacji</li><li><a href="https://www.w3.org/TR/WCAG20-TECHS/H44.html">Technika HTML H44</a>: Używanie elementów etykiet do kojarzenia etykiet tekstowych z formantami formularzy</li></ul></dd>
        </dl>
        <p><a href="#annot_link_03">Wróć do demo</a></p>
      </div>
      <div id="annot_04">
        <h3>Uwaga 04: Pole wyboru ma tytuł</h3>
		<p>Pole wyboru jest oznaczone za pomocą tego elementu <code>title</code>.</p><p class="code"><code>&lt;select name=&quot;cc&quot; id=&quot;cc&quot; title=&quot;Światła Miasta&quot;&gt; </code></p>
        <dl>
          <dt><a href="https://wcag.lepszyweb.pl/#labels-or-instructions">Kryterium sukcesu 3.3.2 - Etykiety lub instrukcje</a></dt>
          <dd><a href="https://www.w3.org/TR/WCAG20-TECHS/H65.html">Technika HTML H65</a>: Używanie atrybutu title do identyfikowania formantów formularzy, gdy nie można użyć elementu etykiety</dd>
        </dl>
        <p><a href="#annot_link_04">Wróć do demo</a></p>
      </div>
      <div id="annot_05">
        <h3>Uwaga 05: Pole wyboru z ulepszoną funkcjonalnością klawiatury</h3>
		<p>Pozycje na tej długiej liście są pogrupowane i posortowane według miast, a nie według kraju, aby ułatwić efektywne korzystanie z klawiatury.</p>
        <dl>
          <dt><a href="https://wcag.lepszyweb.pl/#keyboard">Kryterium sukcesu 2.1.1 - Klawiatura</a></dt>
          <dd><ul><li><a href="https://www.w3.org/TR/WCAG20-TECHS/G202.html">Technika ogólna G202</a>: Zapewnienie kontroli klawiatury dla wszystkich funkcji</li><li><a href="https://www.w3.org/TR/WCAG20-TECHS/H91.html">Technika HTML H91</a>: Korzystanie z formantów formularzy HTML i linków</li><li>Używanie unikatowych kombinacji liter, aby rozpocząć każdy element listy (przyszły link)</li></ul></dd>
          <dt><a href="https://wcag.lepszyweb.pl/#bypass-blocks">Kryterium sukcesu 2.4.1 - Możliwość pominięcia bloków</a></dt>
          <dd><ul><li><a href="https://www.w3.org/TR/WCAG20-TECHS/H69.html">Technika HTML H69</a>: Dostarczanie elementów nagłówków na początku każdej sekcji treści</li><li>Zapewnienie dostępu do klawiatury dla ważnych linków i formantów formularzy (przyszły link)</li></ul></dd>
        </dl>
        <p><a href="#annot_link_05">Wróć do demo</a></p>
      </div>
      <div id="annot_06">
        <h3>Uwaga 06: Znacząca sekwencja czytania</h3>
		<p>Sekwencja etykiet i pól wprowadzania danych ma sens, gdy są odczytywane w kolejności, w jakiej pojawiają się w kodzie. Pola wejściowe są powiązane z ich etykietami za pomocą elementu <code>label</code>.</p><p class="code"><code>&lt;p id=&quot;namenewsletter&quot; class=&quot;input&quot;&gt;<br>&lt;label for=&quot;n&quot;&gt;Nazwa:&lt;/label&gt;<br>&lt;input type=&quot;radio&quot; name=&quot;t&quot; id=&quot;mr&quot; value&quot;mr&quot; title=&quot;title&quot;&gt;&lt;label for=&quot;mr&quot;&gt;Pan&lt;/label&gt;<br>&lt;input type&quot;radio&quot; name=&quot;t&quot; id=&quot;mrs&quot; value=&quot;mrs&quot; title=&quot;title&quot;&gt;&lt;label for=&quot;mrs&quot;&gt;Pani&lt;/label&gt;<br>&lt;input type=&quot;text&quot; name=&quot;n&quot; id=&quot;n&quot; size=&quot;30&quot; style=&quot;margin-left: 0.5em;&quot;&gt;&lt;/p&gt;<br>&lt;p id=&quot;emailinput&quot; class=&quot;input&quot; style=&quot;width: 16em; float: left; margin-top: 0.5em;&quot;&gt;<br>&lt;input type=&quot;text&quot; name=&quot;em&quot; id=&quot;em&quot; size=&quot;20&quot;&gt;&lt;br&gt;&lt;label for=&quot;em&quot;&gt;Adres e-mail&lt;/label&gt;&lt;/p&gt;<br>&lt;p id=&quot;emailvalid&quot; class=&quot;input&quot; style=&quot;width: 16em; float: left; margin-top: 0.5em;&quot;&gt;<br>&lt;input type=&quot;text&quot; name=&quot;ev&quot; id=&quot;ev&quot; size=&quot;20&quot;&gt;&lt;br&gt;&lt;label for=&quot;ev&quot;&gt;Powtórz adres e-mail&lt;/label&gt;&lt;/p&gt;</code></p>
        <dl>
          <dt><a href="https://wcag.lepszyweb.pl/#meaningful-sequence">Kryterium sukcesu 1.3.2 - Zrozumiała kolejność</a></dt>
          <dd><a href="https://www.w3.org/TR/WCAG20-TECHS/G57.html">Technika ogólna G57</a>: porządkowanie treści w znaczącej kolejności</dd>
          <dt><a href="https://wcag.lepszyweb.pl/#focus-order">Kryterium sukcesu 2.4.3 - Kolejność fokusa</a></dt>
          <dd><a href="https://www.w3.org/TR/WCAG20-TECHS/G59.html">Technika ogólna G59</a>: Umieszczanie elementów interaktywnych w kolejności następującej po sekwencjach i relacjach w treści</dd>
        </dl>
        <p><a href="#annot_link_06">Wróć do demo</a></p>
      </div>
      <div id="annot_07">
        <h3>Uwaga 07: Dane tabeli zostały poprawnie uporządkowane</h3>
		<p>Dane w tej tabeli są uporządkowane przy użyciu odpowiednich struktur tabel, takich jak elementy <code>th</code> i <code>td</code>.</p><p class="code"><code>&lt;th scope=&quot;row&quot;&gt;Nie lubię&lt;th&gt;<br>...<br>&lt;th scope=&quot;row&quot;&gt;Nie lubię&lt;th&gt;</code></p>
        <dl>
          <dt><a href="https://wcag.lepszyweb.pl/#info-and-relationships">Kryterium sukcesu 1.3.1 - Informacje i relacje</a></dt>
          <dd>
			  <ul>
				  <li><a href="https://www.w3.org/TR/WCAG20-TECHS/G140.html">Technika ogólna G140</a>: Oddzielanie informacji i struktury od prezentacji w celu umożliwienia różnych prezentacji</li>
				  <li><a href="https://www.w3.org/TR/WCAG20-TECHS/H51.html">Technika HTML H51</a>: Używanie znaczników tabel do prezentacji informacji tabelarycznych</li>
				  <li><a href="https://www.w3.org/TR/WCAG20-TECHS/H63.html">Technika HTML H63</a>: Używanie atrybutu scope do kojarzenia komórek nagłówka i komórek danych w tabelach danych</li>
			  </ul>
		  </dd>
        </dl>
        <p><a href="#annot_link_07">Wróć do demo</a></p>
      </div><?php
} else {
  if ($error) {?>
      <div id="annot_08">
        <h3>Uwaga 08: Komunikat informujący o błędzie</h3>
		<p>Wyraźny komunikat o błędzie wyjaśniający, dlaczego po wysłaniu fokus został ustawiony na najwyższy poziom.</p><p class="code"><code>&lt;p&gt;&lt;strong&gt;Błąd&lt;strong&gt; - Przesłanie ankiety nie powiodło się z powodu poniższych 2 problemów:&lt;/p&gt; </code></p>
        <dl>
          <dt><a href="http://www.w3.org/WAI/WCAG20/quickref/#minimize-error-identified">Kryterium sukcesu 3.3.1 - Identyfikacja błędów</a></dt>
          <dd>Sugerowana technika: Ponowne wyświetlenie formularza z podsumowaniem błędów (przyszły link)</dd>
        </dl>
        <p><a href="#annot_link_08">Wróć do demo</a></p>
      </div>
      <div id="annot_09">
        <h3>Uwaga 09: Opisane błędy i połączenie z miejscem błędu</h3>
		<p>Poszczególne błędy są opisane i powiązane z odpowiednią częścią formularza do korekty.</p><p class="code"><code>&lt;li&gt;Nie wybrano &lt;a href=&quot;#park&quot;&gt;ulubionego parku&lt;/a&gt;&lt;/li&gt;&lt;li&gt;&lt;label for=&quot;cc&quot;&gt;Nie wybrano &lt;a href=&quot;#city&quot;&gt;zielonego miasta&lt;/a&gt;&lt;/legend&gt;&lt;/li&gt;</code></p><p>Uwaga: Element <code>legend</code>  może być użyty więcej niż jeden raz do wpisania danych wejściowych do formularza.</p>
        <dl>
          <dt><a href="http://www.w3.org/WAI/WCAG20/quickref/#minimize-error-identified">Kryterium sukcesu 3.3.1 - Identyfikacja błędów </a></dt>
          <dd>
			  <ul>
				  <li><a href="http://www.w3.org/TR/WCAG20-TECHS/G83">Technika ogólna G83</a>: Zapewnienie opisów tekstowych zidentyfikujących pola, które nie zostały wypełnione.</li>
				  <li><a href="http://www.w3.org/TR/WCAG20-TECHS/G139">Technika ogólna G139:</a> Zapewnienie mechanizmu umożliwiającego użytkownikom przeskakiwanie do błędów</li>
			  </ul>
		  </dd>
        </dl>
        <p><a href="#annot_link_09">Wróć do demo</a></p>
      </div>
      <div id="annot_10">
        <h3>Uwaga 10: Zapewniona instrukcja wypełniania formularza</h3>
		<p>Instrukcje dotyczące formularzy są podane (ponownie), w szczególności w odniesieniu do wymaganych pól.</p><p class="code"><code>&lt;form action=&quot;&quot; method=&quot;post&quot;&gt; &lt;p&gt;Pola są wymagane, o ile nie zaznaczono inaczej.&lt;/p&gt;</code></p>
        <dl>
          <dt><a href="http://www.w3.org/WAI/WCAG20/quickref/#minimize-error-cues">Kryterium sukcesu 3.3.2 - Informacje i relacje</a></dt>
          <dd><a href="http://www.w3.org/TR/WCAG20-TECHS/G184">Technika ogólna G184</a>: Zapewnienie instrukcji tekstowych na początku formularza lub zestawu pól opisujących wymagane dane.</dd>
        </dl>
        <p><a href="#annot_link_10">Wróć do demo</a></p>
      </div>
      <div id="annot_11">
        <h3>Uwaga 11: Błędy wyraźnie zidentyfikowane i związane z instrukcją</h3>
		<p>Błędy są wyraźnie identyfikowane za pomocą kodów kolorystycznych, podkreślenia i gwiazdek, a użytkownik otrzymuje instrukcje dotyczące prawidłowego wypełniania pól formularza.</p><p class="code"><code>&lt;abbr title=&quot;Wymagane&quot;&gt;*&lt;/abbr&gt;</code></p>
        <dl>
          <dt><a href="http://www.w3.org/WAI/WCAG20/quickref/#minimize-error-identified">Kryterium sukcesu 3.3.1 - Identyfikacja błędów</a></dt>
          <dd>
			  <ul>
				  <li>Sugerowana technika: Podświetlanie lub wizualne podkreślenie błędów w miejscu ich wystąpienia (przyszły link)</li>
				  <li>Sugerowana technika: Uzupełnianie tekstu treścią nietekstową przy zgłaszaniu błędów (przyszły link)</li>
			  </ul>
		  </dd>
          <dt><a href="http://www.w3.org/WAI/WCAG20/quickref/#minimize-error-cues">Kryterium sukcesu 3.3.2 - Informacje i relacje</a></dt>
          <dd><a href="http://www.w3.org/TR/WCAG20-TECHS/G83">Technika ogólna G83</a>: Zapewnienie opisów tekstowych zidentyfikujących pola, które nie zostały wypełnione</dd>
        </dl>
        <p><a href="#annot_link_11">Wróć do demo</a></p>
      </div><?php
  } else {?>
      <div id="annot_12">
        <h3>Uwaga 12: Poinformowanie o pomyślym wypełnieniu formularza</h3>
		<p>Potwierdzenie pomyślnego wypełnienia formularza jest wyraźnie zaznaczone.</p><p class="code"><code>&lt;p id=&quot;submissionsuccess&quot;&gt;Dziękujemy Ci za przesłanie ankiety, która została pomyślnie zarejestrowana.&lt;/p&gt; </code></p>
        <dl>
          <dt><a href="http://www.w3.org/WAI/WCAG20/quickref/#minimize-error-cues">Kryterium sukcesu 3.3.1 - Identyfikacja błędów</a></dt>
          <dd><a href="http://www.w3.org/TR/WCAG20-TECHS/G199">Technika ogólna G199</a>: Zapewnienie informacji zwrotnej o sukcesie, gdy dane zostaną pomyślnie przesłane.</dd>
        </dl>
        <p><a href="#annot_link_12">Wróć do demo</a></p>
      </div><?php
  }
}?>
    </div>
  </div>
		<div id="meta-footer" class="meta">
			<hr />
			<div class="meta-footer-in">
				<p><strong>Przed i Po</strong> wydanie polskie. Copyright <a href="https://joomla.pl">Polskie Centrum Joomla</a> &copy; 2018. Projekt: <a href="http://dostepny.joomla.pl" shape="rect">Kuźnia Dostępnych Stron</a>.</p>
				<p>[<a href="http://dostepny.joomla.pl/mapa-witryny" shape="rect">Mapa serwisu KDS</a>] [<a href="http://demo.dostepny.joomla.pl" shape="rect">Demo Kuźni Dostępnych Stron</a>] [<a href="http://dostepny.joomla.pl/kontakt" shape="rect">Kontakt</a>]</p>
	  
				<div class="copyright">
					<p>Niniejsza witryna jest unowocześnioną wersją witryny <a href="https://www.w3.org/WAI/demos/bad/"><span lang="en">Before and After Demonstration (BAD)</a>  <a rel="Copyright" href="http://www.w3.org/Consortium/Legal/ipr-notice#Copyright">Copyright</a> &copy; 2012 <a href="http://www.w3.org/">World Wide Web Consortium</a>, (<a href="http://www.lcs.mit.edu/">Massachusetts Institute of Technology</a>, <a href="http://www.ercim.org/">European Research Consortium for Informatics and Mathematics</a>, <a href="http://www.keio.ac.jp/">Keio University</a>, <a href="http://ev.buaa.edu.cn/">Beihang</a>). All Rights Reserved.</p>
	  
					<p><a href="https://www.w3.org/WAI/demos/bad/">Oryginalna wersja BAD</a> została opracowana <b>pod redakcją</b> <a href="http://www.w3.org/People/shadi/">Shadi Abou-Zahra</a> oraz <a href="http://www.w3.org/WAI/EO/" title="Grupy Roboczej Edukacji i Informacji" lang="en">Education and Outreach Working Group (EOWG)</a> dzięki wsparciu projektów <a href="http://www.w3.org/WAI/TIES/"><abbr title="Web Accessibility Initiative: Training, Implementation, Education, Support">WAI-TIES</abbr></a> oraz <a href="http://www.w3.org/WAI/WAI-AGE/"><abbr title="Web Accessibility Initiative: Ageing Education and Harmonisation">WAI-AGE</abbr></a> i współfinansowana przez Komisję Europjską w ramach programu <abbr lang="en" title="Information Society Technologies">IST</abbr>. Zobacz <a href="../../acks.html">Podziękowania</a>. Opracowanie wersji polskiej: Stefan Wajda</p> 
					<p>Witryna jest udostępniana na warunkach <a href="http://www.w3.org/Consortium/Legal/copyright-software">W3C® Software License</a> z nadzieją, że będzie przydatna, ale <strong>bez jakiejkolwiek gwarancji</strong>; nawet domyślnej gwarancji <strong>przydatności handlowej lub przydatności do określonych celów</strong>.</p>
				</div>	  
				<p><strong>Status:</strong> Ostatnia aktualizacja 15 sierpnia 2018. (zobacz <a href="../../changelog.html">dziennik zmian</a>) </p>
			</div>
		</div>
    <div id="lightbox_background"><div id="lightbox_container"></div></div>
  </body>
</html>