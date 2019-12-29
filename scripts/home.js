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
                    $("#"+IdContato).hide('fast');
                }
            },
        }, );
    });

    $('.editContato').on('click', function(){
        //Variavel para puxar o id da div pai, assim diferenciando dos demais contatos
        var id = $(this).closest('.rowsContact').attr('id');

        //Escondendo as divs para executar a edicção
        $('#userDataName_'+id).hide();
        $('#userDataTelefone_'+id).hide();
        $('#userDataEmail_'+id).hide();
        $('.zap_'+id).hide();
        $('.delete_'+id).hide();
        $('.editar_'+id).hide();

        //Mostrando os inputs com os valores atuais para executar a alteração
        $('#inputNome_'+id).slideDown('fast').val($('#userDataName_'+id).text());
        $('#inputEmail_'+id).slideDown('fast').val($('#userDataEmail_'+id).text());
        $('#inputTelefone_'+id).slideDown('fast').val($('#userDataTelefone_'+id).text());

        //Mostrando os botoes de salvar e cancelar
        $('#submit_'+id).slideDown('fast')
        $(".cancelarBtn_"+id).slideDown('fast');
    });

    $('.cancelarBtnGlobal').on('click',function(){
        var id = $(this).closest('.rowsContact').attr('id');

        //Revertendo o processo, já que o usuario clicou em cancelar
        $('#inputNome_'+id).hide();
        $('#inputEmail_'+id).hide();
        $('#inputTelefone_'+id).hide();
        $('#submit_'+id).hide()
        $(".cancelarBtn_"+id).hide();

        $('#userDataName_'+id).show();
        $('#userDataTelefone_'+id).show();
        $('#userDataEmail_'+id).show();
        $('.zap_'+id).show();
        $('.delete_'+id).show();
        $('.editar_'+id).show();
    });

    $('.btnAttContato').on('click', function(){
        var id = $(this).closest('.rowsContact').attr('id');

        var contactName = $('#inputNome_'+id).val();
        var contactEmail = $('#inputEmail_'+id).val();
        var contactTelefone = $('#inputTelefone_'+id).val();

        console.log(contactName+" "+contactEmail+" "+contactTelefone);

        $.ajax({
            url:'edit.php',
            type:'post',
            dataType:'json',
            data:{
                'id': id,
                'nome': contactName,
                'email': contactEmail,
                'telefone': contactTelefone
            },
            success:function(json){
                $('#inputNome_'+id).hide();
                $('#inputEmail_'+id).hide();
                $('#inputTelefone_'+id).hide();
                $('#submit_'+id).hide()
                $(".cancelarBtn_"+id).hide();

                $('#userDataName_'+id).show().text(json.nome);
                $('#userDataTelefone_'+id).show(json.telefone);
                $('#userDataEmail_'+id).show(json.email);
                $('.zap_'+id).show();
                $('.delete_'+id).show();
                $('.editar_'+id).show();
            },
        });
    });

    
});