<?php  
include_once("../../modelo/Usuario.php");
/*echo "Aca se conecta a la base de datos<br>";
echo "Se hace la consulta del usuario y contraseña<br>"; 
echo "Se muestra la respuesta correspondiente de datos incorrecto o redirige al menu.<br>"; 
echo "<meta http-equiv='refresh' content='5; url=../../vista/menuprincipal/menuprincipal.php'>";*/
$usuario = new Usuario(); 
if($_GET["funcion"] == "login"){
    $usuariologin = $_GET["usuario"];  
    $passwordlogin = $_GET["password"];
      if(empty($usuariologin)){
        echo "<script> alert('Debe Ingresar el correo'); </script>";
        echo "<meta http-equiv='refresh' content='1; url=../../vista/login/login.php'>";
      }else if(empty($passwordlogin)){
        echo "<script> alert('Debe Ingresar la contraseña'); </script>";
        echo "<meta http-equiv='refresh' content='1; url=../../vista/login/login.php'>";
      }else { 
        $login = $usuario->login($usuariologin,$passwordlogin);
            if($login == true){
                
                echo "<meta http-equiv='refresh' content='1; url=../../vista/menuprincipal/menuprincipal.php'>";
             /* echo "<script> $(location).attr('href','vista/menuprincipal/menuprincipal.php'); </script>"; */
            }else{
              echo "<script> alert('Datos erroneos'); </script>";
              echo "<meta http-equiv='refresh' content='1; url=../../vista/login/login.php'>";
            }
        }
}else if ($_GET["funcion"] == "logout"){
  $login = $usuario->logout();
  echo "Deslogeado";
  echo "<meta http-equiv='refresh' content='1; url=../../vista/login/login.php'>";
}else{
    echo "<script> alert('Funcion no encontrada'); </script>";
    }
?>