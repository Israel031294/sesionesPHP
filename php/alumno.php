<?php
  session_start();//inicio de secion manual
  if(isset($_SESSION["IdProyecto"])){
    $correo = $_SESSION["correo"];
    $IdProyecto=$_SESSION["IdProyecto"];
    $conexion = mysqli_connect("localhost","root","","tt2");
    $sqlInfAlumno = "SELECT * FROM usuarios WHERE correo = '$correo'";
    $resInfAlumno = mysqli_query($conexion, $sqlInfAlumno);
    $infAlumno = mysqli_fetch_row($resInfAlumno);
  }else{
    header("location:./../index.html");
  }
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Pr&aacute;ctica 5 - Area reservada</title>
<meta name='viewport' content='width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no'/>
<meta name="description" content="">
<meta name="keywords" content="">
<link href="./../css/general.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
<link href="./../materialize/css/materialize.min.css" rel="stylesheet">
<link href="./../js/plugins/validetta/dist/validetta.min.css" rel="stylesheet">
<link href="./../js/plugins/confirm/dist/jquery-confirm.min.css" rel="stylesheet">
<script src="./../js/jquery-3.5.1.min.js"></script>
<script src="./../materialize/js/materialize.min.js"></script>
<script src="./../js/plugins/validetta/dist/validetta.min.js"></script>
<script src="./../js/plugins/validetta/localization/validettaLang-es-ES.js"></script>
<script src="./../js/plugins/confirm/dist/jquery-confirm.min.js"></script>
<script>
  $(document).ready(function(){
    $('.fixed-action-btn').floatingActionButton();
    $('.tooltipped').tooltip();
    $("form#formAlmnUpdt").validetta({
      
    });
  });
</script>
</head>
<body>
    <header>
      <img src="./../imgs/header.jpg" class="responsive-img">
      <div class="fixed-action-btn">
        <a class="btn-floating btn-large red"><i class="fas fa-bars"></i></a>
        <ul>
          <li><a href='./cerrarSesion.php?correoSesion=correo' class="btn-floating blue tooltipped" data-position="left" data-tooltip="Cerrar Sesión"><i class="fas fa-power-off"></i></a></li>
        </ul>
      </div>
    </header>
    <main class="valign-wrapper">
      <div class="container">
        <h5 class="green-text">Alumno</h5>
        <?php
          echo "$infAlumno[0]";
        ?>
        <form id="formAlmnUpdt">
        <div class="row">
          <div class="col s12 m4 input-field">
            <label for="correo">correo:</label>
            <input type="text" id="correo" name="correo" value="<?php echo $infAlumno[1]; ?>" data-validetta="required">
          </div> 
          <div class="col s12 m4 input-field">
            <label for="correo">Correo:</label>
            <input type="text" id="correo" name="correo" value="<?php echo $infAlumno[2]; ?>">
          </div> 
          <div class="col s12 m4 input-field">
            <label for="fechaNac">Fecha de nacimiento:</label>
            <input type="text" id="fechaNac" name="fechaNac" value="<?php echo $infAlumno[3]; ?>">
          </div> 
          <div class="col s12 input-field">
            <input type="submit" class="btn green" style="width:100%;" value="Actualizar">
          </div> 
        </div>
        </form>
      </div>

      <?php echo $IdProyecto; ?>
      <a href="siguiente.php">Siguiente</a>
    </main>
    <footer class="page-footer blue-grey darken-3">
      <div class="footer-copyright">
          <div class="container">
              © 2020 Copyright
              <a class="grey-text text-lighten-4 right" href="https://www.escom.ipn.mx">UTEYCV - ESCOM</a>
          </div>
      </div>
    </footer>
</body>
</html>