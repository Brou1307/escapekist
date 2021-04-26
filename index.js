
var images = [];
function preload() {
    for (var i = 0; i < arguments.length; i++) {
        images[i] = new Image();
        images[i].src = preload.arguments[i];
    }
}

//-- usage --//
preload(
    "imgs/old/hek.jpg",
    "imgs/old/kistclose.jpg",
    "imgs/old/kistopen.jpg",
    "imgs/old/kist1.jpg",
    "imgs/old/kistopen3.jpg",
    "imgs/old/kistdicht2.jpg",
    "imgs/old/kistopen2.jpg",
    "imgs/old/kistdicht.jpg",
    "imgs/old/kistdicht24.jpg",
    "imgs/old/kistopen22.jpg"
)

var duration = 90; // duration in seconds
var fadeAmount = 0.3; // fade duration amount relative to the time the image is visible

$(document).ready(function () {
    var images = $("#slideshow img");
    var numImages = images.size();
    var durationMs = duration * 1000;
    var imageTime = durationMs / numImages; // time the image is visible 
    var fadeTime = imageTime * fadeAmount; // time for cross fading
    var visibleTime = imageTime - (imageTime * fadeAmount * 2);// time the image is visible with opacity == 1
    var animDelay = visibleTime * (numImages - 1) + fadeTime * (numImages - 2); // animation delay/offset for a single image 

    images.each(function (index, element) {
        if (index != 0) {
            $(element).css("opacity", "0");
            setTimeout(function () {
                doAnimationLoop(element, fadeTime, visibleTime, fadeTime, animDelay);
            }, visibleTime * index + fadeTime * (index - 1));
        } else {
            setTimeout(function () {
                $(element).animate({ opacity: 0 }, fadeTime, function () {
                    setTimeout(function () {
                        doAnimationLoop(element, fadeTime, visibleTime, fadeTime, animDelay);
                    }, animDelay)
                });
            }, visibleTime);
        }
    });
});

// creates a animation loop
function doAnimationLoop(element, fadeInTime, visibleTime, fadeOutTime, pauseTime) {
    fadeInOut(element, fadeInTime, visibleTime, fadeOutTime, function () {
        setTimeout(function () {
            doAnimationLoop(element, fadeInTime, visibleTime, fadeOutTime, pauseTime);
        }, pauseTime);
    });
}

// shorthand for in- and out-fading
function fadeInOut(element, fadeIn, visible, fadeOut, onComplete) {
    return $(element).animate({ opacity: 1 }, fadeIn).delay(visible).animate({ opacity: 0 }, fadeOut, onComplete);
}

// var imageSources = ["imgs/old/hek.jpg", "imgs/old/kistclose.jpg", "imgs/old/kistopen.jpg", "imgs/old/kist1.jpg", "imgs/old/kistopen3.jpg", "imgs/old/kistdicht2.jpg", "imgs/old/kistopen2.jpg", "imgs/old/kistdicht.jpg"]
// var index = 0;
// setInterval(function () {
//     if (index === imageSources.length) {
//         index = 0;
//     }
//     document.getElementById("mainphoto").style.backgroundImage = "url(" + imageSources[index] + ")";
//     index++;
// }, 10000);


// var firstPicture = document.querySelectorAll(".handler")
// var lastHandler = document.querySelectorAll(".lasts")
// var mediaQuery = window.matchMedia("(max-width: 766px)")
// var index = 0;
// setInterval(function () {
//     if ((lastHandler[0].style.opacity === "1")) {
//         index = 0;
//     }; if (mediaQuery.matches) {
//         console.log("hello")
//     } else {
//         firstPicture[0].style.opacity = "0.2";
//         firstPicture[1].style.opacity = "0.2";
//         firstPicture[2].style.opacity = "0.2";
//         firstPicture[3].style.opacity = "0.2";
//         firstPicture[4].style.opacity = "0.2";
//         firstPicture[5].style.opacity = "0.2";
//         firstPicture[6].style.opacity = "0.2";
//         firstPicture[7].style.opacity = "0.2";
//         firstPicture[index].style.opacity = "1";

//         firstPicture[0].style.color = "black";
//         firstPicture[1].style.color = "black";
//         firstPicture[2].style.color = "black";
//         firstPicture[3].style.color = "black";
//         firstPicture[4].style.color = "black";
//         firstPicture[5].style.color = "black";
//         firstPicture[6].style.color = "black";
//         firstPicture[7].style.color = "black";
//         firstPicture[index].style.color = "#faa307";
//     };
//     index + index;
// }, 10000);


// function nextImage() {
//     var y = document.getElementById("mainphoto")
//     y = document.getElementById("mainphoto").style.backgroundImage = "url(imgs/hek.jpg)";
//     firstPicture[0].style.opacity = "1";
//     firstPicture[0].style.color = "#faa307";
//     firstPicture[1].style.opacity = "0.2";
//     firstPicture[2].style.opacity = "0.2";
//     firstPicture[3].style.opacity = "0.2";
//     firstPicture[4].style.opacity = "0.2";
//     firstPicture[5].style.opacity = "0.2";
//     firstPicture[6].style.opacity = "0.2";
//     firstPicture[7].style.opacity = "0.2";

//     firstPicture[1].style.color = "black";
//     firstPicture[2].style.color = "black";
//     firstPicture[3].style.color = "black";
//     firstPicture[4].style.color = "black";
//     firstPicture[5].style.color = "black";
//     firstPicture[6].style.color = "black";
//     firstPicture[7].style.color = "black";
// }

// function nextImage2() {
//     var y = document.getElementById("mainphoto")
//     y = document.getElementById("mainphoto").style.backgroundImage = "url(imgs/hek.jpg)";
//     firstPicture[0].style.opacity = "0.2";
//     firstPicture[1].style.opacity = "1";
//     firstPicture[1].style.color = "#faa307";
//     firstPicture[2].style.opacity = "0.2";
//     firstPicture[3].style.opacity = "0.2";
//     firstPicture[4].style.opacity = "0.2";
//     firstPicture[5].style.opacity = "0.2";
//     firstPicture[6].style.opacity = "0.2";
//     firstPicture[7].style.opacity = "0.2";

//     firstPicture[0].style.color = "black";
//     firstPicture[2].style.color = "black";
//     firstPicture[3].style.color = "black";
//     firstPicture[4].style.color = "black";
//     firstPicture[5].style.color = "black";
//     firstPicture[6].style.color = "black";
//     firstPicture[7].style.color = "black";

// }

// function nextImage3() {
//     var y = document.getElementById("mainphoto")
//     y = document.getElementById("mainphoto").style.backgroundImage = "url(imgs/kistclose.jpg)";
//     firstPicture[0].style.opacity = "0.2";
//     firstPicture[1].style.opacity = "0.2";
//     firstPicture[2].style.opacity = "1";
//     firstPicture[2].style.color = "#faa307";
//     firstPicture[3].style.opacity = "0.2";
//     firstPicture[4].style.opacity = "0.2";
//     firstPicture[5].style.opacity = "0.2";
//     firstPicture[6].style.opacity = "0.2";
//     firstPicture[7].style.opacity = "0.2";

//     firstPicture[0].style.color = "black";
//     firstPicture[1].style.color = "black";
//     firstPicture[3].style.color = "black";
//     firstPicture[4].style.color = "black";
//     firstPicture[5].style.color = "black";
//     firstPicture[6].style.color = "black";
//     firstPicture[7].style.color = "black";
// }

// function nextImage4() {
//     var y = document.getElementById("mainphoto")
//     y = document.getElementById("mainphoto").style.backgroundImage = "url(imgs/kistopen.jpg)";
//     firstPicture[0].style.opacity = "0.2";
//     firstPicture[1].style.opacity = "0.2";
//     firstPicture[2].style.opacity = "0.2";
//     firstPicture[3].style.opacity = "1";
//     firstPicture[3].style.color = "#faa307";
//     firstPicture[4].style.opacity = "0.2";
//     firstPicture[5].style.opacity = "0.2";
//     firstPicture[6].style.opacity = "0.2";
//     firstPicture[7].style.opacity = "0.2";

//     firstPicture[0].style.color = "black";
//     firstPicture[1].style.color = "black";
//     firstPicture[2].style.color = "black";
//     firstPicture[4].style.color = "black";
//     firstPicture[5].style.color = "black";
//     firstPicture[6].style.color = "black";
//     firstPicture[7].style.color = "black";
// }

// function nextImage5() {
//     var y = document.getElementById("mainphoto")
//     y = document.getElementById("mainphoto").style.backgroundImage = "url(imgs/kist1.jpg)";
//     firstPicture[0].style.opacity = "0.2";
//     firstPicture[1].style.opacity = "0.2";
//     firstPicture[2].style.opacity = "0.2";
//     firstPicture[3].style.opacity = "0.2";
//     firstPicture[4].style.opacity = "1";
//     firstPicture[4].style.color = "white";
//     firstPicture[5].style.opacity = "0.2";
//     firstPicture[6].style.opacity = "0.2";
//     firstPicture[7].style.opacity = "0.2";

//     firstPicture[0].style.color = "black";
//     firstPicture[1].style.color = "black";
//     firstPicture[2].style.color = "black";
//     firstPicture[3].style.color = "black";
//     firstPicture[5].style.color = "black";
//     firstPicture[6].style.color = "black";
//     firstPicture[7].style.color = "black";
// }

// function nextImage6() {
//     var y = document.getElementById("mainphoto")
//     y = document.getElementById("mainphoto").style.backgroundImage = "url(imgs/kistopen3.jpg)";
//     firstPicture[0].style.opacity = "0.2";
//     firstPicture[1].style.opacity = "0.2";
//     firstPicture[2].style.opacity = "0.2";
//     firstPicture[3].style.opacity = "0.2";
//     firstPicture[4].style.opacity = "0.2";
//     firstPicture[5].style.opacity = "1";
//     firstPicture[6].style.opacity = "0.2";
//     firstPicture[7].style.opacity = "0.2";

//     firstPicture[0].style.color = "black";
//     firstPicture[1].style.color = "black";
//     firstPicture[2].style.color = "black";
//     firstPicture[3].style.color = "black";
//     firstPicture[4].style.color = "black";
//     firstPicture[6].style.color = "black";
//     firstPicture[7].style.color = "black";
// }

// function nextImage7() {
//     var y = document.getElementById("mainphoto")
//     y = document.getElementById("mainphoto").style.backgroundImage = "url(imgs/kistopen2.jpg)";
//     firstPicture[0].style.opacity = "0.2";
//     firstPicture[1].style.opacity = "0.2";
//     firstPicture[2].style.opacity = "0.2";
//     firstPicture[3].style.opacity = "0.2";
//     firstPicture[4].style.opacity = "0.2";
//     firstPicture[5].style.opacity = "0.2";
//     firstPicture[6].style.opacity = "1";
//     firstPicture[7].style.opacity = "0.2";

//     firstPicture[0].style.color = "black";
//     firstPicture[1].style.color = "black";
//     firstPicture[2].style.color = "black";
//     firstPicture[3].style.color = "black";
//     firstPicture[4].style.color = "black";
//     firstPicture[5].style.color = "black";
//     firstPicture[7].style.color = "black";
// }

// function nextImage8() {
//     var y = document.getElementById("mainphoto")
//     y = document.getElementById("mainphoto").style.backgroundImage = "url(imgs/kistdicht.jpg)";
//     firstPicture[0].style.opacity = "0.2";
//     firstPicture[1].style.opacity = "0.2";
//     firstPicture[2].style.opacity = "0.2";
//     firstPicture[3].style.opacity = "0.2";
//     firstPicture[4].style.opacity = "0.2";
//     firstPicture[5].style.opacity = "0.2";
//     firstPicture[6].style.opacity = "0.2";
//     firstPicture[7].style.opacity = "1";

//     firstPicture[0].style.color = "black";
//     firstPicture[1].style.color = "black";
//     firstPicture[2].style.color = "black";
//     firstPicture[3].style.color = "black";
//     firstPicture[4].style.color = "black";
//     firstPicture[5].style.color = "black";
//     firstPicture[6].style.color = "black";
// }

// var mediaQuery = window.matchMedia("(max-width: 766px)")
// var startOne = document.querySelectorAll(".start")
// var startTwo = document.querySelectorAll(".start-two")
// if (mediaQuery.matches) {
//     startTwo[0].style.opacity = "1"
// } else {
//     startOne[0].style.opacity = "1"
// }




// var SecondPicture = document.querySelectorAll(".handler-two")
// var lastHandler = document.querySelectorAll(".lasts")
// var mediaQuery = window.matchMedia("(max-width: 766px)")
// var indexes = 1;
// setInterval(function () {
//     if ((lastHandler[0].style.opacity === "1")) {
//         indexes = 0;
//     }; if (mediaQuery.matches) {
//         SecondPicture[0].style.opacity = "0.2";
//         SecondPicture[1].style.opacity = "0.2";
//         SecondPicture[2].style.opacity = "0.2";
//         SecondPicture[indexes].style.opacity = "1";
//     } else {
//         console.log("hello")
//     };
//     indexes++;
// }, 10000);

function closeAll(ID) {
    $(ID).hide()
}

$(document).ready(function () {
    setTimeout(function () {
        $("#cookieConsent").fadeIn(200);
    }, 4000);
    $("#closeCookieConsent, .cookieConsentOK").click(function () {
        $("#cookieConsent").fadeOut(200);
    });
});
