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

function checkString(id){
    var element = document.getElementById(id);
    var string = element.value;
    var text;
    var regex = /^\D+/;
    if(regex.test(string)){
        element.style.backgroundColor = "#2ecc71";
        text = "";
    } else {
        text = "your "+id+" is invalid";
        element.style.backgroundColor = "#f39c12";
    }
    console.log(text);
    document.getElementById("text").innerHTML = text;
}

function checkNumber(id){
    var element = document.getElementById(id);
    var number = element.value;
    var text;
    var regex = /^\d+/;
    if(regex.test(number)){
        element.style.backgroundColor = "#2ecc71";
        text = "";
    } else {
        text = "your "+id+" is invalid";
        element.style.backgroundColor = "#f39c12";
    }
    console.log(text);
    document.getElementById("text").innerHTML = text;
}

function checkPLZ() {
    var element = document.getElementById("plz");
    var plz = element.value;
    var text;
    var regex = /(^\d{5})(?:(?!.))/;
    if(regex.test(plz)){
        text = "your PLZ is valid";
        element.style.backgroundColor = "#2ecc71";
    }else if ( plz < 10000 || plz > 15000 ) {
        text = "your PLZ is not in berlin";
        element.style.backgroundColor = "#f39c12";
    } else {
        element.style.backgroundColor = "#f39c12";
        text = "your PLZ is not valid";
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

//function checkPattern(element, pattern, okVal, failVal) {
//    element = document.getElementById(element);
//    var value = element.value;
//    var text;
//    var bool = pattern.test(value);
//    if(bool) {
//        text = okVal;
//        element.style.backgroundColor = "#2ecc71";
//    } else {
//        text = failVal;
//        element.style.backgroundColor = "#f39c12";
//    }
//    element.innerHTML = text;
//    return bool;
//}
