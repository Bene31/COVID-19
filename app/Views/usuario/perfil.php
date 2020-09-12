<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Perfil</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">

            <table id="example2" class="table table-bordered table-hover">
                <tbody>
                    <?php
                    if($_SESSION['usuario_covid_logado'] != null){
                        $data = new DateTime($_SESSION['usuario_covid_logado']['data_nascimento']);
                        $data_nascimento = $data->format('d/m/Y');
                        ?>

						
						<div class="modal-body">
                    <div id="resultado"></div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
								<label for="matricula">Matricula</label>
                                <input type="text" disabled="" name="matricula" id="matricula" value="<?php echo $_SESSION['usuario_covid_logado']['matricula']; ?>" class="form-control" >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
							<label for="name">Nome</label>
                                <input type="text" disabled="" name="nm_nome" id="nome" value="<?php echo $_SESSION['usuario_covid_logado']['nome']; ?>" class="form-control" >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
								<label for="cpf">CPF</label>
                                <input type="text" disabled="" name="cpf" id="cpf" value="<?php echo $_SESSION['usuario_covid_logado']['cpf']; ?>" class="form-control" >
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="dt_nascimento">Data de nascimento</label>
                                <input type="text" disabled="" name="dt_nascimento" 
								value="<?php echo $data_nascimento?>" class="form-control" id="dt_nascimento">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" disabled="" name="email" placeholder="Descreva o email do usuário" 
								value="<?php echo $_SESSION['usuario_covid_logado']['email']; ?>" class="form-control" id="email" >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="celular">Telefone / Celular</label>
                                <input type="text" disabled="" name="celular" placeholder="Descreva o telefone de contato do usuário" 
								value="<?php echo $_SESSION['usuario_covid_logado']['celular']; ?>" class="form-control" id="telefone">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
								<label for="address">Endereço</label>
                                <input type="text" disabled="" id="endereco" name="endereco" 
								value="<?php echo $_SESSION['usuario_covid_logado']['endereco']; ?>" class="form-control" >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
								<label for="setor">Setor</label>
                                <input type="text" disabled="" id="endereco" name="endereco" 
								value="<?php echo $_SESSION['usuario_covid_logado']['setor']; ?>" class="form-control" >
                            </div>
                        </div>
						
						<div class="col-md-4">
                            <div class="form-group">
								<label for="setor">Resetar Senha</label>
                                
								<div class="row">
                                    <div class="col-md-2">
                                        <i class="fas fa-user-edit" 
                                        title="Resetar senha"
                                        data-toggle="modal" 
                                        data-target="#reset-senha-usuario"
                                        data-codigo="<?php echo base64_encode(base64_encode($_SESSION['usuario_covid_logado']['codigo']))?>"
                                        data-nome="<?php echo $_SESSION['usuario_covid_logado']['nome']?>"
                                        ></i>
                                    </div>

                                </div>
                            </div>
                        </div>
						
                    </div>

                </div>
                <?php
                    }
                ?>
                </tbody>
            </table>
        </div>
    </section>
</div>




<div class="modal fade" id="reset-senha-usuario">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Resetar usuário</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <form role="form" id="ResetarSenhaUsuario" method="post">
                <div class="modal-body">
                    <div id="resultado"></div>
                    <h6 id="usuario"></h6>
                    <div class="form-group">
                        <input type="password" name="nova_senha" placeholder="Digite a nova senha" class="form-control" >
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        <input type="hidden" name="codigo" id="cd_usuario">
                        <button type="submit" class="btn btn-danger" id="reseta_senha_usuario"><i class="fas  fa-check-circle"></i> Resetar senha</button>
                </div>
                    </form>
            </div>
        </div>
    </div>