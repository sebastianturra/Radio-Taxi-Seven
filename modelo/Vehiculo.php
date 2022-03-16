<?php
include_once('Conexion.php');

class Vehiculo{

    var $CON;

    public function getlastveh(){ //obtiene el ultimo registro agregado.
        $this->CON =new Conexion();
        $Con=$this->CON->conectar();
        $sql = "SELECT veh_id FROM vehiculo ORDER BY veh_id DESC LIMIT 1";
        $resultado=mysqli_query($Con, $sql);
        if(mysqli_num_rows($resultado)>0){
            $i=0;
            while($row=mysqli_fetch_array($resultado)){
                $data[$i]=array(
                    "veh_id"            =>$row["veh_id"]
                );
                $i++;    
            } 
            $vehid=$data[0]['veh_id'];
            return $vehid;
        }else{
         //   $vehid = "Error: " . $sql;
            $vehid=1;
            return $vehid;
        }
        $this->CON->desconectar();
        mysqli_close($Con);     
    }

	public function creveh($PER_ID,$veh_matricula,$veh_modelo,$veh_marca,$veh_color,$veh_tipo,
    $veh_anio,$veh_fecha,$veh_vis,$veh_radio){
        $this->CON =new Conexion();
        $Con=$this->CON->conectar();
        $sql = "INSERT INTO vehiculo (PER_ID,veh_matricula,veh_modelo,veh_marca,veh_color,"
        ."veh_tipo,veh_anio,veh_fecha,veh_vis,veh_radio)"." VALUE ".
        "('".
        $PER_ID."','".$veh_matricula."','".$veh_modelo."','".$veh_marca."','".
        $veh_color."','".$veh_tipo."','".$veh_anio."','".$veh_fecha."','".$veh_vis."','".$veh_radio."');";
        $resultado=mysqli_query($Con, $sql);
        if ($resultado) { 
            return true;
        }else{
            echo $sql;
           // $resultado = "Error: " . $sql . "<br>" . mysqli_error($this->$Con);
            return $resultado;
        }
        mysqli_close($Con);
        $this->CON->desconectar();  
    }

public function listarvehiculo(){
    $this->CON =new Conexion();
    $Con=$this->CON->conectar();
    $sql = "SELECT * FROM vehiculo AS a ".
    "INNER JOIN personal AS b ON a.PER_ID=b.PER_ID ". 
    "WHERE a.veh_vis=1 ORDER BY veh_fecha DESC, veh_id DESC";
    $resultado=mysqli_query($Con, $sql);
    if(mysqli_num_rows($resultado)>0){
        while($row=mysqli_fetch_array($resultado)){
            $data[]=array(
                "id"             =>$row["veh_id"],
                "id_persona"     =>$row["PER_ID"],
                "matricula"      =>$row["veh_matricula"],
                "modelo"         =>$row["veh_modelo"],
                "marca"          =>$row["veh_marca"],
                "color"          =>$row["veh_color"],
                "tipo"           =>$row["veh_tipo"],
                "anio"           =>$row["veh_anio"],
                "fecha"          =>$row["veh_fecha"],
                "radio"          =>$row["veh_radio"],
                "nombre"          =>$row["PER_NOMBRE"]
            );   
        }  
        return $data;
        mysqli_close($Con);
        $this->CON->desconectar();       
    }else{
        $data = "Nada encontrado";
        return $data;
        mysqli_close($Con);
        $this->CON->desconectar();  
    }
}

    //Este metodo busca todas las vehiculoes.
    public function getveh($veh_id){
        $this->CON =new Conexion();
        $Con=$this->CON->conectar();
        $sql = "SELECT * FROM vehiculo as a ".
        "INNER JOIN personal AS b ON a.PER_ID=b.PER_ID ".
        "WHERE a.veh_id='".$veh_id."';";
        $resultado=mysqli_query($Con, $sql);
        if(mysqli_num_rows($resultado)>0){     
            while($row=mysqli_fetch_array($resultado)){
            $data[]=array(
                "id"             =>$row["veh_id"],
                "id_persona"     =>$row["PER_ID"],
                "matricula"      =>$row["veh_matricula"],
                "modelo"         =>$row["veh_modelo"],
                "marca"          =>$row["veh_marca"],
                "color"          =>$row["veh_color"],
                "tipo"           =>$row["veh_tipo"],
                "anio"           =>$row["veh_anio"],
                "fecha"          =>$row["veh_fecha"],
                "radio"          =>$row["veh_radio"],
                "nombre"          =>$row["PER_NOMBRE"]  
                );
            }  
        }else{
            // echo $sql." <br> ".mysqli_error($Con);
            $data[0]['error']="error";     
        }    
        return $data;
        mysqli_close($Con);
    }

    public function modveh($PER_ID,$veh_matricula,$veh_modelo,$veh_marca,$veh_color,$veh_tipo,
    $veh_anio,$veh_fecha,$veh_radio,$veh_id){
        $this->CON =new Conexion();
        $Con=$this->CON->conectar();
        $sql = "UPDATE vehiculo SET "
        ."PER_ID='".$PER_ID."', "
        ."veh_matricula='".$veh_matricula."', "
        ."veh_modelo='".$veh_modelo."', "
        ."veh_marca='".$veh_marca."', "
        ."veh_color='".$veh_color."', "
        ."veh_tipo='".$veh_tipo."', "
        ."veh_anio='".$veh_anio."', "
        ."veh_fecha='".$veh_fecha."', "
        ."veh_radio='".$veh_radio."' "
        ."WHERE veh_id='".$veh_id."';";
        $resultado=mysqli_query($Con, $sql);
        if($resultado){
            echo $sql;
            return true;
            mysqli_close($Con);
            $this->CON->desconectar();
        }else{
            echo $sql;
            $resultado = "Error: " . $sql . "<br>" . mysqli_error($this->$Con);
            return $resultado;
            mysqli_close($Con);
            $this->CON->desconectar();
        }   
    }

    public function eliminarvehiculo($veh_id){
        $this->CON =new Conexion();
        $Con=$this->CON->conectar();
        $sql = "UPDATE vehiculo SET "
        ."veh_vis='2' "
        ."WHERE veh_id='".$veh_id."';";
        $resultado=mysqli_query($Con, $sql);
        if($resultado){
            return true;
            mysqli_close($Con);
            $this->CON->desconectar();
        }else{
            $resultado = "Error: " . $sql . "<br>" . mysqli_error($this->$Con);
            return $resultado;
            mysqli_close($Con);
            $this->CON->desconectar();
        }   
    }
//FIN DE CLASE
}
//1 es visible.
//2 deja ser visible.
