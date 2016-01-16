$(function () {
    $.ajaxSetup({
        error: function (jqXHR, exception) {
            if (jqXHR.status === 0) {
                alert('Not connected.\n Verify Network.');
            } else if (jqXHR.status == 404) {
                alert('Requested page not found. [404]');
            } else if (jqXHR.status == 500) {
                alert('Internal Server Error [500].');
            } else if (exception === 'parsererror') {
                alert('Requested JSON parse failed.');
            } else if (exception === 'timeout') {
                alert('Time out error.');
            } else if (exception === 'abort') {
                alert('Ajax request aborted.');
            } else {
                alert('Uncaught Error.\n' + jqXHR.responseText);
            }
        }
    });
    // dialogue add, find, update, delete, reset: //////////////////////////
    $("#insert").click(function () {
        $.ajax({
            type: "POST",
            url: "../php/crud.php",
            data: { action: "insert",
                clubname: $("#clubname_in").val(),
                street: $("#street_in").val(),
                streetnumber: $("#streetnumber_in").val(),
                zip: $("#zip_in").val(),
                mail: $("#mail_in").val(),
                phonenumber: $("#phonenumber_in").val()
            },
            success: function (msg) {
                $("#footerfeedback").text("");
                $("#done").text("");
                var obj = $.parseJSON(msg);
                if(obj.message){
                    $("#done").text(obj.message);
                } else {
                    var outstr='';
                    if(obj.clubnameError){
                        outstr += '<p>';
                        outstr += obj.clubnameError;
                        outstr += '</p>';
                    }
                    if(obj.streetError){
                        outstr += '<p>';
                        outstr += obj.streetError;
                        outstr += '</p>';
                    }
                    if(obj.streetnumberError){
                        outstr += '<p>';
                        outstr += obj.streetnumberError;
                        outstr += '</p>';
                    }
                    if(obj.zipError){
                        outstr += '<p>';
                        outstr += obj.zipError;
                        outstr += '</p>';
                    }
                    if(obj.emailError){
                        outstr += '<p>';
                        outstr += obj.emailError;
                        outstr += '</p>';
                    }
                    if(!obj.clubnameError && !obj.streetError && !obj.streetnumberError && !obj.zipError && !obj.emailError){
                        outstr = "cannot insert multible clubs with the same name!";
                    }
                    $("#footerfeedback").html(outstr);
                }
            }
        });
    });
    ///UPDATE
    $("#update").click(function () {
        $.ajax({
            type: "POST",
            url: "../php/crud.php",
            data: { action: "update",
                clubname: $("#clubname_in").val(),
                street: $("#street_in").val(),
                streetnumber: $("#streetnumber_in").val(),
                zip: $("#zip_in").val(),
                mail: $("#mail_in").val(),
                phonenumber: $("#phonenumber_in").val()
            },
            success: function (msg) {
                $("#footerfeedback").text("");
                $("#done").text("");
                //alert(msg);
                var obj = $.parseJSON(msg);
                if(obj.message){
                    $("#done").text(obj.message); // -> main view
                } else {
                    $("#footerfeedback").text(obj.databaseError);
                }
            }
        });
    });
    //DELETE
    $("#delete").click(function () {
        $.ajax({
            type: "POST",
            url: "../php/crud.php",
            data: { action: "delete",
                clubname: $("#clubname_in").val()
            },
            success: function (msg) {
                $("#footerfeedback").text("");
                $("#done").text("");
                var obj = $.parseJSON(msg);
                if(obj.message){
                    $("#done").text(obj.message);
                } else {
                    $("#footerfeedback").text(obj.databaseError);
                }
            }
        });
    });
    //RESET
    $("#reset").click(function () {
        $("#footerfeedback").text("");
        $("#done").text("");
        $("#clubname_in").val("");
        $("#street_in").val("");
        $("#streetnumber_in").val("");
        $("#zip_in").val("");
        $("#mail_in").val("");
        $("#phonenumber_in").val("");
    });
    //FIND
    $("#find").click(function () {
        $.ajax({
            type: "GET",
            url:"../php/crud.php",
            data: { action: "find", clubname: $("#clubname_in").val() },
            dataType: "text",
            success: function (msg) {
                $("#footerfeedback").text("");
                $("#done").text("");
                var obj = $.parseJSON(msg);
                if(obj.databaseError){
                    $("#footerfeedback").text(obj.databaseError);
                } else {
                    $("#clubname_in").val(obj.clubname);
                    $("#street_in").val(obj.street);
                    $("#streetnumber_in").val(obj.streetnumber);
                    $("#zip_in").val(obj.zip);
                    $("#mail_in").val(obj.mail);
                    $("#phonenumber_in").val(obj.phonenumber);
                    $("#done").text(obj.message);
                }
            }
        })
    });
    $("#showall").click(function() {
            $.getJSON('../php/crud.php', {action: "getall"}, function (data) {
                var table = '<table class="table table-bordered table-hover table-responsive">';
                table += '<tr><th>Clubname</th><th>Adress</th><th>Zip</th><th>E-Mail</th><th>Phonenumber</th></tr>';
                $.each(data, function (clubname, item) {
                    if (item.phonenumber == 0) {
                        item.phonenumber = "no number given";
                    }
                    table += '<tr><td>' + item.clubname + '</td><td id="address">' + item.street + " " + item.streetnumber + '</td>' +
                        '<td>' + item.zip + '</td><td>' + item.mail + '</td><td>' + item.phonenumber + '</td></tr>';
                });
                table += '</table>';
                $("#content").html(table);
                $("#thanks").text("");
            }).fail(function (xhr) {
                $("#thanks").text("show all failure");
                console.log(xhr.status);
                console.log(xhr.response);
                console.log(xhr.responseText);
                console.log(xhr.statusText);
            })
        }
    );
    $("#findintable").click(function () {
        $.ajax({
            type: "GET",
            url:"../php/crud.php",
            data: { action: "find", clubname: $("#input").val() },
            dataType: "text",
            success: function(msg) {
                var item = $.parseJSON(msg);
                var table = '<table class="table table-bordered table-hover table-responsive">';
                table += '<tr><th>Clubname</th><th>Adress</th><th>Zip</th><th>E-Mail</th><th>Phonenumber</th></tr>';
                $(function () {
                    if(item.phonenumber == 0){
                        item.phonenumber = "No phonenumber given.";
                    }
                    table += '<tr><td>' + item.clubname + '</td><td id="address">' + item.street + " " + item.streetnumber + '</td>' +
                        '<td>' + item.zip + '</td><td>' + item.mail + '</td><td>' + item.phonenumber + '</td></tr>';
                });
                table += '</table>';
                $("#content").html(table);
                $("#thanks").text("");
                if (item.databaseError){
                    $("#content").html("");
                    $("#thanks").text(item.databaseError);
                }
            }
        })
    });
});

// menue: show all //////////////////////////////////////////////////////////
function showAll() {
    $.getJSON('../php/crud.php', { action: "getall" },function (data) {
        var table = '<table class="table table-bordered table-hover table-responsive">';
        table+='<tr><th>Clubname</th><th>Adress</th><th>Zip</th><th>E-Mail</th><th>Phonenumber</th></tr>';
        $.each(data, function (clubname, item) {
            if(item.phonenumber==0){
                item.phonenumber = "no number given";
            }
            table += '<tr><td>' + item.clubname + '</td><td id="address">' + item.street + " " + item.streetnumber + '</td>' +
                '<td>' + item.zip + '</td><td>' + item.mail + '</td><td>' + item.phonenumber + '</td></tr>';
        });
        table += '</table>';
        $("#content").html(table);
    }).fail(function (xhr) {
        $("#thanks").text("show all failure");
        console.log(xhr.status);
        console.log(xhr.response);
        console.log(xhr.responseText);
        console.log(xhr.statusText);
    });
}