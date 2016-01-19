function checkString(id, failId){
    var element = document.getElementById(id);
    var string = element.value;
    var text;
    var regex = /^\D+$/;
    if(regex.test(string)){
        element.style.backgroundColor = "#2ecc71";
        text = "";
    } else {
        text = "your "+id+" is invalid";
        element.style.backgroundColor = "#f39c12";
    }
    console.log(text);
    document.getElementById(failId).innerHTML = text;
}

function checkNumber(id, failId){
    var element = document.getElementById(id);
    var number = element.value;
    var text;
    var regex = /^\d+$/;
    if(regex.test(number)){
        element.style.backgroundColor = "#2ecc71";
        text = "";
    } else {
        text = "your "+id+" is invalid";
        element.style.backgroundColor = "#f39c12";
    }
    console.log(text);
    document.getElementById(failId).innerHTML = text;
}

function checkPLZ(failId) {
    var element = document.getElementById("zip");
    var plz = element.value;
    var text;
    var regex = /(^\d{5})(?:(?!.))/;
    if(regex.test(plz)){
        text = "";
        element.style.backgroundColor = "#2ecc71";
    }else if ( plz < 10000 || plz > 15000 ) {
        text = "your PLZ is not in berlin";
        element.style.backgroundColor = "#f39c12";
    } else {
        element.style.backgroundColor = "#f39c12";
        text = "";
    }
    console.log(text);
    document.getElementById(failId).innerHTML = text;
}

function checkEmail(failId) {
    var element = document.getElementById("maill");
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
    document.getElementById(failId).innerHTML = text;
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
