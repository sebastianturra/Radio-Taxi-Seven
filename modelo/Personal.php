<?php
include_once('Conexion.php');

class Personal{

    var $CON;

        public function getlistadopersonal(){
            $this->CON =new Conexion();
            $Con=$this->CON->conectar();
            $sql = "SELECT * FROM personal";
            $resultado=mysqli_query($Con, $sql);
            if ($resultado){
                $i=0;
                while($row=mysqli_fetch_array($resultado)){
                    $data[$i]=array(
                        "perid"        =>$row["PER_ID"],
                        "rut"          =>$row["PER_RUT"],
                        "nombre"       =>$row["PER_NOMBRE"],
                        "direccion"    =>$row["PER_DIRECCION"],
                        "ciudad"       =>$row["PER_CIUDAD"],
                        "telefono"     =>$row["PER_TELEFONO"],
                        "sexo"         =>$row["PER_SEXO"],
                        "cargo"        =>$row["PER_CARGO"],
                        "pervis"       =>$row["PER_VIS"]
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

    public function getlastper(){ //obtiene el ultimo registro agregado.
        $this->CON =new Conexion();
        $Con=$this->CON->conectar();
        $sql = "SELECT PER_ID
        FROM personal ORDER BY PER_ID DESC LIMIT 1";
        $resultado=mysqli_query($Con, $sql);
        if(mysqli_num_rows($resultado)>0){
            $i=0;
            while($row=mysqli_fetch_array($resultado)){
                $data[$i]=array(
                    "id"            =>$row["PER_ID"]
                );
                $i++;    
            } 
            $vehid=$data[0]['id']+1;
            return $vehid;
        }else{
            $vehid = 1;
            return $vehid;
        }
        $this->CON->desconectar();
        mysqli_close($Con);     
    }

	public function creper($PER_RUT,$PER_NOMBRE,$PER_DIRECCION,$PER_DIRECCION2,$PER_CORREO,$PER_CIUDAD,
    $PER_FONO,$PER_TELEFONO,$PER_SEXO,$PER_CARGO,$PER_FECHANAC,$PER_FECHA){
        $this->CON =new Conexion();
        $Con=$this->CON->conectar();
        $sql = "INSERT INTO personal (PER_RUT,PER_NOMBRE,PER_DIRECCION,PER_DIRECCION2,PER_CORREO,PER_CIUDAD,".
        "PER_FONO,PER_TELEFONO,PER_SEXO,PER_CARGO,PER_FECHANAC,PER_VIS,PER_FECHA)"." VALUE ".
        "('".
        $PER_RUT."','".$PER_NOMBRE."','".$PER_DIRECCION."','".$PER_DIRECCION2."','".$PER_CORREO."','".
        $PER_CIUDAD."','".$PER_FONO."','".$PER_TELEFONO."','".$PER_SEXO."','".$PER_CARGO."','".$PER_FECHANAC.
        "','1','".$PER_FECHA."');";
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

public function listarpersonal(){
    $this->CON =new Conexion();
    $Con=$this->CON->conectar();
    $sql = "SELECT * FROM personal AS a WHERE a.PER_VIS=1 ORDER BY PER_VIS DESC";
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
                "fono"           =>$row["PER_FONO"],
                "telefono"       =>$row["PER_TELEFONO"],
                "sexo"           =>$row["PER_SEXO"],
                "cargo"          =>$row["PER_CARGO"],
                "fechanac"       =>$row["PER_FECHANAC"]
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

//1 es visible.
//2 deja ser visible.

//FIN DE CLASE
}

