// VARIAVEL COM ENDEREÇO COMPLETO (http://endereço-digitado/arthur)
var endereco = window.location.protocol + "//" + window.location.host + "/arthur";

// FUNÇÕES RELACIONADAS AO SETOR

// VALIDAÇÃO DO FORMULARIO E FUNÇÃO CADASTRO DE SETOR
$('#CadastraSetor').validate({
    // VERIFICA SE OS CAMPOS ESTÃO VAZIOS
    rules: {
        ds_setor: {
            required: true
        },                
    },
    messages: {
        ds_setor: {
            required: "Campo obrigatório!"
        }

    },
    errorElement: 'span',
    errorPlacement: function(error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
    },
    highlight: function(element, errorClass, validClass) {
        $(element).addClass('is-invalid');
    },
    unhighlight: function(element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
    },
    //AÇÃO PARA CADASTRAR
    submitHandler: function(){
        $.ajax({
            url: endereco+"/setor/acao/cadastra-setor",
            type: 'POST',
            data:$("#CadastraSetor").serialize(),
                success: function(resultado) {
                $("#resultado").html(resultado);
                    // console.log(result);
                    if (resultado == 1) {
                        $("#resultado").html('<div class="alert alert-success"><i class="fas fa-check-circle"></i> Cadastrado com sucesso</div>').fadeIn(300).delay(1500).fadeOut(400);
                            location.reload();
                        } else {
                            $("#resultado").html('<div class="alert alert-danger"><i class="far fa-times-circle"></i> Error ao cadastrar</div>').fadeIn(300).delay(1500).fadeOut(400);
                        }
                    },
                    error: function() {
                                $("#resultado").html('<div class="alert alert-danger"><i class="far fa-times-circle"></i> Error ao cadastrar</div>').fadeIn(300).delay(1500).fadeOut(400);    
                            }
                        });
                            }
                        });

// DELETANDO O SETOR
$('#delete-setor').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Botão que acionou o modal
  var codigo = button.data('codigo') // Extrai informação dos atributos data-*

  var modal = $(this)
  $("#cd_setor").val(codigo)
  $("#remove_setor").click(function(){
    $.ajax({
        url: endereco+"/setor/acao/remove-setor",
        type: 'POST',
        data:$("#ExcluirSetor").serialize(),
        success: function(resultado) {
            if (resultado == 1) {
                $("#delete-setor #resultado").html('<div class="alert alert-success"><i class="fas fa-check-circle"></i> Setor excluido com sucesso</div>').fadeIn(300).delay(1500).fadeOut(400);
                location.reload();
            } else {
                $("#delete-setor #resultado").html('<div class="alert alert-danger"><i class="far fa-times-circle"></i> Error ao excluir o setor</div>').fadeIn(300).delay(1500).fadeOut(400);
            }
        },
        error: function() {
            $("#delete-setor #resultado").html('<div class="alert alert-danger"><i class="far fa-times-circle"></i> Error ao excluir o setor</div>').fadeIn(300).delay(1500).fadeOut(400);    
        }
    });
});
});


// ATUALIZANDO O SETOR
$('#atualiza-setor').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Botão que acionou o modal
  var codigo = button.data('codigo') // Extrai informação dos atributos data-*
  var setor = button.data('setor')

  var modal = $(this)
  $("#atualiza-setor #cd_setor").val(codigo)
  $("#atualiza-setor #ds_setor").val(setor)

  $('#AtualizaSetor').validate({
    // VERIFICA SE OS CAMPOS ESTÃO VAZIOS
    rules: {
        ds_setor: {
            required: true
        },                
    },
    messages: {
        ds_setor: {
            required: "Campo obrigatório!"
        }

        //terms: "Aceite os termos para continuar!"
    },
    errorElement: 'span',
    errorPlacement: function(error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
    },
    highlight: function(element, errorClass, validClass) {
        $(element).addClass('is-invalid');
    },
    unhighlight: function(element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
    },
    //AÇÃO PARA CADASTRAR
    submitHandler: function(){
        $.ajax({
            url: endereco+"/setor/acao/atualiza-setor",
            type: 'POST',
            data:$("#AtualizaSetor").serialize(),
            success: function(resultado) {
                // $("#atualiza-setor #resultado").html(resultado);
                // console.log(result);
                if (resultado == 1) {
                    $("#atualiza-setor #resultado").html('<div class="alert alert-success"><i class="fas fa-check-circle"></i> Setor atualizado com sucesso</div>').fadeIn(300).delay(1500).fadeOut(400);
                    location.reload();
                } else {
                    $("#atualiza-setor #resultado").html('<div class="alert alert-danger"><i class="far fa-times-circle"></i> Error ao atualizar o setor</div>').fadeIn(300).delay(1500).fadeOut(400);
                }
            },
            error: function() {
                $("#atualiza-setor #resultado").html('<div class="alert alert-danger"><i class="far fa-times-circle"></i> Error ao atualizar o setor</div>').fadeIn(300).delay(1500).fadeOut(400);    
            }
        });
    }
});

});

/* FIM DAS FUNÇÕES DO SETOR */


/* INICIO DAS FUNÇÕES DE USUARIO */

// CADASTRAR USUARIO

$('#CadastraUsuario').validate({
    // VERIFICA SE OS CAMPOS ESTÃO VAZIOS
    rules: {
        matricula: {
            required: true
        },     
        nm_nome: {
            required: true
        },     
        cpf: {
            required: true
        },     
        email: {
            required: true,
            email: true
        },     
        celular: {
            required: true
        },     
        endereco: {
            required: true
        },     
        ds_setor: {
            required: true
        },     
        senha: {
            required: true
        },   
        dt_nascimento: {
            required: true
        },            
    },
    messages: {
        matricula: {
            required: "Campo obrigatório!"
        },
        nm_nome: {
            required: "Campo obrigatório!"
        },
        cpf: {
            required: "Campo obrigatório!"
        },
        email: {
            required: "Campo obrigatório!",
            email: "Preencha um endereço valido"
        },
        celular: {
            required: "Campo obrigatório!"
        },
        endereco: {
            required: "Campo obrigatório!"
        },
        ds_setor: {
            required: "Campo obrigatório!"
        },
        senha: {
            required: "Campo obrigatório!"
        },
        dt_nascimento: {
            required: "Campo obrigatório!"
        }
    },
    errorElement: 'span',
    errorPlacement: function(error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
    },
    highlight: function(element, errorClass, validClass) {
        $(element).addClass('is-invalid');
    },
    unhighlight: function(element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
    },
    //AÇÃO PARA CADASTRAR
    submitHandler: function(){
        $.ajax({
            url: endereco+"/usuario/acao/cadastra-usuario",
            type: 'POST',
            data:$("#CadastraUsuario").serialize(),
            success: function(resultado) {
                // $("#add-usuario #resultado").html(resultado);
                // console.log(result);
                if (resultado == 1) {
                    $("#add-usuario #resultado").html('<div class="alert alert-success"><i class="fas fa-check-circle"></i> Usuário adicionado com sucesso</div>').fadeIn(300).delay(1500).fadeOut(400);
                    location.reload();
                } else {
                    $("#add-usuario #resultado").html('<div class="alert alert-danger"><i class="far fa-times-circle"></i> Error ao adicionar o usuário</div>').fadeIn(300).delay(1500).fadeOut(400);
                }
            },
            error: function() {
                $("#add-usuario #resultado").html('<div class="alert alert-danger"><i class="far fa-times-circle"></i> Error ao comunicar com o controller</div>').fadeIn(300).delay(1500).fadeOut(400);    
            }
        });
    }
});

// EDITAR USUÁRO

$('#editar-usuario').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Botão que acionou o modal
    var codigo = button.data('codigo') 
    var matricula = button.data('matricula') 
    var nome = button.data('nome') 
    var cpf = button.data('cpf') 
    var data_nascimento = button.data('data_nascimento') 
    var email = button.data('email') 
    var celular = button.data('celular') 
    var endereco_usuario = button.data('endereco') 
    var setor = button.data('setor') 
	var ativo = button.data('ativo')

    var modal = $(this)
    $("#editar-usuario #cd_usuario").val(codigo);
    $("#editar-usuario #matricula").val(matricula);
    $("#editar-usuario #nome").val(nome);
    $("#editar-usuario #cpf").val(cpf);
    $("#editar-usuario #dt_nascimento").val(data_nascimento);
    $("#editar-usuario #email").val(email);
    $("#editar-usuario #telefone").val(celular);
    $("#editar-usuario #endereco").val(endereco_usuario);
    $("#editar-usuario #ativo").val(ativo);


    $('#editar-usuario #setor option').each(function() {
        if($(this).val() == setor) {
            $(this).prop("selected", true);
        }
    });

$('#EditarUsuario').validate({
    // VERIFICA SE OS CAMPOS ESTÃO VAZIOS
    rules: {
        matricula: {
            required: true
        },     
        nm_nome: {
            required: true
        },     
        cpf: {
            required: true
        },     
        email: {
            required: true
        },     
        celular: {
            required: true
        },     
        endereco: {
            required: true
        },     
        ds_setor: {
            required: true
        },     
        senha: {
            required: true
        },   
        dt_nascimento: {
            required: true
        },      
		ativo: {
            required: true
        },
    },
    messages: {
        matricula: {
            required: "Campo obrigatório!"
        },
        nm_nome: {
            required: "Campo obrigatório!"
        },
        cpf: {
            required: "Campo obrigatório!"
        },
        email: {
            required: "Campo obrigatório!"
        },
        celular: {
            required: "Campo obrigatório!"
        },
        endereco: {
            required: "Campo obrigatório!"
        },
        ds_setor: {
            required: "Campo obrigatório!"
        },
        senha: {
            required: "Campo obrigatório!"
        },
        dt_nascimento: {
            required: "Campo obrigatório!"
        },
		ativo: {
            required: "Campo obrigatório!"
        }

    },
    errorElement: 'span',
    errorPlacement: function(error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
    },
    highlight: function(element, errorClass, validClass) {
        $(element).addClass('is-invalid');
    },
    unhighlight: function(element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
    },
    //AÇÃO PARA AUTALIZAR
    submitHandler: function(){
        $.ajax({
            url: endereco+"/usuario/acao/atualizar-usuario",
            type: 'POST',
            data:$("#EditarUsuario").serialize(),
            
            success: function(resultado) {
                // $("#editar-usuario #resultado").html(resultado);
                console.log(resultado);
                if (resultado == 1) {
                    $("#editar-usuario #resultado").html('<div class="alert alert-success"><i class="fas fa-check-circle"></i> Usuário atualizado com sucesso</div>').fadeIn(300).delay(1500).fadeOut(400);
                    location.reload();
                } else {
                    $("#editar-usuario #resultado").html('<div class="alert alert-danger"><i class="far fa-times-circle"></i> Error ao atualizar o usuário</div>').fadeIn(300).delay(1500).fadeOut(400);
                }
            },
            error: function() {
                $("#editar-usuario #resultado").html('<div class="alert alert-danger"><i class="far fa-times-circle"></i> Error ao comunicar com serviço de atualização</div>').fadeIn(300).delay(1500).fadeOut(400);    
            }
        });
    }
});

});

// DELETANDO USUARIO
/*$('#delete-usuario').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Botão que acionou o modal
  var codigo = button.data('codigo') // Extrai informação dos atributos data-*

  var modal = $(this)
  $("#cd_usuario").val(codigo)
  $("#remove_usuario").click(function(){
    $.ajax({
        url: endereco+"/usuario/acao/remove-usuario",
        type: 'POST',
        data:$("#ExcluirUsuario").serialize(),
        success: function(resultado) {
            if (resultado == 1) {
                $("#delete-usuario #resultado").html('<div class="alert alert-success"><i class="fas fa-check-circle"></i> Usuário excluido com sucesso</div>').fadeIn(300).delay(1500).fadeOut(400);
                location.reload();
            } else {
                $("#delete-usuario #resultado").html('<div class="alert alert-danger"><i class="far fa-times-circle"></i> Usuário ao excluir o setor</div>').fadeIn(300).delay(1500).fadeOut(400);
            }
        },
        error: function() {
            $("#delete-usuario #resultado").html('<div class="alert alert-danger"><i class="far fa-times-circle"></i> Error ao comunicar</div>').fadeIn(300).delay(1500).fadeOut(400);    
        }
    });
});
});*/

// RESETANDO SENHA DE USUARIO
$('#reset-senha-usuario').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Botão que acionou o modal
  var codigo = button.data('codigo') // Extrai informação dos atributos data-*
  var nome = button.data('nome')

  var modal = $(this)
  $("#reset-senha-usuario #cd_usuario").val(codigo)
  $("h6#usuario").text("Deseja realmente trocar a senha do usuário - "+nome);
  $('#ResetarSenhaUsuario').validate({
        // VERIFICA SE OS CAMPOS ESTÃO VAZIOS
        rules: {
            nova_senha: {
                required: true
            },   
        },
        messages: {
            nova_senha: {
                required: "Nova Senha obrigatório!"
            }
        },
        errorElement: 'span',
        errorPlacement: function(error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        },
        //AÇÃO PARA AUTALIZAR SENHA
        submitHandler: function(){
           $.ajax({
                url: endereco+"/usuario/acao/resetar-senha-usuario",
                type: 'POST',
                data:$("#ResetarSenhaUsuario").serialize(),
                success: function(resultado) {
                    // $("#reset-senha-usuario #resultado").html(resultado);
                    if (resultado == 1) {
                        $("#reset-senha-usuario #resultado").html('<div class="alert alert-success"><i class="fas fa-check-circle"></i> Senha atualizada com successo</div>').fadeIn(300).delay(1500).fadeOut(400);
                        location.reload();
                    } else {
                        $("#reset-senha-usuario #resultado").html('<div class="alert alert-danger"><i class="far fa-times-circle"></i> Error ao atualizar a senha do usuário</div>').fadeIn(300).delay(1500).fadeOut(400);
                    }
                },
                error: function() {
                    $("#reset-senha-usuario #resultado").html('<div class="alert alert-danger"><i class="far fa-times-circle"></i> Error ao comunicar</div>').fadeIn(300).delay(1500).fadeOut(400);    
                }
            });
        }
    });
  
});


/* FIM DAS FUNÇÕES DE USUARIO */

/* INICIO DAS FUNÇÕES COVID */

// CADASTRAR COVID
$('#add-covid').on('show.bs.modal', function (event) {

    $('#CadastraCovid').validate({
        // VERIFICA SE OS CAMPOS ESTÃO VAZIOS
        rules: {
            arquivo: {
                required: true,
				extension: "txt|csv|xls|xlsx|sql"
            },     
            fonte: {
                required: true
            },             
        },
        messages: {
            arquivo: {
                required: "Selecione um arquivo",
                extension: "Tipo de arquivo não suportado"
            },
            fonte: {
                required: "Campo obrigatório!"
            }
            //terms: "Aceite os termos para continuar!"
        },
        errorElement: 'span',
        errorPlacement: function(error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        },
        //AÇÃO PARA AUTALIZAR
        submitHandler: function(){
            var formulario = new FormData($("#CadastraCovid")[0]);
            $.ajax({
                url: endereco+"/covid/acao/adicionar-covid",
                type: 'POST',
                dataType: 'html',
                cache: false,
                processData: false,
                contentType: false,
                data: formulario,
                success: function(resultado) {
                    // $("#add-covid #resultado").html(resultado);
                    //console.log(resultado);
                    if (resultado == 1) {
                        $("#add-covid #resultado").html('<div class="alert alert-success"><i class="fas fa-check-circle"></i> COVID cadastrado com sucesso</div>').fadeIn(300).delay(1500).fadeOut(400);
                        location.reload();
                    }
                    else if(resultado){
                        $("#add-covid #resultado").html('<div class="alert alert-danger"><i class="far fa-times-circle"></i> Error ao importar o arquivo </div>').fadeIn(300).delay(1500).fadeOut(400);
                    } else {
                        $("#add-covid #resultado").html('<div class="alert alert-danger"><i class="far fa-times-circle"></i> Error ao cadastrar a covid</div>').fadeIn(300).delay(1500).fadeOut(400);
                    }
                },
                error: function() {
                    $("#add-covid #resultado").html('<div class="alert alert-danger"><i class="far fa-times-circle"></i> Error ao comunicar com serviço</div>').fadeIn(300).delay(1500).fadeOut(400);    
                }
            });
        }
    });
});

// DELETANDO COVID
$('#delete-covid').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Botão que acionou o modal
  var codigo = button.data('codigo')
  var arquivo = button.data('arquivo')

  var modal = $(this)
  $("#delete-covid #cd_usuario").val(codigo)
  $("#delete-covid #arquivo").val(arquivo)
  
  $("#delete-covid #remove_covid").click(function(){
    $.ajax({
        url: endereco+"/covid/acao/remove-covid",
        type: 'POST',
        data:$("#ExcluirCovid").serialize(),
        success: function(resultado) {
            // $("#delete-covid #resultado").html(resultado);
            if (resultado == 1) {
                $("#delete-covid #resultado").html('<div class="alert alert-success"><i class="fas fa-check-circle"></i> COVID excluido com sucesso</div>').fadeIn(300).delay(1500).fadeOut(400);
                location.reload();
            } else {
                $("#delete-covid #resultado").html('<div class="alert alert-danger"><i class="far fa-times-circle"></i> Error ao excluir a COVID  </div>').fadeIn(300).delay(1500).fadeOut(400);
            }
        },
        error: function() {
            $("#delete-covid #resultado").html('<div class="alert alert-danger"><i class="far fa-times-circle"></i> Error ao comunicar</div>').fadeIn(300).delay(1500).fadeOut(400);    
        }
    });
});
});

// EDITAR SITE COVID
$('#edit-covid-fonte').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Botão que acionou o modal
  var codigo = button.data('codigo')
  var site = button.data('site')

  var modal = $(this)
  $("#edit-covid-fonte #cd_usuario").val(codigo)
  $("#edit-covid-fonte #site").val(site)
  
   $('#EditSiteCovid').validate({
        // VERIFICA SE OS CAMPOS ESTÃO VAZIOS
        rules: {
            site: {
                required: true
            },             
        },
        messages: {
            site: {
                required: "Campo obrigatório!"
            }
            //terms: "Aceite os termos para continuar!"
        },
        errorElement: 'span',
        errorPlacement: function(error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        },
        //AÇÃO PARA AUTALIZAR
        submitHandler: function(){
            $.ajax({
                url: endereco+"/covid/acao/atualizar-site-covid",
                type: 'POST',
                data:$("#EditSiteCovid").serialize(),
                success: function(resultado) {
                    // $("#edit-covid-fonte #resultado").html(resultado);
                    if (resultado == 1) {
                        $("#edit-covid-fonte #resultado").html('<div class="alert alert-success"><i class="fas fa-check-circle"></i> Site atualizado com sucesso</div>').fadeIn(300).delay(1500).fadeOut(400);
                        location.reload();
                    } else {
                        $("#edit-covid-fonte #resultado").html('<div class="alert alert-danger"><i class="far fa-times-circle"></i> Error ao atualizar o site da COVID</div>').fadeIn(300).delay(1500).fadeOut(400);
                    }
                },
                error: function() {
                    $("#edit-covid-fonte #resultado").html('<div class="alert alert-danger"><i class="far fa-times-circle"></i> Error ao comunicar</div>').fadeIn(300).delay(1500).fadeOut(400);    
                }
            });
        }
    });
  $("#edit-covid-fonte #edit_site_covid").click(function(){
    
});
});

// ATUALIZAR ARQUIVO COVID
$('#atualiza-arquivo-covid').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Botão que acionou o modal
    var codigo = button.data('codigo')
    var arquivo = button.data('arquivo')

    var modal = $(this)
    $("#atualiza-arquivo-covid #cd_usuario").val(codigo)
    $("#atualiza-arquivo-covid #arquivo_principal").val(arquivo)

    $('#AtualizaFileCovid').validate({
        // VERIFICA SE OS CAMPOS ESTÃO VAZIOS
        rules: {
            arquivo: {
                required: true,
                extension: "txt|csv|xls|xlsx|sql"
            },     
        },
        messages: {
            arquivo: {
                required: "Selecione um arquivo",
                extension: "Tipo de arquivo não suportado"
            }
            //terms: "Aceite os termos para continuar!"
        },
        errorElement: 'span',
        errorPlacement: function(error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        },
        //AÇÃO PARA AUTALIZAR
        submitHandler: function(){
            var formulario = new FormData($("#AtualizaFileCovid")[0]);
            $.ajax({
                url: endereco+"/covid/acao/atualizar-arquivo-covid",
                type: 'POST',
                dataType: 'html',
                cache: false,
                processData: false,
                contentType: false,
                data: formulario,
                success: function(resultado) {
                    // $("#atualiza-arquivo-covid #resultado").html(resultado);
                    // console.log(resultado);
                    if (resultado == 1) {
                        $("#atualiza-arquivo-covid #resultado").html('<div class="alert alert-success"><i class="fas fa-check-circle"></i> Arquivo COVID atualizado com sucesso</div>').fadeIn(300).delay(1500).fadeOut(400);
                        location.reload();
                    }
                    else if(resultado){
                        $("#atualiza-arquivo-covid #resultado").html('<div class="alert alert-danger"><i class="far fa-times-circle"></i> Error ao importar o arquivo </div>').fadeIn(300).delay(1500).fadeOut(400);
                    } else {
                        $("#atualiza-arquivo-covid #resultado").html('<div class="alert alert-danger"><i class="far fa-times-circle"></i> Error ao atualizar o arquivo da covid</div>').fadeIn(300).delay(1500).fadeOut(400);
                    }
                },
                error: function() {
                    $("#atualiza-arquivo-covid #resultado").html('<div class="alert alert-danger"><i class="far fa-times-circle"></i> Error ao comunicar com serviço</div>').fadeIn(300).delay(1500).fadeOut(400);    
                }
            });
        }
    });
});


function Download(download_arquivo){
    window.location.href = endereco+"/download/baixar/"+download_arquivo;
}