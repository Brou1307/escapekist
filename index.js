
var images = [];
function preload() {
    for (var i = 0; i < arguments.length; i++) {
        images[i] = new Image();
        images[i].src = preload.arguments[i];
    }
}

//-- usage --//
preload(
    "imgs/hek.jpg",
    "imgs/kistclose.jpg",
    "imgs/kistopen.jpg",
    "imgs/kist1.jpg",
    "imgs/kistopen3.jpg",
    "imgs/kistdicht2.jpg",
    "imgs/kistopen2.jpg",
    "imgs/kistdicht.jpg"
)


var imageSources = ["imgs/hek.jpg", "imgs/kistclose.jpg", "imgs/kistopen.jpg", "imgs/kist1.jpg", "imgs/kistopen3.jpg", "imgs/kistdicht2.jpg", "imgs/kistopen2.jpg", "imgs/kistdicht.jpg"]
var index = 0;
setInterval(function () {
    if (index === imageSources.length) {
        index = 0;
    }
    document.getElementById("mainphoto").style.backgroundImage = "url(" + imageSources[index] + ")";
    index++;
}, 10000);


var firstPicture = document.querySelectorAll(".handler")
var lastHandler = document.querySelectorAll(".lasts")
var mediaQuery = window.matchMedia("(max-width: 766px)")
var index = 0;
setInterval(function () {
    if ((lastHandler[0].style.opacity === "1")) {
        index = 0;
    }; if (mediaQuery.matches) {
        console.log("hello")
    } else {
        firstPicture[0].style.opacity = "0.2";
        firstPicture[1].style.opacity = "0.2";
        firstPicture[2].style.opacity = "0.2";
        firstPicture[3].style.opacity = "0.2";
        firstPicture[4].style.opacity = "0.2";
        firstPicture[5].style.opacity = "0.2";
        firstPicture[6].style.opacity = "0.2";
        firstPicture[7].style.opacity = "0.2";
        firstPicture[index].style.opacity = "1";
    };
    index + index;
}, 10000);


function nextImage() {
    var y = document.getElementById("mainphoto")
    y = document.getElementById("mainphoto").style.backgroundImage = "url(imgs/hek.jpg)";
    firstPicture[0].style.opacity = "1";
    firstPicture[1].style.opacity = "0.2";
    firstPicture[2].style.opacity = "0.2";
    firstPicture[3].style.opacity = "0.2";
    firstPicture[4].style.opacity = "0.2";
    firstPicture[5].style.opacity = "0.2";
    firstPicture[6].style.opacity = "0.2";
    firstPicture[7].style.opacity = "0.2";
}

function nextImage2() {
    var y = document.getElementById("mainphoto")
    y = document.getElementById("mainphoto").style.backgroundImage = "url(imgs/hek.jpg)";
    firstPicture[0].style.opacity = "0.2";
    firstPicture[1].style.opacity = "1";
    firstPicture[2].style.opacity = "0.2";
    firstPicture[3].style.opacity = "0.2";
    firstPicture[4].style.opacity = "0.2";
    firstPicture[5].style.opacity = "0.2";
    firstPicture[6].style.opacity = "0.2";
    firstPicture[7].style.opacity = "0.2";
}

function nextImage3() {
    var y = document.getElementById("mainphoto")
    y = document.getElementById("mainphoto").style.backgroundImage = "url(imgs/kistclose.jpg)";
    firstPicture[0].style.opacity = "0.2";
    firstPicture[1].style.opacity = "0.2";
    firstPicture[2].style.opacity = "1";
    firstPicture[3].style.opacity = "0.2";
    firstPicture[4].style.opacity = "0.2";
    firstPicture[5].style.opacity = "0.2";
    firstPicture[6].style.opacity = "0.2";
    firstPicture[7].style.opacity = "0.2";
}

function nextImage4() {
    var y = document.getElementById("mainphoto")
    y = document.getElementById("mainphoto").style.backgroundImage = "url(imgs/kistopen.jpg)";
    firstPicture[0].style.opacity = "0.2";
    firstPicture[1].style.opacity = "0.2";
    firstPicture[2].style.opacity = "0.2";
    firstPicture[3].style.opacity = "1";
    firstPicture[4].style.opacity = "0.2";
    firstPicture[5].style.opacity = "0.2";
    firstPicture[6].style.opacity = "0.2";
    firstPicture[7].style.opacity = "0.2";
}

function nextImage5() {
    var y = document.getElementById("mainphoto")
    y = document.getElementById("mainphoto").style.backgroundImage = "url(imgs/kist1.jpg)";
    firstPicture[0].style.opacity = "0.2";
    firstPicture[1].style.opacity = "0.2";
    firstPicture[2].style.opacity = "0.2";
    firstPicture[3].style.opacity = "0.2";
    firstPicture[4].style.opacity = "1";
    firstPicture[5].style.opacity = "0.2";
    firstPicture[6].style.opacity = "0.2";
    firstPicture[7].style.opacity = "0.2";
}

function nextImage6() {
    var y = document.getElementById("mainphoto")
    y = document.getElementById("mainphoto").style.backgroundImage = "url(imgs/kistopen3.jpg)";
    firstPicture[0].style.opacity = "0.2";
    firstPicture[1].style.opacity = "0.2";
    firstPicture[2].style.opacity = "0.2";
    firstPicture[3].style.opacity = "0.2";
    firstPicture[4].style.opacity = "0.2";
    firstPicture[5].style.opacity = "1";
    firstPicture[6].style.opacity = "0.2";
    firstPicture[7].style.opacity = "0.2";
}

function nextImage7() {
    var y = document.getElementById("mainphoto")
    y = document.getElementById("mainphoto").style.backgroundImage = "url(imgs/kistopen2.jpg)";
    firstPicture[0].style.opacity = "0.2";
    firstPicture[1].style.opacity = "0.2";
    firstPicture[2].style.opacity = "0.2";
    firstPicture[3].style.opacity = "0.2";
    firstPicture[4].style.opacity = "0.2";
    firstPicture[5].style.opacity = "0.2";
    firstPicture[6].style.opacity = "1";
    firstPicture[7].style.opacity = "0.2";
}

function nextImage8() {
    var y = document.getElementById("mainphoto")
    y = document.getElementById("mainphoto").style.backgroundImage = "url(imgs/kistdicht.jpg)";
    firstPicture[0].style.opacity = "0.2";
    firstPicture[1].style.opacity = "0.2";
    firstPicture[2].style.opacity = "0.2";
    firstPicture[3].style.opacity = "0.2";
    firstPicture[4].style.opacity = "0.2";
    firstPicture[5].style.opacity = "0.2";
    firstPicture[6].style.opacity = "0.2";
    firstPicture[7].style.opacity = "1";
}

var mediaQuery = window.matchMedia("(max-width: 766px)")
var startOne = document.querySelectorAll(".start")
var startTwo = document.querySelectorAll(".start-two")
if (mediaQuery.matches) {
    startTwo[0].style.opacity = "1"
} else {
    startOne[0].style.opacity = "1"
}




var SecondPicture = document.querySelectorAll(".handler-two")
var lastHandler = document.querySelectorAll(".lasts")
var mediaQuery = window.matchMedia("(max-width: 766px)")
var indexes = 1;
setInterval(function () {
    if ((lastHandler[0].style.opacity === "1")) {
        indexes = 0;
    }; if (mediaQuery.matches) {
        SecondPicture[0].style.opacity = "0.2";
        SecondPicture[1].style.opacity = "0.2";
        SecondPicture[2].style.opacity = "0.2";
        SecondPicture[indexes].style.opacity = "1";
    } else {
        console.log("hello")
    };
    indexes++;
}, 10000);

