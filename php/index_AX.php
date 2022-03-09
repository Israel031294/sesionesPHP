<?php
  session_start();

  /*
  $usuario =$_SESSION['usuario'];
  if($usuario ==null || $usuario =''){
    echo 'no tienes permiso';
    die();
  }*/


  $correo = $_POST["correo"];
  $contrasena = md5($_POST["contrasena"]);
  $respAX = [];

  $conexion = mysqli_connect("localhost","root","","tt2");
  $sqlGetAlumno = "SELECT * FROM usuarios WHERE correo = '$correo' AND contrasenia = '$contrasena'";
  $resGetAlumno = mysqli_query($conexion,$sqlGetAlumno);
  $infGetAlumno = mysqli_fetch_row($resGetAlumno);


  $sqlGetProyecto = "SELECT * FROM proyectos WHERE idUsuario = $infGetAlumno[0]";
  $resGetProyecto = mysqli_query($conexion,$sqlGetProyecto);
  $infGetProyecto = mysqli_fetch_row($resGetProyecto);
  $IdPyoyecto= $infGetProyecto[0];


  if(mysqli_num_rows($resGetAlumno) == 1){
    $_SESSION["correo"] = $correo;
    $_SESSION["IdProyecto"]=$IdPyoyecto;
    $respAX["cod"] = 1;
    $respAX["msj"] = "Gracias :) ".$infGetAlumno[3]." Bienvenido!!!";
    $respAX["tipoU"] = $infGetAlumno[9];
  }else{
    $respAX["cod"] = 0;
    $respAX["msj"] = "Error. Favor de intentarlo nuevamente";
    $respAX["tipoU"] = $infGetAlumno[9];
  }

  echo json_encode($respAX);
?>