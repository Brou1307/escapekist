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

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Escapekist.com - Escapekisten</title>
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
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <meta name="description" lang="nl" content="Reserveer hier uw escapekist. Een echte
                            escaperoom, maar dan voor thuis!">
</head>

<body id="escapekisten">

    <div class="container-fluid container1">
        <nav id="nav" class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand" id="navbarbrand" href="index.html"> </a>
                <button class="navbar-toggler btn btn-outline-primary no-border" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                    aria-label="Toggle navigation"> <span>MENU</span>
                </button>
                <div class="collapse navbar-collapse row navbar-ul" id="navbarTogglerDemo02">
                    <div class="col-12">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 justify-content-evenly nav">
                            <div class="">
                                <li class="nav-item"> <a class="nav-link " href="https://www.escapekist.com">HOME</a>
                                </li>
                            </div>
                            <div class="">
                                <li class="nav-item"> <a class="nav-link active-site" href="HOME">ESCAPEKISTEN</a>
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
    <main id="esc">


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

            <div class="container-fluid second">
                <div class="row justify-content-center align-items-center ">

                    <div class="col-3 leftside d-none d-md-block">
                        <p class="mb-2 mt-5 handler start">50 &deg;
                            <hr style="width: 180px;">
                        </p>
                        <p class=" mb-2 handler ">55 &deg;
                            <hr style="width: 380px;">
                        </p>
                        <p class="mb-2 handler ">50 &deg;
                            <hr style="width: 520px;">
                        </p>
                        <p class="mb-2 handler">45 &deg;
                            <hr style="width: 660px;">
                        </p>
                        <p class="mb-2 handler"> 40 &deg;
                        <div class="cross d-md-block d-none">
                            <p class="cross">X</p>
                        </div>
                        <hr style="width: 800px;">
                        </p>
                    </div>

                    <div class="col-12 col-md-6 middle mb-md-5 mb-0">

                        <div class="col-12 names">
                            <h1>Hoe werkt het<span class="symbol">?</span></h1>
                            <ul class="">
                                <li>U reserveert de kist via de mail</li>
                                <li>U krijgt daarna een bevestiging</li>
                                <li>Op het door uw gereserveerde moment krijgt u de kist thuis bezorgd</li>
                                <li>U heeft anderhalf uur de tijd om de kist te ontrafelen</li>
                                <li>Na anderhalfuur wordt de kist weer bij u opgehaald</li>
                            </ul>
                        </div>
                        <div class="col-12">
                            <h2 class="mt20">onze kisten</h2>
                            <div class="vlagen"><img class="vlagen" src="imgs/logo.png" alt="Nederlandse vlag"></div>
                            <div class="info-kist mb-3 row justify-content-center">
                                <div class="col-6">
                                    <span> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                                            <path
                                                d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z" />
                                        </svg> 2-5 spelers </span>
                                </div>

                                <div class="col-6">
                                    <span> v.a. 14 jaar </span>
                                </div>

                                <div class="col-6">
                                    <span> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-stopwatch" viewBox="0 0 16 16">
                                            <path
                                                d="M8.5 5.6a.5.5 0 1 0-1 0v2.9h-3a.5.5 0 0 0 0 1H8a.5.5 0 0 0 .5-.5V5.6z" />
                                            <path
                                                d="M6.5 1A.5.5 0 0 1 7 .5h2a.5.5 0 0 1 0 1v.57c1.36.196 2.594.78 3.584 1.64a.715.715 0 0 1 .012-.013l.354-.354-.354-.353a.5.5 0 0 1 .707-.708l1.414 1.415a.5.5 0 1 1-.707.707l-.353-.354-.354.354a.512.512 0 0 1-.013.012A7 7 0 1 1 7 2.071V1.5a.5.5 0 0 1-.5-.5zM8 3a6 6 0 1 0 .001 12A6 6 0 0 0 8 3z" />
                                        </svg> 90 minuten</span>
                                </div>

                                <div class="col-6">
                                    <span> &euro;60,-</span>
                                </div>
                            </div>
                        </div>
                        <p>Het is 1943 en het verzet is op volle kracht actief. Dan belt er opeens iemand bij jullie
                            thuis
                            aan. Wat moet deze verzetsstrijder van jullie? Waarom vraagt hij dringend of jullie
                            tijdelijk op
                            deze kist met uiterst waardevolle informatie willen passen? De kist, die duidelijk van
                            het
                            verzet is, intrigeert jullie. Kunnen jullie de verleiding weerstaan of openen jullie de
                            kist
                            om
                            erachter te komen welke intriges zich afspelen binnen de verzetsgroep ‘Landelijke
                            organisatie
                            van Helden’? </p>
                        <div class="fotos m-md-2 m-lg-5 mb-5">
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
                                        <img src="imgs/old/kist1.jpg" class="d-block w-100"
                                            alt="foto van de kist: overall">
                                    </div>
                                    <div class="carousel-item" data-bs-interval="10000">
                                        <img src="imgs/old/kistclose.jpg" class="d-block w-100"
                                            alt="foto van de kist: close-up">
                                    </div>
                                    <div class="carousel-item" data-bs-interval="10000">
                                        <img src="imgs/robin.jpg" class="d-block w-100"
                                            alt="foto van persoon die kist onderzoekt">
                                    </div>
                                    <div class="carousel-item" data-bs-interval="10000">
                                        <img src="imgs/old/kistopen.jpg" class="d-block w-100"
                                            alt="foto van de kist: kist is open">
                                    </div>
                                    <div class="carousel-item" data-bs-interval="10000">
                                        <img src="imgs/old/kistopen3.jpg" class="d-block w-100"
                                            alt="foto van de kist: kist is open, close-up">
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
                        <a href="/contact"> <button type="button" class="btn btn-primary mt-md-5 mb-5"> Reserveren
                            </button></a>
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
                                    <p class="handler handler-two start-two" onclick="nextImage6()">5 &deg;</p>
                                </div>
                                <div class="col-3 vertical-line2 ">
                                    <p class="handler handler-two" onclick="nextImage7()">10 &deg;</p>
                                </div>

                                <div class="col-3 vertical-line3">
                                    <p class="handler handler-two lasts" onclick="nextImage8()">15 &deg;</p>
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
                    <form action="escapekisten.php" method="post" class="form-horizontal" role="form">
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



    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript">


    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>
    <script src="index.js"></script>
</body>

</html>