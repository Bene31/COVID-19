<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="<?php echo $url_base ?>" class="brand-link">
        <!--
        <img src="<?php echo $url_base ?>/assets/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
             -->
        <span class="brand-text font-weight-light">COVID 19</span>
    </a>

    <div class="sidebar">
        <div style="text-align: center">
            <img src="<?php echo $url_base ?>/assets/img/logo.png" width="50%" alt="">
        </div>

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <!-- <div class="image">
                <img src="<?php echo $url_base ?>/assets/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div> -->
            <div class="info">
                <a href="<?php echo $url_base ?>/perfil" " class="d-block"><?php echo $_SESSION['usuario_covid_logado']['nome'];?></a>
                <a href="#" class="d-block"><?php echo $_SESSION['usuario_covid_logado']['setor'];?></a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                
				<?php if ($_SESSION['usuario_covid_logado']['setor'] == "TECNOLOGIA DA INFORMACAO") { ?>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Setor
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo $url_base ?>/setor" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Consultar</p>
                            </a>
                        </li>                        
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Usuário
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo $url_base ?>/usuario" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Consultar</p>
                            </a>
                        </li>                       
                    </ul>
                </li>
				<?php } ?>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            COVID 19
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo $url_base?>/covid" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Lista de Arquivos</p>
                            </a>
                        </li>  				
						<li class="nav-item">
                            <a href="<?php echo $url_base?>/meusarquivos" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Meus Arquivos</p>
                            </a>
                        </li>
                    </ul>
                </li>
				
				<li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Analytics
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo $url_base ?>/analytics" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Mundo</p>
                            </a>
                        </li>  
						<li class="nav-item">
                            <a href="<?php echo $url_base ?>/analyticsbr" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Brasil</p>
                            </a>
                        </li> 
						<li class="nav-item">
                            <a href="<?php echo $url_base ?>/analyticspjf" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Juiz de Fora</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
