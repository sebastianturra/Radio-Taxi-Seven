<?php
include_once('Conexion.php');

class Pagos{

    var $CON;

    public function selectlastday($fechainicial){
        $this->CON =new Conexion();
        $Con=$this->CON->conectar();
        $sql = "SELECT LAST_DAY('".$fechainicial."') AS ultimidia";
        $resultado=mysqli_query($Con, $sql);
        if(mysqli_num_rows($resultado)>0){
            while($row=mysqli_fetch_array($resultado)){
            $data[]=array(
            "ultimidia"            =>$row["ultimidia"]
                    );
            } 
        mysqli_free_result($resultado);
        mysqli_close($Con);
        return $data;
        }else{
            mysqli_close($Con);
            $data = "error";
            return $data;         
        }      
    }

    public function sumatotal($inicio,$fin){
        $this->CON =new Conexion();
        $Con=$this->CON->conectar();
        $sql = "SELECT COUNT(PAG_ID) AS PAGO FROM pagos WHERE (PAG_FECHA>='".$inicio."' AND PAG_FECHA<='".$fin."')";
        $resultado=mysqli_query($Con, $sql);
        $i=0;
        if (mysqli_num_rows($resultado)>0){
            while($row=mysqli_fetch_array($resultado)){
                $data[$i]=array(
                    "pago"        =>$row["PAGO"]
                );
                $i++;
            } 
            return $data;
        }else {
            $cotid = 0;
            return $cotid;
        }
        $this->CON->desconectar();
        mysqli_close($Con);    
    }

    public function selectvehiculos(){
        $this->CON =new Conexion();
        $Con=$this->CON->conectar();
        $sql = "SELECT * FROM pagos AS A INNER JOIN vehiculo AS b ON b.veh_id=a.veh_id GROUP BY a.veh_id";
        $resultado=mysqli_query($Con, $sql);
        if ($resultado){
            $i=0;
            while($row=mysqli_fetch_array($resultado)){
                $data[$i]=array(
                    "id"        =>$row["veh_id"],
                    "matricula"        =>$row["veh_matricula"]
                );
            $i++;
            } 
            return $data;
        }else {
            $cotid = "Error: " . $sql;
            return $cotid;
        }
        $this->CON->desconectar();
        mysqli_close($Con);    
    }

    public function totalporvehiculo($inicio,$fin,$veh_id){
        $this->CON =new Conexion();
        $Con=$this->CON->conectar();
        $sql = "SELECT COUNT(PAG_ID) AS CONTADOR FROM pagos WHERE ((PAG_FECHA>='".$inicio."' AND PAG_FECHA<='".$fin.
        "') AND `veh_id`='".$veh_id."')";
        $resultado=mysqli_query($Con, $sql);
        $i=0;
        if ($resultado){
            while($row=mysqli_fetch_array($resultado)){
                $data[$i]=array(
                    "contador"        =>$row["CONTADOR"]
                );
            $i++;
            } 
            return $data;
        }else {
            echo $sql;
            $cotid = "Error: " . $sql;
            return $cotid;
        }
        $this->CON->desconectar();
        mysqli_close($Con);    
    }

public function getlastpago(){ //obtiene el ultimo registro agregado.
    $this->CON =new Conexion();
    $Con=$this->CON->conectar();
    $sql = "SELECT * FROM pagos ORDER BY PAG_ID DESC LIMIT 1";
    $resultado=mysqli_query($Con, $sql);
    if(mysqli_num_rows($resultado)>0){
        $i=0;
        while($row=mysqli_fetch_array($resultado)){
            $data[$i]=array(
                "id"            =>$row["PAG_ID"]
            );
            $i++;    
        } 
        $pagoid=$data[0]['id']+1;
        return $pagoid;
    }else{
        $pagoid = 1;
        return $pagoid;
    }
    $this->CON->desconectar();
    mysqli_close($Con);     
}

public function crepago($VEH_ID,$USU_ID,$PAG_FECHA){
    $this->CON =new Conexion();
    $Con=$this->CON->conectar();
    $sql = "INSERT INTO pagos (veh_id,USU_ID,PAG_FECHA,PAG_HECHO)"." VALUE ".
    "('".$VEH_ID."','".$USU_ID."','".$PAG_FECHA."','1');";
    $resultado=mysqli_query($Con, $sql);
    if ($resultado) { 
     //   echo $sql;
        return true;
    }else{
        echo $sql;
        $resultado = "Error: " . $sql . "<br>" . mysqli_error($this->$Con);
        return $resultado;
    }
    mysqli_close($Con);
    $this->CON->desconectar();  
}

public function elimper($per_id){
$this->CON =new Conexion();
    $Con=$this->CON->conectar();
    $sql = "DELETE FROM personal WHERE PER_ID=".$per_id;
    $resultado=mysqli_query($Con, $sql);
    if ($resultado) {
        return true;
    }else{
        $resultado = "Error: " . $sql . "<br>" . mysqli_error($this->$Con);
        return $resultado;
    }
    mysqli_close($Con);
    $this->CON->desconectar();  
}

    public function listarpago(){
    $this->CON =new Conexion();
    $Con=$this->CON->conectar();
    $sql = "SELECT * FROM pagos AS a INNER JOIN vehiculo AS b ON b.veh_id=a.veh_id ORDER BY PAG_FECHA DESC, PAG_ID DESC";
    $resultado=mysqli_query($Con, $sql);
        if(mysqli_num_rows($resultado)>0){
            while($row=mysqli_fetch_array($resultado)){
                $data[]=array(
                    "id"            =>$row["PAG_ID"],
                    "veh_id"        =>$row["veh_id"],
                    "matricula"     =>$row["veh_matricula"],
                    "usu_id"        =>$row["USU_ID"],
                    "fecha"         =>$row["PAG_FECHA"],
                    "hecho"         =>$row["PAG_HECHO"]
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
    public function getper($per_id){
        $this->CON =new Conexion();
        $Con=$this->CON->conectar();
        $sql = "SELECT * FROM personal as a WHERE a.PER_ID='".$per_id."';";
        $resultado=mysqli_query($Con, $sql);
        if(mysqli_num_rows($resultado)>0){     
            while($row=mysqli_fetch_array($resultado)){
            $data[]=array(
                "id"             =>$row["PER_ID"],
                "rut"            =>$row["PER_RUT"],
                "nombre"         =>$row["PER_NOMBRE"],
                "direccion"      =>$row["PER_DIRECCION"],
                "direccion2"     =>$row["PER_DIRECCION2"],
                "correo"         =>$row["PER_CORREO"],
                "ciudad"         =>$row["PER_CIUDAD"],
                "fono"       =>$row["PER_FONO"],
                "telefono"          =>$row["PER_TELEFONO"],
                "sexo"           =>$row["PER_SEXO"],
                "cargo"          =>$row["PER_CARGO"],
                "sexo"           =>$row["PER_SEXO"],
                "fechanac"          =>$row["PER_FECHANAC"],
                "vis"           =>$row["PER_VIS"],
                "fecha"          =>$row["PER_FECHA"]
                );
            }  
        }else{
            // echo $sql." <br> ".mysqli_error($Con);
            $data[0]['error']="error";     
        }    
        return $data;
        mysqli_close($Con);
    }

    public function modper($PER_RUT,$PER_NOMBRE,$PER_DIRECCION,$PER_DIRECCION2,$PER_CORREO,$PER_CIUDAD,
    $PER_FONO,$PER_TELEFONO,$PER_SEXO,$PER_CARGO,$PER_FECHANAC,$PER_ID){
        $this->CON =new Conexion();
        $Con=$this->CON->conectar();
        $sql = "UPDATE personal SET "
        ."PER_RUT='".$PER_RUT."', "
        ."PER_NOMBRE='".$PER_NOMBRE."', "
        ."PER_DIRECCION='".$PER_DIRECCION."', "
        ."PER_DIRECCION2='".$PER_DIRECCION."', "
        ."PER_CORREO='".$PER_CORREO."', "
        ."PER_CIUDAD='".$PER_CIUDAD."', "
        ."PER_FONO='".$PER_FONO."', "
        ."PER_TELEFONO='".$PER_TELEFONO."', "
        ."PER_SEXO='".$PER_SEXO."', "
        ."PER_CARGO='".$PER_CARGO."', "
        ."PER_FECHANAC='".$PER_FECHANAC."' "
        ."WHERE PER_ID='".$PER_ID."';";
        $resultado=mysqli_query($Con, $sql);
        if($resultado){
            //echo $sql;
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

    public function eliminarpersonal($per_id){
        $this->CON =new Conexion();
        $Con=$this->CON->conectar();
        $sql = "UPDATE personal SET "
        ."PER_VIS='2' "
        ."WHERE PER_ID='".$per_id."';";
        $resultado=mysqli_query($Con, $sql);
        if($resultado){
        // echo $sql;
            return true;
            mysqli_close($Con);
            $this->CON->desconectar();
        }else{
        //   echo $sql;
            $resultado = "Error: " . $sql . "<br>" . mysqli_error($this->$Con);
            return $resultado;
            mysqli_close($Con);
            $this->CON->desconectar();
        }   
    }

//FIN DE CLASE
}

