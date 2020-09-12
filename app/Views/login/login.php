<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Acessar o sistema - COVID</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="<?php echo $url_base; ?>/assets/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo $url_base; ?>/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo $url_base; ?>/assets/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style type="text/css">
    .login-page{
        background-image: url("<?php echo $url_base ?>/assets/img/bg/bg-login.jpg");
        background-size: 100% 100%;
        background-repeat: no-repeat;
    }
  </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card">
  <div class="login-logo">
    <a href="<?php echo $url_base; ?>">COVID <b>19</b></a>
  </div>
    <div class="card-body login-card-body">
      <?php
        if(isset($_REQUEST['logar'])){
          echo $mensagem_login;
        }
      ?>
      <p class="login-box-msg">Faça login para iniciar sua sessão</p>

      <form action="<?php echo $url_base ?>/login/logar" method="post">
        <div class="input-group mb-3">
          <input type="text" name="login" required class="form-control" placeholder="MATRÍCULA" onkeyup="this.value = this.value.toUpperCase();">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-cash-register"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="senha" required class="form-control" placeholder="SENHA">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            
          </div>
          <div class="col-6">
            <button type="submit" name="logar" class="btn btn-primary btn-block">Entrar no sistema</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<script src="<?php echo $url_base; ?>/assets/plugins/jquery/jquery.min.js"></script>
<script src="<?php echo $url_base; ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo $url_base; ?>/assets/dist/js/adminlte.min.js"></script>

</body>
</html>
