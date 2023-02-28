function validate_est_add() {
    var valid = true;   
    $(".demoInputBox").css('background-color','');
    $(".info").html('');
    
    if(!$("#nome").val()) {
        $("#name-info").html("(obrigatório)");
        $("#nome").css('background-color','#FFFFDF');
        valid = false;
    }
    if(!$("#numero").val()) {
        $("#roll-number-info").html("(obrigatório)");
        $("#numero").css('background-color','#FFFFDF');
        valid = false;
    }
    if(!$("#data").val()) {
        $("#dob-info").html("(obrigatório)");
        $("#data").css('background-color','#FFFFDF');
        valid = false;
    }
    if(!$("#classe").val()) {
        $("#class-info").html("(obrigatório)");
        $("#classe").css('background-color','#FFFFDF');
        valid = false;
    }   
    return valid;
}
function validate_est_edit() {
    var valid = true;   
    $(".demoInputBox").css('background-color','');
    $(".info").html('');
    
    if(!$("#nome").val()) {
        $("#name-info").html("(obrigatório)");
        $("#nome").css('background-color','#FFFFDF');
        valid = false;
    }
    if(!$("#numero").val()) {
        $("#roll-number-info").html("(obrigatório)");
        $("#numero").css('background-color','#FFFFDF');
        valid = false;
    }
    if(!$("#data").val()) {
        $("#dob-info").html("(obrigatório)");
        $("#data").css('background-color','#FFFFDF');
        valid = false;
    }
    if(!$("#classe").val()) {
        $("#class-info").html("(obrigatório)");
        $("#classe").css('background-color','#FFFFDF');
        valid = false;
    }   
    return valid;
}
function validate_pres_add() {
    var valid = true;   
    $(".demoInputBox").css('background-color','');
    $(".info").html('');
    
    if(!$("#data_presenca").val()) {
        $("#attendance_date-info").html("(obrigatório)");
        $("#data_presenca").css('background-color','#FFFFDF');
        valid = false;
    } 
    return valid;
}
function validate_pres_edit() {
    var valid = true;   
    $(".demoInputBox").css('background-color','');
    $(".info").html('');
    
    if(!$("#data_presenca").val()) {
        $("#attendance_date-info").html("(obrigatório)");
        $("#data_presenca").css('background-color','#FFFFDF');
        valid = false;
    } 
    return valid;
}