<?php

// Ze zeggen dat je de gebruiker nooit mag vertrouwen
// daarom gaan we direct wat meer controleren
 
// Een beetje configuratie
$conf = array(
    'mail' => 'info@escapekist.com'
);
 
// Deze functie doet een snelle check op lege waarden.
// Zoals de naam beschrijft is een waarde vereist.
function validate_required($value)
{
    if (is_null($value)) {
        return false;
    } elseif (is_string($value) and trim($value) === '') {
        return false;
    }
    return true;
}
 
// Ik kijk mijn drie specifieke velden na, ander zouden ze misschien
// nog met iets anders kunnen afkomen. Ik ga niet nakijken of de knop
// ingedrukt is.
if ('POST' === $_SERVER['REQUEST_METHOD'] and isset($_POST['inputName'], $_POST['inputEmail'], $_POST['inputMessage'])) {
    // Even zorgen dat de overbodige spaties weggehaald worden.
    $name = trim($_POST['inputName']);
    $email = trim($_POST['inputEmail']);
    $message = trim($_POST['inputMessage']);
 
    // Aanmaken van een array voor de foutmeldingen
    $errors = array();
 
    if (!validate_required($name) or strlen($name) < 2) {
        $errors[] = "Gelieve een naam op te geven.";
    }
    if (!validate_required($email) or !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Gelieve een geldige e-mail op te geven.";
    }
   
 
    // Als het aantal errors 0 is dan kunnen we een mailtje versturen
    if (0 == count($errors)) {
        // Dit is voor een mooi mailtje te bekomen.
        $headers = 'From: ' . $name . ' <' . $email . '>' . "\r\n";
        $headers .= 'Reply-To: ' . $name . ' <' . $email . '>' . "\r\n";
        $headers .= 'X-Mailer: PHP/' . phpversion() . "\r\n";
 
        $isSent = mail($conf['mail'], 'Reservering/vraag', $message, $headers);
 
        if ($isSent):
            ?> <script type="text/javascript" src="index.js"></script>
<div class="alert alert-success" id="verzonden" style=" 
    position: fixed;
    width: 100%;
    display:block;
    text-align: center;
    z-index: 100000;">
    <p> Je berichtje is goed verzonden. Wij nemen zo snel mogelijk contact met u op (check ook uw spamfolder)! <span
            onclick="closeAll(verzonden)" style="text-align: end; cursor: pointer; padding: 5px;">X</span> </p>
</div>
<?php else:
            ?> <script type="text/javascript" src="index.js"></script>
<div class=" alert alert-danger" id="y" style="  
  position: fixed;
  display:block;
    width: 100%;
    text-align: center;
    z-index: 100000;">
    <p> Oeps, er ging iets mis. Probeer het straks nog eens. <span onclick="closeAll(y)"
            style="text-align: end; cursor: pointer; padding: 5px;">X</span> </p>
</div>
<?php
        endif;
    } else {
        ?> <script type="text/javascript" src="index.js"></script>
<div class="alert alert-danger" id="errors" style="position: fixed;
    width: 100%;
    display:block;
    text-align: center;
    z-index: 100000;">
    <ul>
        <?php foreach ($errors as $error): ?>
        <li><?php echo $error; ?></li>
        <?php endforeach; ?>
    </ul>
    <span onclick="closeAll(errors)" style="text-align: end; cursor: pointer; padding: 5px;">X</span> </p>
</div>
<?php
    }
}
?>

<!--
  Het onderstaande formulier geeft je de mogelijkheid
  om de volgende gegevens van de gebruiker te vragen.
 
  - Naam
  - E-mail
  - Bericht
 
  Deze 3 velden zullen we dan met PHP bekijken of
  ze allemaal zijn ingevuld. Mocht dit oke lijken
  dan versturen we de mail.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Escapekist.com - Het Belaste Verleden</title>
    <meta property="og:type" content="business.business">
    <meta property="og:title" content="Escapekist: Het Belaste Verleden">
    <meta property="og:url" content="https://escapekist.com/">
    <meta property="og:image" content="https://escapekist.com/imgs/logo.png">
    <meta property="og:description"
        content="Een uniek spelconcept dat je samen met familie of vrienden kunt spelen.Een echte escaperoom, maar dan voor thuis!">
    <meta property="business:contact_data:street_address" content="Texelstroom">
    <meta property="business:contact_data:locality" content="wieringerwerf">
    <meta property="business:contact_data:region" content="noord-holland">
    <meta property="business:contact_data:postal_code" content="1771hn">
    <meta property="business:contact_data:country_name" content="Netherlands">
    <meta charset="UTF-8">
    <meta name="viewport" content="max-width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&family=Roboto+Mono:wght@100;300;500&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Special+Elite&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="app.css">
    <link rel="shortcut icon" type="image/x-icon" href="imgs/favicon.ico" />
    <meta name="description" lang="nl" content="Een uniek spelconcept dat je samen met familie of vrienden kunt spelen.
                            Onze escapekisten kunt u geheel coronaproef thuis spelen. Een echte
                            escaperoom, maar dan voor thuis!">
</head>

<body id="wheat">

    <div class="container-fluid container1">
        <nav id="nav" class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand" id="navbarbrand" href="index.html"> </a>
                <button class="navbar-toggler btn btn-outline-primary no-border" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                    aria-label="Toggle navigation"> <span>MENU</span>
                </button>
                <div class="collapse navbar-collapse row" id="navbarTogglerDemo02">
                    <div class="col-12">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 justify-content-evenly navbar-ul nav">
                            <div class="">
                                <li class="nav-item"> <a class="nav-link active-site" href="#HOME">HOME</a></li>
                            </div>
                            <div class="">
                                <li class="nav-item"> <a class="nav-link" href="/escapekisten">ESCAPEKISTEN</a>
                                </li>
                            </div>
                            <div class="">
                                <li class="nav-item"> <a class="nav-link" href="/contact">CONTACT</a></li>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <div class="social">
        <a href="https://www.instagram.com/operatie_belaste_verleden/">
            <img src="https://img.icons8.com/fluent/96/000000/instagram-new.png" alt="instagram link" /></a>
        <a class="facebook" href="https://www.facebook.com/Escapekisthetbelasteverleden">
            <img src="https://img.icons8.com/fluent/96/000000/facebook-new.png" alt="facebook link" /></a>
    </div>
    <main id="index">

        <!-- <div class="mainphoto d-none d-md-block" id="mainphoto"> </div> -->
        <div class="mainphoto" id="slideshow">
            <!-- id="slideshow"> -->
            <img src="imgs/old/kist1.jpg" alt="foto van de kist: overall">
            <img src="imgs/old/kistclose.jpg" alt="foto van de kist: close-up">
            <img src="imgs/old/kistdicht2.jpg" alt="foto van de kist: kist is dicht">
            <img src="imgs/old/kistopen2.jpg" alt="foto van de kist: kist is open">
            <img src="imgs/old/kistopen3.jpg" alt="foto van de kist: kist is open 2">
            <img src="imgs/old/kistopen.jpg" alt="foto van de kist: kist is open, close-up">
            <img src="imgs/old/kistdicht.jpg" alt="foto van de kist: kist is dicht">
            <img src="imgs/old/kistopen22.jpg" alt="foto van de kist: kist is dicht, close-up">
        </div>
        <div id="redder">
            <!-- <div class="fade_bg"></div> -->
            <div class="container-fluid second">
                <div class="row justify-content-center align-items-center ">
                    <div class="col-3 leftside d-none d-md-block">
                        <p class="mb-2 mt-5 handler start">50 &deg;
                            <hr style="width: 180px;">
                        </p>
                        <p class=" mb-2 handler">55 &deg;
                            <hr style="width: 380px;">
                        </p>
                        <p class="mb-2 handler">50 &deg;
                            <hr style="width: 520px;">
                        </p>
                        <p class="mb-2 handler">45 &deg;
                            <hr style="width: 660px;">
                        </p>
                        <p class="mb-2 handler "> 40 &deg;
                        <div class="cross d-md-block d-none">
                            <p class="cross">X</p>
                        </div>
                        <hr style="width: 800px;">
                        </p>
                    </div>
                    <div class="col-12 col-md-6 middle mb-md-5 mb-0">
                        <div class="vlag"><img class="vlag" src="imgs/Middel5.png" alt="foto van de Nederlandse vlag">
                        </div>
                        <h1 class="mb-3">ESCAPEKIST
                        </h1>

                        <p>Een uniek spelconcept dat je samen met familie of vrienden kunt spelen. <br>
                            Kraakt U de code? Onze escapekisten kunt u geheel coronaproef thuis spelen. Een echte
                            escaperoom, maar dan voor thuis!
                        </p>
                        <p class="mb-2"> <br>
                            Met veel enthousiasme gemaakt, </p>
                        <p class="names"> Team Landelijke Organisatie Van Helden (LOVH): <br>
                            Kees Bosma <br>
                            Robin Brouwer <br>
                            Dick Kapiteyn <br>
                        </p>
                        <h2 class="mb-3 mt-4"> Onze escapekisten </h2>

                        <div class="kisten mb-md-5">
                            <h3 class="mb-3 mt-4"> OPERATIE<span class="symbol">:</span> HET BELASTE <span
                                    class="badge bg-primary d-none d-lg-inline">Favoriet </span> <br> VERLEDEN

                            </h3>
                            <p>Onze populairste escapekist. Bent u uw zenuwen de baas, of laat u de verrader ontglippen?
                            </p>
                            <a href="/escapekisten"><button href="/escapekisten" type="button"
                                    class="btn btn-primary mt-3 index-btn"> Meer
                                    informatie
                                </button></a>

                            <a href="/contact"><button type="button" class="btn btn-primary mt-3 index-btn">
                                    Reserveren
                                </button></a>
                        </div>

                        <div class="fotos d-md-none">
                            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-indicators">

                                    <button type="button" data-bs-target="#carouselExampleIndicators"
                                        data-bs-slide-to="0" class="active" aria-current="true"
                                        aria-label="Slide 1"></button>

                                    <button type="button" data-bs-target="#carouselExampleIndicators"
                                        data-bs-slide-to="1" aria-label="Slide 2"></button>

                                    <button type="button" data-bs-target="#carouselExampleIndicators"
                                        data-bs-slide-to="2" aria-label="Slide 3"></button>

                                    <button type="button" data-bs-target="#carouselExampleIndicators"
                                        data-bs-slide-to="3" aria-label="Slide 4"></button>

                                    <button type="button" data-bs-target="#carouselExampleIndicators"
                                        data-bs-slide-to="4" aria-label="Slide 5"></button>

                                    <button type="button" data-bs-target="#carouselExampleIndicators"
                                        data-bs-slide-to="5" aria-label="Slide 6"></button>

                                </div>
                                <div class="carousel-inner">
                                    <div class="carousel-item active" data-bs-interval="10000">
                                        <img src="imgs/old/kist1.jpg" class="d-block w-100" alt="foto van de kist">
                                    </div>
                                    <div class="carousel-item" data-bs-interval="10000">
                                        <img src="imgs/old/kistclose.jpg" class="d-block w-100"
                                            alt="foto van de kist: dicht">
                                    </div>
                                    <div class="carousel-item" data-bs-interval="10000">
                                        <img src="imgs/robin.jpg" class="d-block w-100"
                                            alt="foto van persoon die kist onderzoekt">
                                    </div>
                                    <div class="carousel-item" data-bs-interval="10000">
                                        <img src="imgs/old/kistdicht2.jpg" class="d-block w-100"
                                            alt="foto van de kist: kist is dicht">
                                    </div>
                                    <div class="carousel-item" data-bs-interval="10000">
                                        <img src="imgs/old/kistopen3.jpg" class="d-block w-100"
                                            alt="foto van de kist: kist is open">
                                    </div>
                                    <div class="carousel-item" data-bs-interval="10000">
                                        <img src="imgs/old/kistdicht.jpg" class="d-block w-100"
                                            alt="foto van de kist: kist is dicht">
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                        <!-- 
                        <div class="kisten">
                            <h1 class="mb-3 mt-4"> OPERATIE: VERGETEN HELDEN <span
                                    class="badge bg-primary d-none d-lg-inline uitverkocht">Uitverkocht </span>

                            </h1>
                            <p>Bent u de held of de schlemiel? Test het met deze escapekist.
                            </p>
                            <button type="button" class="btn btn-primary mt-3"> <a href="/escapekisten">Meer
                                    informatie</a>
                                </a></button> <button type="button" class="btn btn-primary mt-3"> <a
                                    href="/escapekisten">Reserveren</a>
                                </a></button>
                        </div> -->
                    </div>

                    <div class="col-3 rightside">

                    </div>
                </div>
                <div class="container " id="containerbottom">
                    <div class="row vertical-lines justify-content-center align-items-center">
                        <div class="col-3 d-lg-none">

                        </div>
                        <div class="col-9">
                            <div class="row vertical-row justify-content-center justify-content-lg-start">
                                <div class=" col-3 vertical-line ">
                                    <p class="handler handler-two start-two">5 &deg;</p>
                                </div>
                                <div class="col-3 vertical-line2 ">
                                    <p class="handler handler-two">10 &deg;</p>
                                </div>

                                <div class="col-3 vertical-line3">
                                    <p class="handler handler-two lasts">15 &deg;</p>
                                </div>

                                <div class="col-3 vertical-line4">
                                    <p class="handler handler-two lasts"></p>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="footer pt-3">
        <div class="container-fluid">
            <div class="row mt-3">
                <div class="col-md-1 col-sm-12 text-center">
                    <img src="imgs/logo.png" class="icon img-fluid" alt="logo">
                </div>
                <div class="col-md-9 col-sm-12">
                    <form action="index.php" method="post" class="form-horizontal" role="form">
                        <div class="row">

                            <div class="col-md-3">
                                <div class="form-group row justify-content-center">
                                    <label for="inputName" class="col-lg-10 control-label">Naam</label>

                                    <div class="col-lg-10">
                                        <input type="text" class="form-control mb-3" id="inputName" name="inputName"
                                            placeholder="Jan"
                                            value="<?php echo (isset($_POST['inputName']) and !is_null($_POST['inputName'])) ? htmlentities($_POST['inputName']) : ""; ?>" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="inputEmail" class="col-lg-10 control-label">E-mail</label>

                                    <div class="col-lg-10">
                                        <input type="email" class="form-control mb-3" id="inputEmail" name="inputEmail"
                                            placeholder="voorbeeld@gmail.com"
                                            value="<?php echo (isset($_POST['inputEmail']) and !is_null($_POST['inputEmail'])) ? htmlentities($_POST['inputEmail']) : ""; ?>" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 mb-3">
                                <div class="form-group row justify-content-center">
                                    <label for="inputMessage" class="col-lg-10 control-label">Bericht</label>

                                    <div class="col-lg-10">
                                        <textarea class="form-control bericht" rows="3" id="inputMessage"
                                            name="inputMessage"><?php echo (isset($_POST['inputMessage']) and !is_null($_POST['inputMessage'])) ? htmlentities($_POST['inputMessage']) : ""; ?></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group row justify-content-center mt-3">
                                    <div class="col-lg-10">
                                        <button type="submit" class="btn btn-primary">Verstuur bericht</button>
                                    </div>
                                </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="col-md-2 col-sm-12">
            <div class="row cookies-priv">
                <div class="col-12 mt-4 mb-2">
                    <ul class="list-unstyled">
                        <li class="prime_c">Info@escapekist.com</li>
                        <li class="mt-2"><a href="/privacy">Privacy policy</a></li>
                        <li class="mt-2"><a href="/cookies">Cookies</a></li>
                    </ul>
                </div>
            </div>
        </div>
        </div>
        </div>
    </footer>


    <!-- credits: https://www.codeply.com/p/EJd6H4Ejyi -->
    <div id="cookieConsent">
        <div id="closeCookieConsent">x</div>
        Escapekist.com maakt gebruik van Cookies <a href="/cookies" target="_blank">Meer informatie over
            cookies</a>. <a href="/cookies" target="_blank">Bekijk hier onze privacystatement</a>. <a
            class="cookieConsentOK">accepteer</a>
    </div>



    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript">


    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>
    <script src="index.js"></script>
</body>

</html>