$(function(){

    $("#addContato, #cancelarBtnAddContato, #sairContatoDiv").on('click', function(){
        $('#addContatoDiv').fadeToggle('fast');
    });

    $("#userConfigs, #cancelarBtnConfigUser, #configsHeaderExitButton").on('click', function(){
        $('#windowUserConfigs').fadeToggle('fast');
    });

    $('#delete, #sairConfirmaDelete, #btnCancelarConfirmaDelete').on('click', function(){
        $('#confirmaDelete').fadeToggle('fast');
    });

    $('.deleteContact').on('click', function(){
        var IdContato = $(this).attr('data-id');

        $.ajax({
            type: 'post',
            url: 'delete.php',
            data: {id: IdContato},
            dataType: 'json',
            success:function(json){
                if(json.status == 'done'){
                    $(".rowsContact[data-id="+IdContato+"]").hide('fast');
                }else if(json.status == 'fail'){
                }
            },
        }, );
    });
});