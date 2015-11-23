function formularChecker() {
    var plz, text;

    // Get the value of the input field with id="numb"
    x = document.getElementById("plz").value;

    // If x is Not a Number or less than one or greater than 10
    if (isNaN(x) || x < 10000 || x > 15000) {
        text = "your address is not in berlin";
        document.getElementbyId("plz").style.backgroundColor = "red";
    } else {
        text = "address OK";
    }
    console.log(text);

    document.getElementById("text").innerHTML = text;
}

function checkURL(){
    var element = document.getElementById("url");
    var url = element.value;
    var text;
    var regex = /\.(jpeg|jpg|gif|png)$/;
    if(regex.test(url)){
        element.style.backgroundColor = "#2ecc71";
        text = "";
    } else {
        text = "your image URL is invalid";
        element.style.backgroundColor = "#f39c12";
    }
    console.log(text);
    document.getElementById("text").innerHTML = text;

}

function checkPLZ() {
    var element = document.getElementById("plz");
    var plz = element.value;
    var text;
    if (plz == "" | plz < 10000 | plz > 15000) {
        text = "your PLZ is not in berlin";
        element.style.backgroundColor = "#f39c12";
    } else {
        element.style.backgroundColor = "#2ecc71";
        text = "";
    }
    console.log(text);
    document.getElementById("text").innerHTML = text;
}

function checkEmail() {
    var element = document.getElementById("email");
    var email = element.value;
    var text;
    var regex = /\S+@\S+\.\S+/;
    if(regex.test(email)) {
        element.style.backgroundColor = "#2ecc71";
        text = "";
    } else {
        text = "your email adress is invalid";
        element.style.backgroundColor = "#f39c12";
    }
    console.log(text);
    document.getElementById("text").innerHTML = text;
}