<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Dashboard</h1>
				</div>
			</div>
		</div>
	</div>

	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-4">
					<!-- small box -->
					<div class="small-box bg-danger">
						<div class="inner">
							<h3><?php echo $total_covid; ?></h3>

							<p>Covid</p>
						</div>

						<a href="<?php echo $url_base ?>/covid" class="small-box-footer">Mais infomações <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<div class="col-lg-4">
					<!-- small box -->
					<?php if ($_SESSION['usuario_covid_logado']['setor'] == "TECNOLOGIA DA INFORMACAO") { ?>
					<div class="small-box bg-info">
						<div class="inner">
							<h3><?php echo $total_setor; ?></h3>

							<p>Setor</p>
						</div>

						<a href="<?php echo $url_base ?>/setor" class="small-box-footer">Mais infomações <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<div class="col-lg-4">
					<!-- small box -->
					<div class="small-box bg-success">
						<div class="inner">
							<h3><?php echo $total_usuario; ?></h3>

							<p>Usuário</p>
						</div>

						<a href="<?php echo $url_base ?>/usuario" class="small-box-footer">Mais infomações <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<?php } ?>
				
			</div>
		<!-- 	<?php
			// echo"<pre>";
			// print_r($_SESSION['usuario_covid_logado']);
			// echo"</pre>";
			?> -->
		</div>
	</section>
</div>