<?php
include_once('Conexion.php');

class Usuario{

    var $CON;

    public function login($usuario,$password){
        $this->CON =new Conexion();
        $Con=$this->CON->conectar();
        $sql = "SELECT * FROM usuario AS a WHERE USU_USUA='".$usuario."' && USU_PASS='".$password."';";
        $resultado=mysqli_query($Con, $sql);
        if (mysqli_num_rows($resultado)>0) {
            $i=0;
            while($row=mysqli_fetch_array($resultado)){
            $data[$i]=array(
                "usuario"            =>$row["USU_USUA"],
                "password"            =>$row["USU_PASS"],
                "usu_id"            =>$row["USU_ID"],
                "tipo"            =>$row["USU_TIPO"]
            );
            $i++;
        } 
        session_start();
        $_SESSION["id"] = $data[0]["usu_id"];
        $_SESSION["usuario"] = $data[0]["usuario"];
        $_SESSION["password"] = $data[0]["password"];
        $_SESSION["tipo"] = $data[0]["tipo"];
        return true;
        }else{
        return false;
        }
        mysqli_free_result($resultado);
        mysqli_close($Con);   
    }

    public function logout(){
    session_start();
    session_destroy();
    }
}

