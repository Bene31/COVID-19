<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">COVID</h1>
				</div>
			</div>
		</div>
	</div>

	<section class="content">
		<div class="container-fluid">
			<button class="btn btn-success" data-toggle="modal" data-target="#add-covid"><i class="fas fa-plus-circle"></i> Adicionar</button>
			<table id="example2" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>ARQUIVO</th>
						<th>DATA DO ARQUIVO</th>
						<th>DATA DE REGISTRO</th>
						<th>USUÁRIO</th>
						<th>SITE</th>
						<th ></th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($lista_covid as $lista) {
						?>
						<tr>
							<td><?php echo $lista['contador']?></td>
							<td><?php echo $lista['arquivo']?></td>
							<td><?php echo $lista['data_criacao']?></td>
							<td><?php echo $lista['data_atualizacao']?></td>
							<td><?php echo $lista['usuario']?></td>
							<td><?php echo $lista['site']?></td>
							<td>
								<div class="row">
									<?php if ($_SESSION['usuario_covid_logado']['setor'] == "TECNOLOGIA DA INFORMACAO") { ?>
									<div class="col-md-2">
										<i 
										class="far fa-trash-alt"
										title="Excluir arquivo"
										data-toggle="modal" 
										data-target="#delete-covid"
										data-codigo="<?php echo base64_encode(base64_encode($lista['codigo']))?>"
										data-arquivo="<?php echo $lista['arquivo']?>"
										></i>
									</div>
									<div class="col-md-2">
										<i 
										class="fas fa-edit"
										title="Editar fonte"
										data-toggle="modal" 
										data-target="#edit-covid-fonte"
										data-codigo="<?php echo base64_encode(base64_encode($lista['codigo']))?>"
										data-site="<?php echo $lista['site']?>"
										></i>
									</div><?php } ?>
									<div class="col-md-2">
										<a 
											onclick="Download('<?php echo $lista['arquivo']?>')"
											title="Baixar arquivo" download>
											<i class="fas fa-download"></i>
										</a>
									</div>
									<?php if ($_SESSION['usuario_covid_logado']['setor'] == "TECNOLOGIA DA INFORMACAO") { ?>
									<div class="col-md-2">
										<i 
										class="fas fa-file-upload"
										title="Atualizar arquivo"
										data-toggle="modal" 
										data-target="#atualiza-arquivo-covid"
										data-codigo="<?php echo base64_encode(base64_encode($lista['codigo']))?>"
										data-arquivo="<?php echo $lista['arquivo']?>"></i>
									</div><?php } ?>
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

<div class="modal fade" id="add-covid">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Adicionar arquivo de COVID-19</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form role="form" id="CadastraCovid" method="post" enctype="multipart/form-data">
				<div class="modal-body">
					<div id="resultado"></div>
					<div class="row">
					
					<div class="col-md-6">
							<div class="form-group">
								<input type="date" name="dt_criacao" placeholder="Marque a data do arquivo" class="form-control" id="dt_criacao">
							</div>
						</div>
					
						<div class="col-md-6">
							<div class="form-group">
								<input type="file" name="arquivo" class="form-control-file">
							</div>
						</div>
							
						<div class="col-md-6">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text">http://</span>
								</div>
								<input type="text" name="fonte" class="form-control" placeholder="Digite o endereço da fonte">
							</div>
						</div>
					</div>

				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
					<button type="submit" class="btn btn-success"><i class="fas fa-check-circle"></i> Armazenar arquivo</button>
				</div>
			</form>
		</div>
	</div>
</div>


<div class="modal fade" id="delete-covid">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Deletando COVID</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div id="resultado"></div>
				<h5>Deseja realmente excluir essa informação?</h5>
			</div>
			<div class="modal-footer justify-content-between">
				<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
				<form role="form" id="ExcluirCovid" method="post">
					<input type="hidden" name="codigo" id="cd_usuario">
					<input type="hidden" name="ds_arquivo" id="arquivo">
					<button type="button" class="btn btn-danger" id="remove_covid"><i class="fas  fa-check-circle"></i> Deletar COVID</button>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="edit-covid-fonte">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Editar site COVID</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form role="form" id="EditSiteCovid" method="post">
				<div class="modal-body">
					<div id="resultado"></div>
					<div class="form-group">
						<input type="text" name="site" id="site" class="form-control" placeholder="Digite o site">
					</div>
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
					<input type="hidden" name="codigo" id="cd_usuario">
					<button type="submit" class="btn btn-success" id="edit_site_covid"><i class="fas  fa-check-circle"></i> Atualizar site COVID</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="atualiza-arquivo-covid">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Atualizar arquivo COVID</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form role="form" id="AtualizaFileCovid" method="post">
				<div class="modal-body">
					<div id="resultado"></div>
					<div class="form-group">
						<input type="file" name="arquivo" class="form-control-file">
					</div>
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
					<input type="hidden" name="codigo" id="cd_usuario">
					<input type="hidden" name="arquivo_antigo" id="arquivo_principal">
					<button type="submit" class="btn btn-success"><i class="fas  fa-check-circle"></i> Atualizar arquivo COVID</button>
				</div>
			</form>
		</div>
	</div>
</div>
