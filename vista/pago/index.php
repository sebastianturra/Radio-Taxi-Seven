<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location:../../index.php");
}
include_once('../../Modelo/Conexion.php');
include_once('../../Modelo/Pagos.php');

$pago = new Pagos();
$getpagos = $pago->listarpago();

//var_dump($getpagos);

setlocale(LC_ALL,"es_ES");
$fecha=strftime("%Y-%m-%d");
?>
<html lang="en">
<head>
    <!-- Font Icon -->
    <!--<link rel="stylesheet" href="../../../fonts/material-icon/css/material-design-iconic-font.min.css"> -->
   <!-- <link rel="shortcut icon" type="image/x-icon" href="../../../img/logopestanaico.ico" />  -->   
   <title>Radio Taxi Seven</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- css -->
        <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css"> 
        <link rel="stylesheet" href="../../css/styleint.css"/>
        <!-- jquery -->
        <script src="../../bootstrap/Jquery/jquery-3.6.0.min.js" type="text/javascript"></script>
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
<title>Listar - Radio Taxi Seven</title>
<script  type="text/javascript">
  $(document).ready(function() {
    $("#tipocot").val("0");
    $("#estado").val("0");
    $("#datobuscar").val("0");
          
    document.getElementById("text").disabled = true;
      $("#datobuscar").change(function(){
        if( $("#datobuscar").val() == 0) {
          $('#text').val('');
          $('#text').prop( "disabled", true );
        }else{ 
          $('#text').val('');      
          $('#text').prop( "disabled", false );
        }
      });
    });
</script>
<style>
 table{
        table-layout: auto;
        widtd:100%;
        max-width: 100%;
        
            }
               td:ntd-child(1) {
    background-color:whitesmoke;
    font-weight: bold;
}
 td { 
                padding: 5px 10px;
                text-align: center;
                border: 1px solid #999;
                font-size: 15px;
                font-weight: bold;
                    background-color:white;
    } 
 td{
        text-align: center;
    }
</style>
</head>
<body>
  <div class="container">
    <img style="height: 100px;margin: 0px 0px 0px auto;" src="../../assets/img/taxi.png"><br>
    <center>
      <h1>Listado de Pagos</h1>
    </center>
    <form id="formcrecot" action ="">
      <div id="menu">
        <center><table style="width:auto; max-width: 100%;">
          <input type="hidden" id="fechaactual" name="fechaactual" value="<?php echo $fecha ?>">
          <input type="hidden" id="estado" name="estado" value="0">
        <tr>              
          <td style="widtd:auto;text-align:right;background-color: skyblue; color: white; font-weight: bold"> Dato a buscar:</td>
          <td style="background-color: white;widtd: auto"> <select name="datobuscar" id="datobuscar" style="widtd: 180px; border-color: black" class="btn btn-block busqueda">
            <option value="0">Seleccione Dato</option>
            <option value="a.COT_CODIGO">Numero</option>
            <option value="a.COT_RUT">Matricula</option>
            <option value="a.COT_EMPRESA">Fecha</option>
            </select> 
          </td>       
          <td style="widtd:auto;  background-color: white">
            <input type="text" name="text" id="text" placeholder="Escriba el Dato a buscar" style="widtd: auto">
          </td>   
          <td style="background-color: white;padding:1 0 0 5;">
            <input type="button" name="volver" id="volver" class="form-submit" 
            onclick="window.location.href='../menuprincipal/menuprincipal.php'" value="Volver Menu" style=" margin-top: 3; margin-bottom: 3;widtd:98%; padding-top: 10px; padding-bottom: 10px;"/>
            <input type="button" name="volver" id="volver" class="form-submit"
             onclick="window.location.href='crepago.php'" value="Agregar Pago" style=" margin-top: 3; margin-bottom: 3;widtd:98%; padding-top: 10px; padding-bottom: 10px;"/>
             <input type="button" name="volver" id="volver" class="form-submit"
             onclick="window.location.href='crepago.php'" value="Exportar Pagos" style=" margin-top: 3; margin-bottom: 3;widtd:98%; padding-top: 10px; padding-bottom: 10px;"/>
           </td> 
        </tr>             
      </table>
    </center>
  </div> 
   <div name="tabla-contenido" id="tabla-contenido">
          <table id="tabladatos" style="width: 100%; max-width: 100%;">
          <tr>
            <td>N°</td>
            <td>Numero</td>
            <td>Matricula</td>
            <td>Fecha</td>
            <td>Opciones</td>
          </tr>
          <?php 
            foreach($getpagos AS $key => $value){
              echo "<tr>";
              echo "<td>".($key+1)."</td>".
                  "<td>".$getpagos[$key]['id']."</td>".
                  "<td>".$getpagos[$key]['matricula']."</td>".
                  "<td>".$getpagos[$key]['fecha']."</td>".
                  "<td>".
                  "<a href='crepago.php?pago_id=".$getpagos[$key]['id']."'  ".
                  "class='btn' style='margin: 0 3 0 0'><img src='../../assets/img/view.png' widtd= 15px' ". 
                  "height= 15px'></a>".
                  "<a href='modpago.php?pago_id=".$getpagos[$key]['id']."'  ".
                  "class='btn' style='margin: 0 3 0 0'><img src='../../assets/img/edit.png' ' widtd= 15px' ".
                  "height= 15px'></a>".
                  "<a href='imppago.php?pago_id=".$getpagos[$key]['id']."'  ". 
                  "class='btn' style='margin: 0 3 0 0'><img src='../../assets/img/imp.png' widtd= 15px' ".
                  "height= 15px'></a>".
                  "<a href='elimpago.php?pago_id=".$getpagos[$key]['id']."'  ". 
                  "class='btn' style='margin: 0 3 0 0'><img src='../../assets/img/delete.png' widtd= 15px' ".
                  "height= 15px'></a>". 
                  "</td>";
              echo "</tr>";
              $key++;
            }    
          ?>      
        </table>
    </div>       
</form>  
     <!-- JS -->
<script src="../../bootstrap/js/bootstrap.bundle.min.js"></script> 
<script>
  var delay = (function(){
  var timer = 0;
  return function(callback, ms){
    clearTimeout (timer);
    timer = setTimeout(callback, ms);
  };
})();
  $(".busqueda").change(function(){ 
    delay(function(){
      var tipocot = $("#tipocot").val();
      var datobuscar = $("#datobuscar").val();
      var estado = $("#estado").val();
      var text = $("#text").val();
      var fechaactual = $("#fechaactual").val();

      $.ajax({
        type: "POST",
        url: "Ctrl/ctrl_funcionescotizacion.php",
        data: {funcion:"busquedaselect",tipocot:tipocot,datobuscar:datobuscar,estado:estado,text:text,fechaactual:fechaactual},
        success: function(data){
          console.log(data);
          var lista = eval(data); 
          console.log(lista.lengtd);
          if(lista!="Error, Dato no encontrado"){
            var html = "";
            console.log(lista.lengtd);
            $('#tabladatos').empty();
              html += "<tdead>";
              html += "<tr>";
              html += "<td>N°</td>";
              html += "<td>Numero</td>";
              html += "<td>Rut</td>";
              html += "<td>Empresa</td>";
              html += "<td>Fecha</td>";
              html += "<td>Telefono</td>";
              html += "<td>Nombre Contacto</td>";
              html += "<td>Proceso</td>";
              html += "<td>Operación</td>";
              html += "<tr>";
              html += "</tdead>";
              html += "<tbody>";
              for(i = 0; i < lista.lengtd; i++){
                $colortexto="";
                 if(lista[i]["EST_PRODESCRIPCION"]=="En proceso"){
                $colortexto="#e28800";
                  }else if(lista[i]["EST_PRODESCRIPCION"]=="Completado"){
                $colortexto="#4CBF00";
                  }else{
                  $colortexto="#ff1900";
                }  
                html += "<tr>";
                html += "<td style='text-align:center'>"+(i+1)+"</td>";
                html += "<td style='text-align:left'>"+lista[i]["COT_CODIGO"]+"</td>";
                html += "<td style='text-align:left'>"+lista[i]["COT_RUT"]+"</td>";
                html += "<td style='text-align:left'>"+lista[i]["COT_EMPRESA"]+"</td>";
                html += "<td style='text-align:justify'>"+lista[i]["COT_FECHA"]+"</td>";
                html += "<td style='text-align:center'>"+lista[i]["COT_TELEFONO"]+"</td>";
                html += "<td style='text-align:left'>"+lista[i]["COT_CONTACTO"]+"</td>"; 
                html += "<td style='color:"+$colortexto+";text-align:left'>"+lista[i]["EST_PRODESCRIPCION"]+"</td>"; 
                html += "<td><a href='vercotizacion.php?COT_CODIGO="+lista[i]["COT_CODIGO"]+"'  class='btn' style='margin: 0 3 0 0'><img src='../../../img/icon/view.png' widtd= 15px' height= 15px'></a>";
                html += "<a href='modificarcotizacion.php?COT_CODIGO="+lista[i]["COT_CODIGO"]+"'  class='btn' style='margin: 0 3 0 0'><img src='../../../img/icon/edit.png' ' widtd= 15px' height= 15px'></a>";
                html += "<a href='imprimircotizacionimpresion.php?COT_CODIGO="+lista[i]["COT_CODIGO"]+"'  class='btn' style='margin: 0 3 0 0'><img src='../../../img/icon/imp.png' widtd= 15px' height= 15px'></a>";
                html += "<a href='eliminarcotizacion.php?COT_CODIGO="+lista[i]["COT_CODIGO"]+"'  class='btn' style='margin: 0 3 0 0'><img src='../../../img/icon/delete.png' widtd= 15px' height= 15px'></a>";      
                html += "</td>";             
                html += "</tr>";
              }
              $('#tabladatos').html(html);
              $("#errores").empty(); 
            }else{
              var html = "";
              console.log(lista.lengtd);
              $('#tabladatos').empty();
              html += "<tdead>";
              html += "<tr>";
              html += "<td>Codigo</td>";
              html += "<td>Empresa</td>";
              html += "<td>Fecha</td>";
              html += "<td>Telefono</td>";
              html += "<td>Nombre Contacto</td>";
              html += "<td>Proceso</td>";
              html += "<td>Operación</td>";
              html += "<tr>";
              html += "</tdead>";
              html += "<tbody>";
              html += "<tr>";
              html += "<td colspan='10' style='text-align:center'>Dato no encontrado</td>";html += "</tr>";
              html += "</tbody>";
              $('#tabladatos').html(html);
              $("#errores").empty(); 
            }
          }     
        });
      }, 1000 );
    });
  </script>
  <script>
     var delay = (function(){
     var timer = 0;
     return function(callback, ms){
       clearTimeout (timer);
       timer = setTimeout(callback, ms);
     };
        })();
    $("#text").keyup(function(){ 
      delay(function(){
      var tipocot = $("#tipocot").val();
      var datobuscar = $("#datobuscar").val();
      var estado = $("#estado").val();
      var text = $("#text").val();
      var fechaactual = $("#fechaactual").val();

      $.ajax({
        type: "POST",
        url: "Ctrl/ctrl_funcionescotizacion.php",
        data: {funcion:"busquedaselect",tipocot:tipocot,datobuscar:datobuscar,estado:estado,text:text,fechaactual:fechaactual},
        success: function(data){
          console.log(data);
          var lista = eval(data); 
          console.log(lista.lengtd);
          if(lista!="Error, Dato no encontrado"){
            var html = "";
            console.log(lista.lengtd);
            $('#tabladatos').empty();
              html += "<tdead>";
              html += "<tr>";
              html += "<td>N°</td>";
              html += "<td>Numero</td>";
              html += "<td>Rut</td>";
              html += "<td>Empresa</td>";
              html += "<td>Fecha</td>";
              html += "<td>Telefono</td>";
              html += "<td>Nombre Contacto</td>";
              html += "<td>Proceso</td>";
              html += "<td>Operación</td>";
              html += "<tr>";
              html += "</tdead>";
              html += "<tbody>";
              for(i = 0; i < lista.lengtd; i++){
                $colortexto="";
                 if(lista[i]["EST_PRODESCRIPCION"]=="En proceso"){
                $colortexto="#e28800";
                  }else if(lista[i]["EST_PRODESCRIPCION"]=="Completado"){
                $colortexto="#4CBF00";
                  }else{
                  $colortexto="#ff1900";
                }  
                html += "<tr>";
                html += "<td style='text-align:center'>"+(i+1)+"</td>";
                html += "<td style='text-align:left'>"+lista[i]["COT_CODIGO"]+"</td>";
                html += "<td style='text-align:left'>"+lista[i]["COT_RUT"]+"</td>";
                html += "<td style='text-align:left'>"+lista[i]["COT_EMPRESA"]+"</td>";
                html += "<td style='text-align:justify'>"+lista[i]["COT_FECHA"]+"</td>";
                html += "<td style='text-align:center'>"+lista[i]["COT_TELEFONO"]+"</td>";
                html += "<td style='text-align:left'>"+lista[i]["COT_CONTACTO"]+"</td>"; 
                html += "<td style='color:"+$colortexto+";text-align:left'>"+lista[i]["EST_PRODESCRIPCION"]+"</td>"; 
                html += "<td><a href='vercotizacion.php?COT_CODIGO="+lista[i]["COT_CODIGO"]+"'  class='btn' style='margin: 0 3 0 0'><img src='../../../img/icon/view.png' widtd= 15px' height= 15px'></a>";
                html += "<a href='modificarcotizacion.php?COT_CODIGO="+lista[i]["COT_CODIGO"]+"'  class='btn' style='margin: 0 3 0 0'><img src='../../../img/icon/edit.png' ' widtd= 15px' height= 15px'></a>";
                html += "<a href='imprimircotizacionimpresion.php?COT_CODIGO="+lista[i]["COT_CODIGO"]+"'  class='btn' style='margin: 0 3 0 0'><img src='../../../img/icon/imp.png' widtd= 15px' height= 15px'></a>";
                html += "<a href='eliminarcotizacion.php?COT_CODIGO="+lista[i]["COT_CODIGO"]+"'  class='btn' style='margin: 0 3 0 0'><img src='../../../img/icon/delete.png' widtd= 15px' height= 15px'></a>";      
                html += "</td>";             
                html += "</tr>";
              }
              $('#tabladatos').html(html);
              $("#errores").empty(); 
            }else{
              var html = "";
              console.log(lista.lengtd);
              $('#tabladatos').empty();
              html += "<tdead>";
              html += "<tr>";
              html += "<td>Codigo</td>";
              html += "<td>Empresa</td>";
              html += "<td>Fecha</td>";
              html += "<td>Telefono</td>";
              html += "<td>Nombre Contacto</td>";
              html += "<td>Proceso</td>";
              html += "<td>Operación</td>";
              html += "<tr>";
              html += "</tdead>";
              html += "<tbody>";
              html += "<tr>";
              html += "<td colspan='10' style='text-align:center'>Dato no encontrado</td>";html += "</tr>";
              html += "</tbody>";
              $('#tabladatos').html(html);
              $("#errores").empty(); 
            }
          }     
        });
      }, 1000 );
    });
  </script>
</body>
</html>