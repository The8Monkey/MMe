function formularChecker() {
    var plz, text;

    // Get the value of the input field with id="numb"
    x = document.getElementById("plz").value;

    // If x is Not a Number or less than one or greater than 10
    if (isNaN(x) || x < 10000 || x > 15000) {
        text = "your address is not in berlin";
    } else {
        text = "address OK";
    }
    console.log(text);

    document.getElementById("text").innerHTML = text;
}
