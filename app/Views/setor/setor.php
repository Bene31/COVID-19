<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Setor</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <button class="btn btn-success" data-toggle="modal" data-target="#add-setor"><i class="fas fa-plus-circle"></i> Adicionar</button>
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Setor</th>
                        <th ></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($lista_setor as $lista) {
                        ?>
                        <tr>
                            <td><?php echo $lista['contador']?></td>
                            <td><?php echo $lista['setor']?></td>
                            <td>
                                <div class="row">
                                    <div class="col-md-2">
                                        <i 
                                        class="far fa-trash-alt" 
                                        title="Excluir"
                                        data-toggle="modal" 
                                        data-target="#delete-setor"
                                        data-codigo="<?php echo base64_encode(base64_encode($lista['codigo']))?>"
                                        ></i>
                                    </div>
                                    <div class="col-md-2">
                                        <i class="fas fa-edit" 
                                        title="Editar"
                                        data-toggle="modal" 
                                        data-target="#atualiza-setor"
                                        data-codigo="<?php echo base64_encode(base64_encode($lista['codigo']))?>"
                                        data-setor="<?php echo $lista['setor']?>"
                                        ></i>
                                    </div>  

                                </div>
                            </td>
                        </tr>
                        <?php
                        } // FECHA O FOREACH DE MOSTRAR A LISTA DE SETORES CADASTRADO
                        ?>
                    </tbody>
                </table>
            </div>
        </section>
    </div>

    <div class="modal fade" id="add-setor">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Adicionar setor</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form role="form" id="CadastraSetor" method="post">
                    <div class="modal-body">
                        <div id="resultado"></div>
                    <!-- <div class="alert alert-danger"><i class="far fa-times-circle"></i> Error ao cadastrar</div>
                        <div class="alert alert-success"><i class="fas fa-check-circle"></i> Cadastrado com sucesso</div> -->
                        <div class="form-group">
                            <input type="text" name="ds_setor" placeholder="Descreva o setor" class="form-control" onkeyup="this.value = this.value.toUpperCase();" >
                        </div>

                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-success" id="add_setor"><i class="fas fa-check-circle"></i> Cadastrar setor</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="delete-setor">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Deletando setor</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="resultado"></div>
                    <h5>Deseja realmente excluir esse setor?</h5>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    <form role="form" id="ExcluirSetor" method="post">
                        <input type="hidden" name="codigo" id="cd_setor">
                        <button type="button" class="btn btn-danger" id="remove_setor"><i class="fas  fa-check-circle"></i> Deletar setor</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="atualiza-setor">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Atualizar setor</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form role="form" id="AtualizaSetor" method="post">
                    <div class="modal-body">
                        <div id="resultado"></div>
                        <div class="form-group">
                            <input type="text" name="ds_setor" id="ds_setor" placeholder="Descreva o setor" class="form-control" >
                        </div>

                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        <input type="hidden" name="codigo" id="cd_setor">
                        <button type="submit" class="btn btn-success"><i class="fas fa-check-circle"></i> Atualizar setor</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
