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
                var obj = $.parseJSON(msg);
                if(obj.message){
                    $("#footerfeedback").text(obj.message);
                } else {
                    var outstr='';
                    if(obj.clubnameError){
                        outstr += obj.clubnameError;
                        outstr += ' / ';
                    }
                    if(obj.streetError){
                        outstr += obj.streetError;
                        outstr += ' / ';
                    }
                    if(obj.streetnumberError){
                        outstr += obj.streetnumberError;
                        outstr += ' / ';
                    }
                    if(obj.zipError){
                        outstr += obj.zipError;
                        outstr += ' / ';
                    }
                    if(obj.mailError){
                        outstr += obj.mailError;
                    }
                    if(!obj.clubnameError && !obj.streetError && !obj.streetnumberError && !obj.zipError && !obj.mailError){
                        outstr = "cannot insert multible clubs with the same name!";
                    }
                    $("#footerfeedback").text(outstr);
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
                //alert(msg);
                var obj = $.parseJSON(msg);
                if(obj.message){
                    $("#footerfeedback").text(obj.message); // -> main view
                    $("#db_operations_modal").find("#footerfeedback").text(obj.message); // -> dialogue
                } else {
                    $("#footerfeedback").text(obj.databaseError);
                    $("#db_operations_modal").find("#footerfeedback").text(obj.message);
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
                var obj = $.parseJSON(msg);
                if(obj.message){
                    $("#footerfeedback").text(obj.message);
                } else {
                    $("#footerfeedback").text(obj.databaseError);
                }
            }
        });
    });
    //RESET
    $("#reset").click(function () {
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
                    $("#footerfeedback").text(obj.message);
                }
            }
        })
    });
});

// menue: show all //////////////////////////////////////////////////////////
function showAll() {
    $.getJSON('../php/crud.php', { action: "getall" },function (data) {
        var table = '<table class="table table-bordered table-hover">';
        table+='<tr><th>Clubname</th><th>Street</th><th>Streetnumber</th><th>Zip</th><th>E-Mail</th><th>Phonenumber</th></tr>';
        $.each(data, function (clubname, item) {
            table += '<tr><td>' + item.clubname + '</td><td>' + item.street + '</td><td>' + item.streetnumber + '</td>' +
                '<td>' + item.zip + '</td><td>' + item.mail + '</td><td>' + item.phonenumber + '</td></tr>';
        });
        table += '</table>';
        $("#content").html(table);
        codeAddress(item.street);
        $("#thanks").text("show all done...");
    }).fail(function (xhr) {
        $("#thanks").text("show all failure");
        console.log(xhr.status);
        console.log(xhr.response);
        console.log(xhr.responseText);
        console.log(xhr.statusText);
    });
}