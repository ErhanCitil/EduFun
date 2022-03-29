function one() {
    const toetsVragen = [
        "Wat is de hoofdstad van Frankrijk?",
        "Hoeveel benen heeft een spin?",
        "Wat is het grootste meer van Nederland?",
        "Noem een Duits automerk",
        "Noem een Waddeneiland",
    ];
    const correcteAntwoorden = [
        "waaiden",
        "spijker",
        "voorstelling",
        "koud",
        "proefwerk"
    ];
    var a = document.getElementById("test1");
    var b = document.getElementById("test2");
    var c = document.getElementById("test3");
    var d = document.getElementById("test4");
    var e = document.getElementById("test5");
    var y = correcteAntwoorden.includes(1);
    var score = 0;
 

    if ((a.value == correcteAntwoorden[0])) {
        var green = document.getElementById("test1");
        green.style.backgroundColor = "green";
        score ++;
    } else {
        var red = document.getElementById("test1");
        red.style.backgroundColor = "red";
    }

    if ((b.value == correcteAntwoorden[1])) {
        var green = document.getElementById("test2");
        green.style.backgroundColor = "green";
        score ++;
    } else {
        var red = document.getElementById("test2");
        red.style.backgroundColor = "red";
    }

    if ((c.value == correcteAntwoorden[2])) {
        var green = document.getElementById("test3");
        green.style.backgroundColor = "green";
        score ++;
    } else {
        var red = document.getElementById("test3");
        red.style.backgroundColor = "red";
    }

    if ((d.value == correcteAntwoorden[3])) {
        var green = document.getElementById("test4");
        green.style.backgroundColor = "green";
        score ++;
    } else {
        var red = document.getElementById("test4");
        red.style.backgroundColor = "red";
    }

    if ((e.value == correcteAntwoorden[4])) {
        var green = document.getElementById("test5");
        green.style.backgroundColor = "green";
        score ++;
    } else {
        var red = document.getElementById("test5");
        red.style.backgroundColor = "red";
    }


    document.querySelector("#score").innerHTML = ("End score:"); 
    document.querySelector("#score1").innerHTML = (score); 

}


function myFunction() {
    var element1 = document.querySelector(".control > h1");
    element1.classList.toggle("dark");

    var element = document.body;
    element.classList.toggle("dark-mode");
}

function myFunction1() {
    var element2 = document.querySelector(".games-text > p");
    element2.classList.toggle("dark");

    var element = document.body;
    element.classList.toggle("dark-mode");

  
  }