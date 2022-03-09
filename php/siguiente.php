<?php
  session_start();
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

  echo $_SESSION["IdProyecto"];
  ?>

  <a href="cerrarSesion.php">cerrar sesion</a>