<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Usuário</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <button class="btn btn-success" data-toggle="modal" data-target="#add-usuario"><i class="fas fa-plus-circle"></i> Adicionar usuário</button>

            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>MATRICULA</th>
                        <th>NOME</th>
                        <th>CPF</th>
						<th>SETOR</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($listar_usuario as $usuario) {
                        $data = new DateTime($usuario['data_nascimento']);
                        $data_nascimento = $data->format('Y-m-d');
                        ?>

                        <tr>
                            <td><?php echo $usuario['contador']; ?></td>
                            <td><?php echo $usuario['matricula']; ?></td>
                            <td><?php echo $usuario['nome']; ?></td>
                            <td><?php echo $usuario['cpf']; ?></td>
                            <td><?php echo $usuario['setor']; ?></td>
                            <td>
                                <div class="row">
                                    <!--div class="col-md-2">
                                        <i 
                                        class="far fa-trash-alt" 
                                        title="Excluir"
                                        data-toggle="modal" 
                                        data-target="#delete-usuario"
                                        data-codigo="<?php echo base64_encode(base64_encode($usuario['codigo']))?>"
                                        ></i>
                                    </div-->
                                    <div class="col-md-2">
                                        <i class="fas fa-edit" 
                                        title="Editar"
                                        data-toggle="modal" 
                                        data-target="#editar-usuario"
                                        data-codigo="<?php echo base64_encode(base64_encode($usuario['codigo']))?>"
                                        data-matricula="<?php echo $usuario['matricula']?>"
                                        data-nome="<?php echo $usuario['nome']?>"
                                        data-cpf="<?php echo $usuario['cpf']?>"
                                        data-data_nascimento="<?php echo $data_nascimento?>"
                                        data-email="<?php echo $usuario['email']?>"
                                        data-celular="<?php echo $usuario['celular']?>"
                                        data-endereco="<?php echo $usuario['endereco']?>"
                                        data-setor="<?php echo $usuario['codigo_setor']?>"
                                        data-ativo="<?php echo $usuario['ativo']?>"
                                        ></i>
                                    </div>  

                                    <div class="col-md-2">
                                        <i class="fas fa-user-edit" 
                                        title="Resetar senha"
                                        data-toggle="modal" 
                                        data-target="#reset-senha-usuario"
                                        data-codigo="<?php echo base64_encode(base64_encode($usuario['codigo']))?>"
                                        data-nome="<?php echo $usuario['nome']?>"
                                        ></i>
                                    </div>

                                </div>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>
</div>

<div class="modal fade" id="add-usuario">
    <div class="modal-dialog modal-xl">
        <div class="modal-content ">
            <div class="modal-header">
                <h4 class="modal-title">Adicionar usuário</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form role="form" id="CadastraUsuario" method="post" autocomplete="off">
                <div class="modal-body">

                    <div id="resultado"></div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
								<label for="matricula">Matricula</label>
                                <input type="text" name="matricula" placeholder="Descreva a matricula" class="form-control" onkeyup="this.value = this.value.toUpperCase();" >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
								<label for="name">Nome</label>
                                <input type="text" name="nm_nome" placeholder="Descreva o nome do usuário" class="form-control" onkeyup="this.value = this.value.toUpperCase();">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
								<label for="cpf">CPF</label>
                                <input type="text" name="cpf" placeholder="Descreva o cpf" class="form-control" onkeypress="return mascara(this, '###.###.###-##')" maxlength="14">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="dt_nascimento">Data de nascimento</label>
                                <input type="date" name="dt_nascimento" placeholder="Marque a data de nascimento" class="form-control" id="dt_nascimento">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" placeholder="Descreva o email do usuário" class="form-control" id="email" onkeyup="this.value = this.value.toUpperCase();">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="celular">Celular</label>
                                <input type="text" name="celular" placeholder="Descreva o telefone de contato do usuário" class="form-control" id="celular" onkeypress="return SomenteNumero(event) && mascara(this, '## #####-####')" maxlength="13">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
								<label for="address">Endereço</label>
                                <input type="text" name="endereco" placeholder="Descreva o endereço" class="form-control" onkeyup="this.value = this.value.toUpperCase();" >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
								<label for="setor">Setor</label>
                                <select name="ds_setor" class="form-control" id="">
                                    <option value="" selected="">Selecione o setor</option>
                                    <?php
                                    foreach ($lista_setor as $lista) {
                                        echo '<option value="'.$lista['codigo'].'">'.$lista['setor'].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
								<label for="psw">Senha</label>
                                <input type="password" name="senha" placeholder="Digite a senha" class="form-control" >
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-success" id="add_user"><i class="fas fa-check-circle"></i> Cadastrar usuário</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="editar-usuario">
    <div class="modal-dialog modal-xl">
        <div class="modal-content ">
            <div class="modal-header">
                <h4 class="modal-title">Alterar usuário</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form role="form" id="EditarUsuario" method="post">
                <div class="modal-body">
                    <div id="resultado"></div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
								<label for="matricula">Matricula</label>
                                <input type="text" disabled="" name="matricula" id="matricula" placeholder="Descreva a matricula" class="form-control" >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
							<label for="name">Nome</label>
                                <input type="text" name="nm_nome" id="nome" placeholder="Descreva o nome do usuário" class="form-control" onkeyup="this.value = this.value.toUpperCase();">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
								<label for="cpf">CPF</label>
                                <input type="text" name="cpf" id="cpf" placeholder="Descreva o cpf" class="form-control" onkeypress="return mascara(this, '###.###.###-##')">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="dt_nascimento">Data de nascimento</label>
                                <input type="date" name="dt_nascimento" placeholder="Marque a data de nascimento" class="form-control" id="dt_nascimento">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" placeholder="Descreva o email do usuário" class="form-control" id="email" onkeyup="this.value = this.value.toUpperCase();">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="celular">Celular</label>
                                <input type="text" name="celular" placeholder="Descreva o telefone de contato do usuário" class="form-control" id="telefone" onkeypress="return SomenteNumero(event) && mascara(this, '## #####-####')">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
								<label for="address">Endereço</label>
                                <input type="text" id="endereco" name="endereco" placeholder="Descreva o endereço" class="form-control" onkeyup="this.value = this.value.toUpperCase();">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
								<label for="setor">Setor</label>
                                <select name="ds_setor" class="form-control" id="setor">
                                    <option value="" selected="">Selecione o setor</option>
                                    <?php
                                    foreach ($lista_setor as $lista) {
                                        echo '<option value="'.$lista['codigo'].'">'.$lista['setor'].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
						<div class="col-md-4">
                            <div class="form-group">
								<label for="ativo">Ativo</label>
                                <select name="ativo" class="form-control" id="ativo">
                                    <option value="S">Ativar</option>
                                    <option value="N">Desativar</option>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    <input type="hidden" name="codigo" id="cd_usuario">
                    <button type="submit" class="btn btn-success"><i class="fas fa-check-circle"></i> Atualizar usuário</button>
                </div>
            </form>
        </div>
    </div>
</div>

 <!--div class="modal fade" id="delete-usuario">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Deletando usuário</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="resultado"></div>
                    <h5>Deseja realmente excluir esse usuário?</h5>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    <form role="form" id="ExcluirUsuario" method="post">
                        <input type="hidden" name="codigo" id="cd_usuario">
                        <button type="button" class="btn btn-danger" id="remove_usuario"><i class="fas  fa-check-circle"></i> Deletar usuário</button>
                    </form>
                </div>
            </div>
        </div>
    </div-->

	<div class="modal fade" id="reset-senha-usuario">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Alterar Senha</h4>
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