$(function(){
    $("#addContato, #cancelarBtnAddContato, #sairContatoDiv").on('click', function(){
        $('#addContatoDiv').fadeToggle('fast');
    });

    $("#userConfigs, #cancelarBtnConfigUser, #configsHeaderExitButton").on('click', function(){
        $('#windowUserConfigs').fadeToggle('fast');
    });


});

// function mostrarRegistro(){
//     document.getElementById("addContatoDiv").style.display = "block";
// }

// function sairRegistro(){
//     document.getElementById("addContatoDiv").style.display = "none";
// }

// function mostrarConfigUsuario(){
//     document.getElementById("windowUserConfigs").style.display = "block";
// }

// function sairConfigUsuario(){
//     document.getElementById("windowUserConfigs").style.display = "none";
// }

